<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //User DashBoard
    public function UserDashboard()
    {

        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('dashboard', compact('profileData'));
    }

    //UserProfileUpdate
    public function UserProfileUpdate(Request $request)
    {

        $id = Auth::user()->id;
        $update = User::findOrFail($id);

        $update->name = $request->name;
        $update->country = $request->country;
        $update->city = $request->city;
        $update->address_two = $request->address_two;
        $update->postal_code = $request->postal_code;
        $update->email = $request->email;
        $update->phone = $request->phone;
        $update->address = $request->address;
        // $update->status = '1';

        // if ($request->file('photo')) {
        //     $file = $request->file('photo');
        //     @unlink(public_path('upload/admin_images/' . $update->photo));
        //     $filename = date('YmdHi') . $file->getClientOriginalName();
        //     $file->move(public_path('upload/admin_images/'), $filename);
        //     $update['photo'] = $filename;
        // }

        $update->save();

        toastr()->success('Profile Update Succeesfully');

        return redirect()->back();
    }

    //User Logout
    public function UserLogout(Request $request)
    {

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        toastr()->success('Profile Logout Succeesfully');

        return redirect()->route('index');
    }

    //User Password
    public function UserPassword(Request $request)
    {

        return view('frontend.user.dashboard.user_password');
    }

    //User Password Password
    public function UserPasswordPassword(Request $request)
    {

        //validate
        $request->validate([

            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        //Match Old Password
        if (!Hash::check($request->old_password, auth::user()->password)) {

            toastr()->error('Old Password Not Match');

            return back();
        }
        //Update New Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        toastr()->success('Password Change Successfully');

        return back();
    }

}
