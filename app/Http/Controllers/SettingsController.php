<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function profile()
    {
        return view('members.profile');
    }

    public function members()
    {
        return view('settings.members');
    }
}
