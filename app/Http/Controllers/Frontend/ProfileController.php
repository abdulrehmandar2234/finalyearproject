<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePassword\ChangePasswordRequest;
use App\Http\Requests\Profile\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request)
    {
        $user = User::findOrFail(auth()->id());
        $user->update($request->validated());
        return back()->with('success', 'Profile updated successfully');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        if (!(Hash::check($request->get('password'), auth()->user()->password))) {
            // The passwords matches
            return back()->with("error", "Your current password does not matches with the password you provided. Please try again.");
        }
        if (strcmp($request->get('password'), $request->get('new-password')) == 0) {
            //Current password and new password are same
            return back()->with("error", "New Password cannot be same as your current password. Please choose a different password.");
        }
        //Change Password
        $user = auth()->user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return back()->with("success", "Password changed successfully !");
    }
}
