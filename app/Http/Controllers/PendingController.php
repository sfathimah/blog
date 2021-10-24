<?php

namespace App\Http\Controllers;

use App\Meeting;
use Illuminate\Http\Request;

class PendingController extends Controller
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
        $meetings = Meeting::all();
  
        return view('pages.status.pending',compact('meetings'));
    }
    
    public function edit($id)
    {
        $meeting =Meeting::find($id);
        return view('pages.status.updateStatus', compact('meeting'));
    }

    
    public function update(Request $request)
    {
        $request->validate([
            'status' => 'required',
        ]);
        $data = Meeting::findOrFail($request->id);        
        $data->update($request->all());
        $meetings = Meeting::all();
        return view('pages.status.pending',compact('meetings'))->with('successMsg','Meeting status has been updated .');
    }

}
