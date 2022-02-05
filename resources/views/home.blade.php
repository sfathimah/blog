@extends('layouts.app')
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
                            $total_app = DB::table('bookedmeetings')->where('patientid',$user)->where('status','Completed')->count();
                            $next_app = DB::table('bookedmeetings')->where('patientid',$user)->where('date','>=',$currentdate)->where('status','Pending')->first();
                            $last_app = DB::table('bookedmeetings')->where('patientid',$user)->where('status','Completed')->orderBy('date', 'desc')->first();
                           // $pending = DB::table('invoice')->where('patient_id',$user)->where('status',0)->count();
                           ?>
                                <div class="col-4">
                                    <div class="border-start border-start-4 border-start-danger px-3 mb-3">
                                        <big class="text-medium-emphasis">Next Appointment</big>
                                        <span class="fs-5 fw-semibold">
                                            <?php
                                            if($next_app == null){ echo "0";
                                            } else { echo $next_app->date; } ?>
                                        </span>
                                    </div>

                                </div>
                                <div class="col-4">
                                    <div class="border-start border-start-4 border-start-info px-3 mb-3">
                                        <big class="text-medium-emphasis">Last Appointment</big>
                                        <span class="fs-5 fw-semibold"><?php
                                        if($last_app == null){ echo "0";
                                        } else { echo $last_app->date; } ?></span>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="border-start border-start-4 border-start-success px-3 mb-3">
                                        <big class="text-medium-emphasis">Total Appointment</big>
                                        <span class="fs-5 fw-semibold">{{$total_app}}</span>
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
                <div class="card-header">My Past Appointments</div>
                <div class="card-body">
                    <div class="col text-right">
                        <a href="{{ route('pages.meeting.meetingstatus') }}" class="btn btn-sm btn-primary">See
                            all</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table border mb-0 " >
                            <thead class="table-light fw-semibold">
                                <tr class="align-middle">
                                    @php
                                    $list =
                                    DB::table('Bookedmeetings')->where('patientid',$user)->where('status','Completed')->orderBy('date',
                                    'desc')->take(3)->get();
                                    $i = 1;
                                    @endphp
                                    <thead class="table-primary">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Time</th>
                                            <th class="text-center">Service</th>
                                            <th class="text-center">Dentist</th>
                                            </th>
                                        </tr>
                                    </thead>
                            <tbody>
                                @foreach($list as $Bookedmeetings)
                                <tr><?php
                                    $dentist = DB::table('users')->where('id', $Bookedmeetings->dentistid)->value('name');
                                    ?>
                                    <td class="text-center">{{$i}}</td>
                                    <td class="text-center">{{ $Bookedmeetings->date }}</td>
                                    <td class="text-center">{{ $Bookedmeetings->slot }}</td>
                                    <td class="text-center">{{ $Bookedmeetings->service }}</td>
                                    <td class="text-center">{{ $dentist }} </td>
                                </tr>
                                @php
                                $i++;
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
