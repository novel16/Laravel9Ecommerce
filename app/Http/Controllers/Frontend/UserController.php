<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $userData = UserDetail::where('user_id', auth()->user()->id)->first();
        return view('frontend.user.profile', compact('userData'));
    }

    public function updateUserProfile(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $user->update([
            'name' => $request->username,
        ]);

        $user->userDetail()->updateOrCreate([
            'user_id' => $user->id,
        ], [
            'phone' => $request->phone,
            'zip_code' => $request->zip_code,
            'address' => $request->address,
        ]);

        return redirect()->back()->with('message', 'Profile updated successfully!');
        
    }

    public function updatePassword()
    {
        return view('frontend.user.change-password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required','string','min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $currentPasswordStatus = Hash::check($request->current_password, auth()->user()->password);
        if($currentPasswordStatus){

            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->back()->with('message','Password Updated Successfully');

        }else{

            return redirect()->back()->with('message','Current Password does not match with Old Password');
        }
    }
}
