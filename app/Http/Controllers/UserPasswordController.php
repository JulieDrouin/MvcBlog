<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class UserPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if($user !== NULL && Auth::user()->id === $user->id) {
            return view('auth.passwords.showUpPass', compact('user'));
            }
            else {
                return abort(404);
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'currentPassword' => 'required',
            'newPassword' => 'required',
            'newPasswordVerif' => 'required'
        ]);
        $user = User::find(Auth::id());
        if (!Hash::check($request->currentPassword, $user->password)) {
            return redirect('/show/'.$user)->with("error", 'Current password does not match');
        }
        if ($request->get('newPassword') !== $request->get('newPasswordVerif')) {
            return redirect('/show/'.$user)->with("error", "New Password cannot be same as your Verif password.");
        }
        if (strcmp($request->get('currentPassword'), $request->get('newPassword')) == 0){
            return redirect('/show/'.$user)->with("error", "New Password cannot be same as your current password. Please choose a different password.");
        }

        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/show/'.$user)->with('success', 'Password updated!');

        }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
