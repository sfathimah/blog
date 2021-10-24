<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */

    // protected function PCS()
    // {
                
    //     $role = Role::where('id','!=','10')
    //     ->get();    
        
    //     return [$role->pluck('name', 'id')];
        
    // }  
    public function index()
    { 
        $list =  User::where('role_id','!=','10')
        // ->where('status','!=','0')
        ->orderBy('created_at','desc')
        ->get();  

        $user =  $list;
        // $user =  $list->sortByDesc("created_at");
        
        return view('pages.page',compact('user'));
    }

    public function create(){

        list($role_list) = $this->PCS();
      
        return view('user.create',compact('role_list'));
     }


   protected function store(Request $request)
    {

        $this->validate($request, [
            'name'      => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email,',
            // 'password'      => 'required|string|max:255|min:6',
            'role'      => 'required|string|max:255',
            'ic'    => 'required|unique:users|string|max:12',
            'phone'      => 'required|string|min:9',
            'address'      => 'required',
            'position'      => 'required',
            'role'      => 'required|int',
            
            
           ]);

          
            $user = new User();
            $user->name = $request->name;     
            $user->email = $request->email;
            $user->password = Hash::make($request['ic']);  
            $user->role_id = $request->role;    
            $user->ic = $request->ic;  
            $user->phone = $request->phone; 
            $user->address = $request->address; 
            $user->position = $request->position; 
            $user->image = $request->image; 
            $user->status = 1;  
            $user->save(); 



        return redirect('/user')->with('flash_message_success','User has been  Successfully added!');
    }

    public function edit($id)
    {   
        $user = User::findOrFail($id);  
        list($role_list) = $this->PCS();

    
        return view('user.edit', compact('user','role_list'));
    }

    public function update(Request $request, $id)
    {
        User::whereId($id)->update([
            'name' => $request['name'],
            'email' => $request['email'],            
            // 'password' => Hash::make($data['password']),
            // 'role_id' => $request['role'],
            'icno' => $request['icno'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'position' => $request['position'],
            'image' => $request['image'],
            'status' => 1,
        ]);

        return redirect('/user')->with('flash_message_success','User Profile successfully updated!');
    }

     /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);        
        list($role_list) = $this->PCS();
        return view('user.show', compact('user','role_list'));


    }

    public function destroy($id){
        User::whereId($id)->update([
            'status' => 0,
        ]);

         // redirect
         Session::flash('flash_message_success', 'User successfully deleted!');
         return redirect('/user');

        
    }
}
