<?php

namespace App\Http\Controllers;

use App\Appointmentsetting;
use Illuminate\Http\Request;

class appointmentSettingController extends Controller
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
        $AppointmentSetting = Appointmentsetting::latest()->paginate(10);
       
        return view('pages.workload.appointmentSetting',compact('AppointmentSetting'))
            ->with('i', (request()->input('page', 1) - 1) * 10);

       /**$AppointmentSetting = Appointmentsetting::all();
        return view('pages.workload.appointmentSetting'); */ 
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

    public function create_serv()
    {
        return view('pages.workload.create_serv');
    }
    

    public function store1(Request $request)
    {
        $request->validate([
            
            'service' => 'required',
            'TFactor' => 'required',
            'duration' => 'required',
        ]);

        Appointmentsetting::create(
            [ 
            'service' => $request->service,
            'TFactor' => $request->TFactor,
            'duration' => $request->duration ]);
  
        return view('pages.workload.appointmentSetting')->with('successMsg','Details has been updated.');
   
    }
    public function store_serv(Request $request)
    {
        $request->validate([
            'service' => 'required',
        
        ]);
  
        Appointmentsetting::create($request->all());
   
        return redirect()->route('pages.workload.appointmentSetting')
                        ->with('success','New service added successfully.');
    }

    public function destroy_serv(Appointmentsetting $AppointmentSetting)
    {
        $AppointmentSetting->delete();
  
        return redirect()->route('pages.workload.appointmentSetting')
                        ->with('success','Selected service deleted successfully');
    }

    public function update_serv(Request $request, Appointmentsetting $AppointmentSetting)
    {
        $request->validate([
            'service' => 'required'
        ]);

        $AppointmentSetting->update($request->all());
  
        return redirect()->route('pages.workload.appointmentSetting')
                        ->with('success','Service updated successfully');
    }
    public function edit_serv(Appointmentsetting $AppointmentSetting)
    {
        return view('pages.workload.edit_serv',compact('AppointmentSetting'));
    }

}
