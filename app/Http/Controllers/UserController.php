<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\Hash;
//use Illuminate\Foundation\Auth\ResetsPasswords;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index($id)
    {
        $user = User::find($id);
        if($user !== NULL && Auth::user()->id === $user->id) {
            return view('home', compact('user'));
        }
        else {
            return abort(404);
        }
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        //
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $id = User::find($id);
        return view('show', compact('id'));
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
            return view('editUser', compact('user'));
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
    public function update(Request $request, $id)
    {

        $request->validate([
            'username'=>'required|max:255',
            'name'=>'required|max:255',
            'lastname'=>'required|max:255',
            'email'=>'required|email',
            'birthdate'=>'required|date',
            ]);
            $update = User::find($id);
            $update->username = $request->get('username');
            $update->name =  $request->get('name');
            $update->lastname = $request->get('lastname');
            $update->email = $request->get('email');
            $update->birthdate = $request->get('birthdate');
            $update->save();

            return redirect('/show/'.$id)->with('success', 'Profile updated!');
        }


        /**
        * Remove the specified resource from storage.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */

        public function deleteUser($id)
        {
            $user = User::find($id);
            if($user !== NULL && Auth::user()->id === $user->id) {
                return view('deleteUser', compact('user'));
            }
            else {
                return abort(404);
            }
        }

        public function destroy($id)
        {
            $id = User::find($id);
            $id->delete();
            return 'User Deleted !';
        }
    }
