<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        return view("profile.show");
    }

    public function edit()
    {
        return view("profile.edit");
    }

    public function update()
    {
        $data = request()->all();

        if (request()->hasFile('avatar')) {
            $path = request()->file('avatar')->store(
                'avatars', 's3'
            );

            $data['avatar_url'] =  \Storage::disk('s3')->url($path);
        }
  
        patient()->update($data);

        toastr()->success('Profile details updated Successfully!');

        return back();
    }
}
