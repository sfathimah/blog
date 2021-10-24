<?php

namespace App\Http\Controllers;

use App\Role;
use App\Page;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
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
        $list =  Page::where('id','1')
        // ->where('status','!=','0')
        // ->orderBy('created_at','desc')s
        ->get()->first();  
        // $list = User::where('id','1')->first();
        $user =  $list;
        return view('pages.page',compact('user'));
    }

    public function edit()
    {   
        $user = User::findOrFail(1);  
        // list($role_list) = $this->PCS();

    
        return view('pages.page', compact('user'));
    } 

    public function update(Request $request)
    {
        Page::whereId('1')->update([
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
                            ->with('success','Product updated successfully');
        // return redirect('/page')->with('flash_message_success','User Profile successfully updated!');
    }

    // public function update(Request $request, Page $page)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'icno' => 'required',
    //     ]);
  
    //     $user->update($request->all());
  
    //     return redirect()->route('pages.page')
    //                     ->with('success','Product updated successfully');
    // }

}
