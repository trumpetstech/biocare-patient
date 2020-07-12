<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class PaymentsController extends Controller
{
    public function consulting()
    {
        $payments = patient()->doctor_payments();
       
        if(request()->has('from_date') && request('from_date') != '') {
            $from = Carbon::createFromFormat('Y-m-d H', request('from_date') . ' 00')->toDateTimeString();
            $payments = $payments->whereDate('created_at', '>=', $from);
        }

        if(request()->has('to_date') && request('to_date') != '') {
            $to = Carbon::createFromFormat('Y-m-d H', request('to_date') . ' 00')->toDateTimeString();
            $payments = $payments->whereDate('created_at', '<=', $to);
        }

        $payments = $payments->orderBy('created_at', 'DESC')->get();

        return view('payments.consulting', compact('payments'));
    }

    public function pharmacy()
    {
        $payments = patient()->pharmacy_payments();
       
        if(request()->has('from_date') && request('from_date') != '') {
            $from = Carbon::createFromFormat('d-m-Y H', request('from_date') . '00')->toDateTimeString();
            $payments = $payments->whereDate('created_at', '>=', $from);
        }

        if(request()->has('to_date') && request('to_date') != '') {
            $to = Carbon::createFromFormat('d-m-Y H', request('to_date') . '00')->toDateTimeString();
            $payments = $payments->whereDate('created_at', '<=', $to);
        }

        $payments = $payments->orderBy('created_at', 'DESC')->get();

        return view('payments.pharmacy', compact('payments'));
    }

    public function lab()
    {
        $payments = patient()->lab_payments();
       
        if(request()->has('from_date') && request('from_date') != '') {
            $from = Carbon::createFromFormat('d-m-Y H', request('from_date') . '00')->toDateTimeString();
            $payments = $payments->whereDate('created_at', '>=', $from);
        }

        if(request()->has('to_date') && request('to_date') != '') {
            $to = Carbon::createFromFormat('d-m-Y H', request('to_date') . '00')->toDateTimeString();
            $payments = $payments->whereDate('created_at', '<=', $to);
        }

        $payments = $payments->orderBy('created_at', 'DESC')->get();

        return view('payments.lab', compact('payments'));
    }
}
