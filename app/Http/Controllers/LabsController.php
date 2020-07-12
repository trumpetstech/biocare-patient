<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lab;

class LabsController extends Controller
{
    public function index()
    {
        $allLabs = Lab::where('verified', 1);
     
        if(request()->has('city')) {
            $allLabs = $allLabs->whereRaw('LOWER(city) = ?', strtolower(request('city')));
        }

        $allLabs = $allLabs->get();
        $labs = [];

        foreach($allLabs as $lab) {
            $add = true;
            foreach (request('tests') as $key => $test) {
               if(!$lab->available_tests->contains($test)) {
                    $add = false;
                    break;
                }        
            }
            if($add) {
                $labs[] = $lab;
            }
        }

        return view('labs.index', compact('labs'));
     
    }

    public function book(Lab $lab)
    {
        return view('labs.book', compact('lab'));
    }
}
