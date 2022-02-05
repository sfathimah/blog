<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Workschedule;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Meetingslot;
  
class FullCalenderController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $User = User::where('user_type' , 'Dentist')->paginate(200);
       
        return view('pages.schedule.index',compact('User'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
 
    /**
     * Write code on Method
     *
     * @return response()
     */

    public function fullcalender(Request $request, User $User)
    {
        // $User = User::where('id' , $User)->first();
        if($request->ajax()) {
       
            $data = Workschedule::whereDate('start', '>=', $request->start)
                      ->whereDate('end',   '<=', $request->end)
                      ->where('DentistID', $User->id)
                      ->get(['id', 'start', 'end']);
 
            return response()->json($data);
       }
 
       return view('pages.schedule.fullcalender', compact('User'));
    }

    public function destroy(User $User)
    {
        
        $Meetingslot = Meetingslot::where('dentistid', $User->id)->delete();
        $Workschedule = Workschedule::where('DentistID', $User->id)->delete();
        $User->delete();
  
        return redirect()->route('pages.schedule.index')
                        ->with('success','Selected dentist data deleted successfully');
    }

  
    public function edit(User $User)
    {
        return view('pages.schedule.edit',compact('User'));
    }

    public function create()
    {
        return view('pages.schedule.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'icno' => 'required|numeric',
        ]);

        User::create([ 
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
            'icno' => $request->icno,
            'user_type' => "Dentist"
        ]);

        return $this->index()->with('successMsg','New Dentist has been added.');

        // $User = User::where('user_type' , 'Dentist')->paginate(200);
       
        // return view('pages.schedule.index',compact('User'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5)->with('successMsg','New Dentist has been added.');

    }

    public function update(Request $request, User $User)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'icno' => 'required|numeric',
        ]);

        $User->update($request->all());
        return redirect()->route('pages.schedule.index')
                        ->with('success','Dentist data has been updated successfully');
    }

    public function ajax(Request $request, User $User)
    {
        switch ($request->type) {
           case 'add':
              $event = Workschedule::create([
                  'start' => $request->start,
                  'end' => $request->end,
                  'DentistID' => $User->id,
              ]);

              $slot = array("9:00 AM - 10:00 AM", "10:00 AM-11:00 AM", "11:00 AM-12:00 PM", "12:00 PM-1:00 PM", "2:00 PM-3:00PM", "3:00PM-4:00PM", "4:00PM-5:00PM");
              foreach ($slot as $slots) {
                $Meetingslot = Meetingslot::create([
                    'date' => $request->start,
                    'dentistid' => $User->id,
                    'slot' => $slots,
                ]);
                }

              return view('pages.schedule.fullcalender', compact('User'));
              break;
  
        //    case 'update':
        //       $event = Workschedule::find($request->id)->update([
        //           'start' => $request->start,
        //           'end' => $request->end,
        //       ]);

        //       $slot = array("9-10", "10-11", "11-12", "12-1", "2-3", "3-4", "4-5");
        //       foreach ($slot as $slots) {
        //         dd($request->start);
        //         $Meetingslot = Meetingslot::where('date',$request->start)->where('dentistid',$User->id)->where('slot', $slots)->update([
        //             'date' => $request->start,
                    
        //         ]);
        //         }

        //       //return view('pages.schedule.fullcalender', compact('User'));
        //       break;
  
           case 'delete':
            //   $event = Workschedule::find($request->id)->get();
            //   $start = $event ->start;
            //   dd($start);
             //$date = Workschedule::where('id', $request->id)->first();
            //   dd($date);

              //$event
              
              $event = Workschedule::where('id', $request->id)->first();
              $date = $event->start;
              //echo($event);
              $Meetingslot = Meetingslot::where('date', $date)->where('dentistid',$User->id)->delete();
              $event = Workschedule::where('id', $request->id)->delete();
              //return $respond = ["event"=>$event , "date"=> $date, "Meetingslot"=>$Meetingslot];
              return view('pages.schedule.fullcalender', compact('User'));
              break;
             
           default:
             # code...
             break;
        }
    }
}
