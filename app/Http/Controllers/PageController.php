<?php

namespace App\Http\Controllers;

use App\Role;
use App\Page;
use App\User;
use App\Record;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class PageController extends Controller
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
        
        return view('pages.page');
    }

    public function edit()
    {   
        $user = User::findOrFail(1);  
        // list($role_list) = $this->PCS();

    
        return view('pages.page', compact('user'));
    } 

    public function update(Request $request)
    {
        $id = Auth::id();

        Page::whereId($id)->update([
            'name' => $request['name'],
            'email' => $request['email'],            
            // 'password' => Hash::make($data['password']),
            // 'role_id' => $request['role'],
            'icno' => $request['icno'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'gender' => $request['gender'],
            'dob' => $request['dob']
        ]);
        return redirect()->route('pages.page')
                            ->with('success','Profile updated successfully');
        // return redirect('/page')->with('flash_message_success','User Profile successfully updated!');
    }

    public function view_profile()
    {
        $users = User::select('id', 'name', 'email')
        ->where('user_type', 'User')
            ->orderBy('created_at', 'ASC')
            ->get();

        return view('pages.viewprofile', compact('users'));
    }

    public function view_data_modal($id)
    {
// $this->debug_to_console("masuk");
    	$sdata = User::select('name','email','icno', 'dob', 'gender', 'phone', 'address')
        ->whereId($id)
        ->get();

	    return response()->json([
	      'data' => $sdata
	    ]);
    }

    public function records($id)
    {
        $records = Record::where('patientID',$id )->first();
        //return $records;

        return view('pages.records', compact('records'));

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

        return view('pages.viewprofile')->with('successMsg','Records has been updated .');;
   
        //  return redirect()->route('pages.meeting')
        //                  ->with('success','Meeting booked successfully.');
        //return redirect('/meeting');
    }

    public function save(Request $request, $id)
    {
        $request->validate([
            'ath' => 'required',
            'si' => 'required',
            'cm' => 'required',
            'al' => 'required',
            'ot' => 'required',
        ]);
        $records = Record::findOrFail($id);   
        $records->update($request->all());

        $users = User::select('id', 'name', 'email')
        ->where('user_type', 'User')
            ->orderBy('created_at', 'ASC')
            ->get();

        return view('pages.viewprofile', compact('users'))->with('success','Medical records updated successfully.');
    }
    public function viewrecords($id)
    {
        //$patientid = Auth::id();
        $records = Record::where('patientID',$id)->first();   

        //list($role_list) = $this->PCS();
        return view('pages.viewrecords', compact('records'));
    }

}
