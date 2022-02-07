@extends('layouts.admin.app')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('pages.meeting.adminview') }}">View Overall Appointment</a></li>
    <li class="breadcrumb-item active">View Selected Appointment Details</li>

</ol>
@endsection
@section('content')
<div class="container-fluid">
    <div class="col-10 m-auto">
        <div class="card">
            <div class="card-header">View Appointment Details
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
                                @php $i=$Bookedmeetingid->status;@endphp
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
                                    @php
                                    $patientid = $Bookedmeetingid-> patientid;
                                    $patient = DB::table('users')->where('id',$patientid)->first();
                                    $patientname = $patient-> name;
                                    @endphp
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
                                            <th>Patient Name</th>
                                            <td>{{$patientname}}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td class="font-weight-bold {{$text}}">{{$Bookedmeetingid->status}} <span class="font-weight-light" style="color:black">on {{$Bookedmeetingid->updated_at}}</span></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <a  href="{{ route('pages.meeting.adminview') }}" class="btn btn-success mt-4">Back</a>
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
