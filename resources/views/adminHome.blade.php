@extends('layouts.admin.app')
@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>

</ol>
@endsection

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <?php
                            $user = \Auth::user()->id;
                            $currentdate=  date("Y-m-d");
                            $firstDayNextMonth = date('Y-m-d', strtotime('first day of next month'));
                            $nextdate = date('d/m/Y', strtotime('+2 months'));
                            $total_dentist = DB::table('users')->where('user_type','Dentist')->count();
                            $threshold = DB::table('thresholds')->first();
                            $max = $threshold-> threshold;
                            $pending_app = DB::table('bookedmeetings')->where('dentistid',$user)->where('status','Pending')->count();
                           // $pending = DB::table('invoice')->where('patient_id',$user)->where('status',0)->count();
                           ?>
                           @php
                           
                            $currentmonth= date("Y-m-d");
                            $nextmonth = date('Y-m-d', strtotime('first day of next month'));
                            $datetime1 = new DateTime($currentmonth);
                            $datetime2 = new DateTime($nextmonth);
                            $interval = $datetime1->diff($datetime2);
                            $days = $interval->format('%a');
                           @endphp
                           @php 
                            $lastbookeddate = DB::table('workschedules')->orderBy('start','desc')->first();
                            $valuelbd = $lastbookeddate -> start;
                            $lastmonth = date("n",strtotime($valuelbd));
                            $pendingmonth = $lastmonth+1;

                            if($pendingmonth == 1){ $themonth= "January";}
                            if($pendingmonth == 2){ $themonth= "February";}
                            if($pendingmonth == 3){ $themonth= "March";}
                            if($pendingmonth == 4){ $themonth= "April";}
                            if($pendingmonth == 5){ $themonth= "May";}
                            if($pendingmonth == 6){ $themonth= "June";}
                            if($pendingmonth == 7){ $themonth= "July";}
                            if($pendingmonth == 8){ $themonth= "August";}
                            if($pendingmonth == 9){ $themonth= "September";}
                            if($pendingmonth == 10){ $themonth= "October";}
                            if($pendingmonth == 11){ $themonth= "November";}
                            if($pendingmonth == 12){ $themonth= "December";}
                           @endphp
                                <div class="col-3">
                                    <div class="border-start border-start-4 border-start-danger px-3 mb-3">
                                        <big class="text-medium-emphasis mr-3">Next Schedule Update</big>
                                        <span class="fs-5 fw-semibold">{{$days}} days</span>
                                    </div>

                                </div>
                                <div class="col-3">
                                    <div class="border-start border-start-4 border-start-warning px-3 mb-3">
                                        <big class="text-medium-emphasis mr-3">Pending Schedule</big>
                                        <span class="fs-5 fw-semibold">{{$themonth}}</span>
                                    </div>

                                </div>
                                <div class="col-3">
                                    <div class="border-start border-start-4 border-start-info px-3 mb-3">
                                        <big class="text-medium-emphasis mr-3">Total Dentist</big>
                                        <span class="fs-5 fw-semibold">{{$total_dentist}}</span>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="border-start border-start-4 border-start-success px-3 mb-3">
                                        <big class="text-medium-emphasis mr-3">Maximum Daily Workload</big>
                                        <span class="fs-5 fw-semibold">{{$max}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">Overall Appointments</div>
                <div class="card-body">
                <div class="col text-right mb-3">
                        <a href="{{ route('pages.meeting.adminview') }}" class="btn btn-sm btn-primary">See
                            all Appointments</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table border mb-0 " >
                            <thead class="table-light fw-semibold">
                                <tr class="align-middle">
                                    @php
                                    $list =
                                    DB::table('Bookedmeetings')->orderBy('date','desc')->take(5)->get();
                                    $no = 1;
                                    @endphp
                                    <thead class="table-warning">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Time</th>
                                            <th class="text-center">Service</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Patient</th>
                                            <th class="text-center">Dentist</th>
                                            </th>
                                        </tr>
                                    </thead>
                            <tbody>
                                @foreach($list as $Bookedmeetings)
                                @php
                                $patientid = $Bookedmeetings-> patientid;
                                $patient = DB::table('users')->where('id',$patientid)->first();
                                $patientname = $patient-> name;

                                @endphp
                                @php $i=$Bookedmeetings->status;@endphp
                                    @php
                                    if($i=='Approved'){
                                    $bg='bg-primary';
                                    $text='text-primary';
                                    }
                                    else if($i=='Pending'){
                                    $bg='bg-secondary';
                                    $text='text-secondary';
                                    }
                                    else if($i=='Cancelled'){
                                    $bg='bg-warning';
                                    $text='text-warning';
                                    }
                                    else if($i=='Completed'){
                                    $bg='bg-success';
                                    $text='text-success';
                                    }
                                    else{
                                    $bg='bg-danger';
                                    $text='text-danger';
                                    }
                                    @endphp

                                <tr><?php
                                    $dentist = DB::table('users')->where('id', $Bookedmeetings->dentistid)->value('name');
                                    ?>
                                    <td class="text-center">{{$no}}</td>
                                    <td class="text-center">{{ $Bookedmeetings->date }}</td>
                                    <td class="text-center">{{ $Bookedmeetings->slot }}</td>
                                    <td class="text-center">{{ $Bookedmeetings->service }}</td>
                                    <td class="{{$text}} font-weight-bold text-center">{{ $Bookedmeetings->status }}
                                    <td class="text-center">{{ $patientname }} </td>
                                    <td class="text-center">{{ $Bookedmeetings ->dentistname }} </td>
                                </tr>
                                @php
                                $no++;
                                @endphp
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
