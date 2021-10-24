<?php

namespace App\Http\Controllers;

use App\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
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
        return view('pages.records');
    }
    public function store(Request $request)
    {
        $request->validate([
            'patientID' => 'required',
            'ath' => 'required',
            'si' => 'required',
            'cm' => 'required',
            'al' => 'required',
            'ot' => 'required',
        ]);
  
        Record::create($request->all());

        return view('pages.records')->with('successMsg','Records has been updated .');;
   
        //  return redirect()->route('pages.meeting')
        //                  ->with('success','Meeting booked successfully.');
        //return redirect('/meeting');
    }

}
