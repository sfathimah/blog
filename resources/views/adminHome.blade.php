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
                                <div class="col-4">
                                    <div class="border-start border-start-4 border-start-danger px-3 mb-3">
                                        <big class="text-medium-emphasis">Next Schedule Update</big>
                                        <span class="fs-5 fw-semibold">{{$firstDayNextMonth}}</span>
                                    </div>

                                </div>
                                <div class="col-4">
                                    <div class="border-start border-start-4 border-start-info px-3 mb-3">
                                        <big class="text-medium-emphasis">Total Dentist</big>
                                        <span class="fs-5 fw-semibold">{{$total_dentist}}</span>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="border-start border-start-4 border-start-success px-3 mb-3">
                                        <big class="text-medium-emphasis">Maximum Daily Workload</big>
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


@endsection
