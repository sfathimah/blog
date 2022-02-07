<?php

namespace App\Http\Controllers;

use App\Bookedmeeting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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

    public function adminHome()
    {
        // $list = Bookedmeeting::orderBy('date','desc')->paginate(5)->get();

        // return view('adminHome', compact('list'));
        return view('adminHome');


    }

    public function dentistHome()
    {
        return view('dentistHome');
    }
}
