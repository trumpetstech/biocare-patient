<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\CovidPackage;

class WelcomeController extends Controller
{
    public function __construct() 
    {
        $this->middleware('member-selected');
    }

    public function index()
    {
        $doctors = Doctor::where('verified', 1)->where('group_id', 2)->where('is_admin', 0)->limit(4)->get();
        $packages = CovidPackage::where('group_id', 2)->get();
        return view('welcome', compact('doctors', 'packages'));
    }
}
