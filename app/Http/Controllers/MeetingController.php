<?php

namespace App\Http\Controllers;

use App\Meeting;
use Illuminate\Http\Request;

class MeetingController extends Controller
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
        return view('pages.meeting');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            
            'date' => 'required',
            'time' => 'required',
            'dentist' => 'required',
            'service' => 'required',
        ]);

        Meeting::create(
            ['patientID' => "WIF180071", 
            'date' => $request->date,
            'time' => $request->time,
            'dentist' => $request->dentist,
            'service' => $request->service,
            'status' => "Pending" ]);
  
        return view('pages.meeting')->with('successMsg','Meeting has been booked .');
   
        //  return redirect()->route('pages.meeting')
        //                  ->with('success','Meeting booked successfully.');
        //return redirect('/meeting');
    }

   

}
