<?php

namespace App\Http\Controllers;

use App\Appointmentsetting;
use App\Threshold;
use Illuminate\Http\Request;

class ScheduleController extends Controller
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
        $Thresholds = Threshold::all();
       
        return view('pages.schedule.schedule',compact('AppointmentSetting', 'Thresholds'))
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

    

}
