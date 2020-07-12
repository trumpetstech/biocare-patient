<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class MembersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $members = auth()->user()->members;
        if(count($members) == 0) {
            return redirect('/members/add');
        }
        return view("members.index", compact('members'));
    }

    public function create()
    {
         return view('members.create');
    }

    public function store()
    {
        $data = request()->all();

        if (request()->hasFile('avatar')) {
            $path = request()->file('avatar')->store(
                'avatars', 's3'
            );

            $data['avatar_url'] =  \Storage::disk('s3')->url($path);
        }

        
        $patient = auth()->user()->members()->create($data);

        if(auth()->user()->members()->count() > 1) {
            toastr()->success('Member profile added successfully!');
            return redirect('/settings/members');
        } else {
            session(['patient' => $patient]);
            toastr()->success('You are logged in as ' . $patient->name);
            return redirect('/home');
        }
       
    }

    public function history(Patient $member)
    {
         $history = $member->history;

         return view('members.history', compact('history', 'member'));
    }

    public function storeHistory(Patient $member)
    {
        $data = request()->all();

        if(request()->has('past_complaints')) {
            $data['past_complaints'] = json_encode(request('past_complaints'));
           } else {
            $data['past_complaints'] = json_encode([]);
           }
           if(request()->has('demanded_blood_transfusion')) {
               $data['demanded_blood_transfusion'] = json_encode(request('demanded_blood_transfusion'));
           } else {
            $data['demanded_blood_transfusion'] = json_encode([]);
           }

         if($member->history) 
         {
            $member->history->update($data);
         } else {
             $member->history()->create($data);
         }
         
         toastr()->success('Member medical history updated!');

         return back();
    }
    

    public function choose()
    {
        $pid = request('patient_id');

        $patient = auth()->user()->members()->where('id', $pid)->first();

        if(!$patient) {
            return back()->withErrors(['patient' => 'Patient record does not exist!']);
        }

        session(['patient' => $patient]);

        toastr()->success('You are logged in as ' . $patient->name);

        return redirect('/');
    }

    public function select(Patient $member)
    {
        session(['patient' => $member]);

        toastr()->success('You are logged in as ' . $member->name);

        return back();
    }

    public function destroy(Patient $member)
    {
        if(auth()->user()->members()->count() == 1)
        {
            toastr()->error('You cannot delete your primary member profile!');
            return back();
        }

        $member->delete();

        toastr()->success('Member ' . $member->name . ' is deleted successfully!');

        return back();
    }
}
