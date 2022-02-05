@extends('layouts.app')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('pages.meeting.meetingstatus') }}">Update Meeting Status</a></li>
    <li class="breadcrumb-item active">View Meeting Details</li>

</ol>
@endsection
@section('content')
<div class="container-fluid">
    <div class="col-10 m-auto">
        <div class="card">
            <div class="card-header">Book Available Slots
            </div>
            <div class="card-body">
                @if(!empty($successMsg))
                <div class="alert alert-success"> {{ $successMsg }}
                </div>
                @endif
                <div class="nav-tabs-boxed" id="page-font">

                    <div class="tab-content">
                        <div class="tab-pane active" id="service" role="tabpanel">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <?php
                                    $status = $Bookedmeetingid->status;
                                    $color = ""; 
                                    switch($status){
                                        case "Approved":
                                        case "Booked": $color="#2C87F0"; break;
                                        case "Completed": $color="#32CD32"; break;
                                        case "Pending": $color="#FFB300"; break;
                                        case "Cancelled": $color="#CC3300"; break;
                                        default : $color="blue";

                                    }
                                    ?>
                                    <table class="table align-items-center table-flush">
                                        <tr>
                                            <th>Appointment Date</th>
                                            <td>{{$Bookedmeetingid->date}}</td>
                                        </tr>
                                        <tr>
                                            <th>Appointment Time</th>
                                            <td>{{$Bookedmeetingid->slot}}</td>
                                        </tr>
                                        <tr>
                                            <th>Symptoms</th>
                                            <td>{{$Bookedmeetingid->symptom}}</td>
                                        </tr>
                                        <tr>
                                            <th>Treatment</th>
                                            <td>{{$Bookedmeetingid->service}}</td>
                                        </tr>
                                        <tr>
                                            <th>Dentist Name</th>
                                            <td>{{$Bookedmeetingid->dentistname}}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td style="color:{{$color}};">{{$Bookedmeetingid->status}}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="text-center">
                                    <a href="{{ route('pages.meeting.meetingstatus') }}" class="btn btn-success mt-4">Back</a>
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
<!--  -->
