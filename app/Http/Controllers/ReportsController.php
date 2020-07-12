<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\LabTest;
use App\Models\LabReport;
use App\Models\SharedReport;
use App\Models\Doctor;

class ReportsController extends Controller
{
    public function index()
    {
        $reports = patient()->reports();

        if(request()->has('from_date') && request('from_date') != '') {
            $from = Carbon::createFromFormat('d-m-Y H', request('from_date') . '00')->toDateTimeString();
            $reports = $reports->whereDate('created_at', '>=', $from);
        }

        if(request()->has('to_date') && request('to_date') != '') {
            $to = Carbon::createFromFormat('d-m-Y H', request('to_date') . '00')->toDateTimeString();
            $reports = $reports->whereDate('created_at', '<=', $to);
        }

        if(request()->has('appointment_id') && request('appointment_id') != '') {
             $reports = $reports->where('appointment_id', request('appointment_id'));
        }

        $reports = $reports->orderBy('created_at', 'DESC')->get();

        $tests = LabTest::all();
        $doctors = Doctor::all();

        return view('reports.index', compact('reports', 'tests', 'doctors'));
    }

    public function store()
    {
        $data = request()->all();

        if (request()->hasFile('file')) {
            $path = request()->file('file')->store(
                'reports', 's3'
            );

            $data['report_url'] =  \Storage::disk('s3')->url($path);
        }

        patient()->reports()->create($data);

        toastr()->success('Report was added successfully!');

        return back();
    }

    public function share(LabReport $report)
    {
        patient()->shared_reports()->create([
                                'doctor_id' => request('doctor_id'), 
                                'test_name' => $report->test, 
                                'report_url' => $report->report_url
                            ]);
        
        Doctor::find(request('doctor_id'))
            ->notify('You have received a new report from ' . patient()->name, '/shared-reports?patient_id=' . patient()->id);
        
        toastr()->success('Report shared successfully!');

        return back();
    }

    public function destroy(LabReport $report)
    {
        $report->delete();
        
        toastr()->success('Report deleted successfully!');

        return back();
    }
}
