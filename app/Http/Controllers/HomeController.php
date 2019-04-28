<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function create($id)
    {
        $id = User::find($id);
        return view('contact.formContact', compact('id'));
    }
    // public function build($id)
    // {
    //     $id = User::find($id);
    //     return view('home');
    //     //->with('success', 'Mail send!');
    // }
}
