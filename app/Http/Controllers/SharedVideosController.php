<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SharedVideosController extends Controller
{
    public function index()
    {
        $shared_videos = patient()->shared_videos()->orderBy('created_at', 'DESC')->get();
        return view('profile.videos', compact('shared_videos'));
    }
}
