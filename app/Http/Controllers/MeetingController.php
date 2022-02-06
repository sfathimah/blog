<?php

namespace App\Http\Controllers;

use App\Meeting;
use App\User;
use App\Appointmentsetting;
use App\Workschedule;
use App\Meetingslot;
use App\Threshold;
use App\Bookedmeeting;
use App\Symptom;
use Auth;
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
        $Appointmentsetting = Appointmentsetting::all();
        return view('pages.meeting.index', compact('Appointmentsetting'));
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

    public function search(Request $request)
    {
        $request->validate([   
            'date' => 'required',
            'service' => 'required',
            'sel_symp' => 'required',
        ]);

        $check = Workschedule::where('start', $request->date )->count();
        if($check == 0)
        {
            return view('pages.meeting.index')->with('errorMsg','No Dentist is available on selected date.');
        }
        else
        {
            //$User = User::where('user_type','Dentist')->get();
            $Threshold = Threshold::where('id', 1)->first();
            $limit = $Threshold->threshold;
            $Workschedule = Workschedule::where('start', $request->date )->where('workload', '<', $limit)->orderBy('workload','asc')->get();
            $Appointmentsetting = AppointmentSetting::where('service',$request->service)->first();
            
            $count = 0;
            foreach($Workschedule as $Workschedules)
            {
                $oldwl = $Workschedules->workload;
                $taskwl = $Appointmentsetting->TaskWorkload;
                $newwl = $oldwl + $taskwl;
                if($newwl < $limit)
                {
                    $listofslots[$count]["DentistID"] = $Workschedules-> DentistID;
                    $listofslots[$count]["workload"] = $Workschedules-> workload;
                    $count++;
                }
            }

            if($listofslots == null)
            {
                return view('pages.meeting.index')->with('errorMsg','No Dentist is available on selected date.');
            }
            else
            {
                $count1 = 0;
                for($i = 0; $i< count($listofslots); $i++)
                {
                    $Meetingslot = Meetingslot::where('date', $request->date)->where('dentistid', $listofslots[$i]["DentistID"])->get();
                    $User = User::where('id', $listofslots[$i]["DentistID"])->first();
                    foreach($Meetingslot as $Meetingslots)
                    {
                        if($Meetingslots->booked == 0)
                        {
                            $realslot[$count1]["dentistid"] = $Meetingslots->dentistid;
                            $realslot[$count1]["name"] = $User->name;
                            $realslot[$count1]["slot"] = $Meetingslots->slot;
                            $count1++;
                        }
                    }
                }

                if($realslot == null)
                {
                    return view('pages.meeting.index')->with('errorMsg','No Dentist is available on selected date.');
                }
                else
                {
                    //$User = User::where('user_type','Dentist')->get();
                    $symptom = $request->sel_symp;
                    $date = $request-> date;
                    $service = $request-> service;
                    //dd($realslot);
                    
                    //$respond = ["limit"=>$limit, "listofslots"=>$listofslots, "realslot"=>$realslot];
                    //dd($respond);
                    return view('pages.meeting.bookslot', compact('realslot', 'date', 'service', 'symptom'));
                }
            }
        }
    }

    public function book(Request $request, $dentistid, $date, $slot, $service, $symptom)
    {
        $patientid = Auth::id();

        // use of explode
        $string = $symptom;
        $symp_arr = explode (",", $string); 
        
        $symptomlist = "";
        for($i=0; $i<count($symp_arr); $i++)
        {
            $symp = Symptom::where('id', $symp_arr[$i])->first();
            $sympname = $symp->name;
            $symptomlist = $symptomlist.$sympname.",";
        }
        $getdentistname = User::where('id', $dentistid)->first();
        $dentistname = $getdentistname->name;
        //1. create meeting
        Bookedmeeting::create(
            [
                'patientid' => $patientid, 
                'date' => $date,
                'service' => $service,
                'dentistid' => $dentistid,
                'dentistname' => $dentistname,
                'slot' => $slot,
                'symptom' => $symptomlist,
                'status' => "Pending" 
            ]);
        
        //2. get selected service workload
        
        $getservice = Appointmentsetting::where('service',$service)->first();
        $service_wl = $getservice-> TaskWorkload;
        
        //3. update selected dentist current workload
        
        $update_schedule = Workschedule::where('DentistID', $dentistid)->where('start', $date)->first();
        $dentist_wl = $update_schedule-> workload;
        $new_dentist_wl = $service_wl + $dentist_wl;
        $update_schedule->update(['workload' => $new_dentist_wl]);

        //4. change booked to 1 for the slot
        
        $update_booked = Meetingslot::where('dentistid', $dentistid)->where("date", $date)->where("slot", $slot)->update(['booked' => 1]);
        $Bookedmeeting = Bookedmeeting::where('patientid',$patientid )->orderBy('date','desc')->get();
        return view('pages.meeting.meetingstatus', compact('Bookedmeeting'))->with('successMsg','Meeting has been booked .');

        //return $respond = ["service_wl"=>$service_wl,"dentist_wl"=>$dentist_wl,"new_dentist_wl"=>$new_dentist_wl , "symptomlist"=> $symptomlist];
        //return $respond = ["patientid"=>$patientid , "date"=> $date, "slot"=> $slot, "symptomlist"=> $symptomlist,"service"=>$service];

    }

    public function cancel(Bookedmeeting $Bookedmeeting)
    {
        $patientid = Auth::id();
        $Bookedmeetings = Bookedmeeting::where('id', $Bookedmeeting->id)->first();
        $cancel = $Bookedmeetings->update(['status' => 'Cancelled']);
        //return $Bookedmeeting->id;
        //1. get selected service workload
        $ServiceName = $Bookedmeeting->service;
        $getservice = Appointmentsetting::where('service',$ServiceName)->first();
        $service_wl = $getservice-> TaskWorkload;
        //$Workschedule = Workschedule::where
        //2. get dentistid and date
        $dentistid = $Bookedmeeting->dentistid;
        $date = $Bookedmeeting->date;
        $slot = $Bookedmeeting->slot;
        //3. update selected dentist current workload
        $update_schedule = Workschedule::where('DentistID', $dentistid)->where('start', $date)->first();
        $dentist_wl = $update_schedule-> workload;
        $new_dentist_wl = $dentist_wl - $service_wl;
        $update_schedule->update(['workload' => $new_dentist_wl]);
        //4. update booked to 0
        $update_booked = Meetingslot::where('dentistid', $dentistid)->where("date", $date)->where("slot", $slot)->update(['booked' => 0]);
        //$Bookedmeeting = Bookedmeeting::where('patientid',$patientid )->get();
        //5. delete booked meeting
        //$cancel= Bookedmeeting::where('id', $Bookedmeeting->id)->first();
        //6. return
        $Bookedmeeting = Bookedmeeting::where('patientid',$patientid )->orderBy('date','desc')->get();
        return view('pages.meeting.meetingstatus', compact('Bookedmeeting'))->with('successMsg','Meeting has been cancelled .');

    }
    
    public function view($id)
    {
        $patientid = Auth::id();
        $Bookedmeetingid = Bookedmeeting::findOrFail($id);   
        $Bookedmeeting = Bookedmeeting::where('patientid',$patientid )->get();

        //list($role_list) = $this->PCS();
        return view('pages.meeting.view', compact('Bookedmeetingid', $patientid, 'Bookedmeeting'));
    }
    
    public function viewupdate($id)
    {
        $dentistid = Auth::id();
        $Bookedmeetingid = Bookedmeeting::findOrFail($id);   
        $Bookedmeeting = Bookedmeeting::where('dentistid',$dentistid )->orderBy('date','desc')->get();
        return view('pages.meeting.viewupdate', compact('Bookedmeetingid', $dentistid, 'Bookedmeeting'));
    }

    public function meetingstatus()
    {
        $patientid = Auth::id();
        $Bookedmeeting = Bookedmeeting::where('patientid',$patientid )->orderBy('date','desc')->get();
        return view('pages.meeting.meetingstatus', compact('Bookedmeeting'));
    }

    public function updatestatus()
    {
        $dentistid = Auth::id();
        $Bookedmeeting = Bookedmeeting::where('dentistid',$dentistid )->orderBy('date','desc')->get();
        return view('pages.meeting.updatestatus', compact('Bookedmeeting'));
    }

    public function reject(Bookedmeeting $Bookedmeeting)
    {
        $dentistid = Auth::id();
        $Bookedmeeting = Bookedmeeting::where('id', $Bookedmeeting->id)->first();
        $reject = $Bookedmeeting->update(['status' => 'Rejected']);
        //return $Bookedmeeting->id;
        //1. get selected service workload
        $ServiceName = $Bookedmeeting->service;
        $getservice = Appointmentsetting::where('service',$ServiceName)->first();
        $service_wl = $getservice-> TaskWorkload;
        //$Workschedule = Workschedule::where
        //2. get dentistid and date
        //$dentistid = $Bookedmeeting->dentistid;
        $date = $Bookedmeeting->date;
        $slot = $Bookedmeeting->slot;
        //3. update selected dentist current workload
        $update_schedule = Workschedule::where('DentistID', $dentistid)->where('start', $date)->first();
        $dentist_wl = $update_schedule-> workload;
        $new_dentist_wl = $dentist_wl - $service_wl;
        $update_schedule->update(['workload' => $new_dentist_wl]);
        //4. update booked to 0
        $update_booked = Meetingslot::where('dentistid', $dentistid)->where("date", $date)->where("slot", $slot)->update(['booked' => 0]);
        //$Bookedmeeting = Bookedmeeting::where('patientid',$patientid )->get();
        //5. delete booked meeting
        $cancel= Bookedmeeting::where('id', $Bookedmeeting->id)->first();
        //6. return
        $Bookedmeeting = Bookedmeeting::where('dentistid',$dentistid )->orderBy('date','desc')->get();
        return view('pages.meeting.updatestatus', compact('Bookedmeeting'))->with('successMsg','Meeting has been rejected .');


        //$Bookedmeeting = Bookmeeting::where('id',$id)->first()->update(['status'=> 'Rejected']);
    }
    public function approve($id)
    {

        $dentistid = Auth::id();
        $Bookedmeetings =Bookedmeeting::find($id);
        $Bookedmeetings->update(['status'=> 'Approved']);
        $Bookedmeeting = Bookedmeeting::where('dentistid',$dentistid )->orderBy('date','desc')->get();
        return view('pages.meeting.updatestatus', compact('Bookedmeeting'))->with('successMsg','Meeting has been accepted .');

    }

}
