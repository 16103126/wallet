<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class ProfileSettingController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:admin');
    }
    
    public function showProfile()
    {
        $admin = auth()->guard('admin')->user();
        return view('admin.profile.show', compact('admin'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'photo' => 'image|mimes:jpg,jpeg,png',
        ]);

        $admin = auth()->guard('admin')->user();

        $admin->name = $request->name;
        
        if($file = $request->file('photo'))
        {
            $img = Image::make($file)->resize(700, 700);
            $imageName = time().Str::random(8).'.jpg';
            $img->save('assets/frontend/images/'. $imageName);

            if($admin->photo)
                {
                    if(file_exists('assets/frontend/images/'.$admin->photo))
                    {
                        @unlink('assets/frontend/images/'.$admin->photo);
                    }
                }

            $admin->photo = $imageName;
        }

        $admin->update();

        return back()->with('success', 'Profile update successfully.');
    }

    public function changePasswordForm()
    {
        $admin = auth()->guard('admin')->user();

        return view('admin.password-change', compact('admin'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'password_confirmation' => 'required|same:new_password'
        ]);

        $admin = auth()->guard('admin')->user();
        
        $current_password = $admin->password;

        if(!Hash::check($request->current_password, $current_password)){
            return back()->with('message', 'Current password does not match.');
        }

        if(Hash::check($request->new_password, $current_password))
        {
            return back()->with('message', 'You enter old password.');
        }

        $admin->password = Hash::make($request->new_password);

        $admin->update();

        return back()->with('success', 'Password change successfully.');

    }
}
