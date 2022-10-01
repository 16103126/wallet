<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProfileSettingController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth:user', 'twofactor']);
    }

    public function showProfile()
    {
        $user = auth()->guard('user')->user();

        return view('user.profile-show', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'photo' => 'image|mimes:jpg,png,jpeg'
        ]);


        $user = auth()->guard('user')->user();

        $user->name = $request->name;
        
        if($file = $request->file('photo'))
        {
            $img = Image::make($file)->resize(700, 700);
            $imageName = time().Str::random(8).'.jpg';
            $img->save('assets/frontend/images/'. $imageName);

            if($user->photo)
                {
                    if(file_exists('assets/frontend/images/'.$user->photo))
                    {
                        @unlink('assets/frontend/images/'.$user->photo);
                    }
                }

            $user->photo = $imageName;
        }

        $user->update();

        return back()->with('success', 'Profile update successfully.');
    }

    public function changePasswordForm()
    {
        $user = auth()->guard('user')->user();

        return view('user.password-change', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'password_confirmation' => 'required|same:new_password'
        ]);

        $user = auth()->guard('user')->user();
        
        $current_password = $user->password;

        if(!Hash::check($request->current_password, $current_password)){
            return back()->with('message', 'Current password does not match.');
        }

        if(Hash::check($request->new_password, $current_password))
        {
            return back()->with('message', 'You enter old password.');
        }

        $user->password = Hash::make($request->new_password);

        $user->update();

        return back()->with('success', 'Password change successfully.');

    }
}
