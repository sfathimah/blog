@extends('layouts.dentist.app')

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
                                    <?php
                                    $status = $Bookedmeetingid->status;
                                    $color = ""; 
                                    switch($status){
                                        case "Approved": $color="#2C87F0"; break;
                                        case "Booked": $color="#2C87F0"; break;
                                        case "Completed": $color="#32CD32"; break;
                                        case "Pending": $color="#d9e2ef"; break;
                                        case "Cancelled": $color="#FFB300"; break;	
                                        case "Rejected": $color="#d9534f"; break;
                                        default : $color="blue";

                                    }
                                    ?>
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
                                            <th>Patient Name</th>
                                            <td>{{$patientname}}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td class="font-weight-bold" style="color:{{$color}};">{{$Bookedmeetingid->status}}</td>
                                        </tr>
                                    </table>
                                    </div>

                                    @php

                                    $diagnosisid = $Bookedmeetingid->diagnosis_id;
                                    $statementid = $Bookedmeetingid->statement_id;

                                    $diagnosis = DB::table('diagnosis')->where('id',$diagnosisid)->first();
                                    $statements = DB::table('statement_datas')->where('statement_id',$statementid)->get();

                                    $symp = DB::table('symptoms')->where('id',$diagnosis->sel_symp)->first();
                                    $cond = DB::table('conditions')->where('id',$diagnosis->sel_cond)->first();
                                    $presc = DB::table('prescriptions')->where('id',$diagnosis->sel_presc)->first();

                                    $status = $Bookedmeetingid-> status;
                                    @endphp

                                    @if ($status == "Completed")
                                        <div class="mt-4">
                                            <span class="h3">Diagnosis Details</span> 
                                        </div>
                                        
                                        <table class="table table-bordered align-items-center table-flush my-1">

                                            <tr>
                                                <th>Selected Symptoms</th>
                                                <td>{{$diagnosis->sel_symp}}</td>
                                            </tr>
                                            <tr>
                                                <th>Selected Medical Conditions</th>
                                                <td>{{$diagnosis->sel_cond}}</td>
                                            </tr>
                                            <tr>
                                                <th>Selected Prescriptions</th>
                                                <td>{{$diagnosis->sel_presc}}</td>
                                            </tr>
                                            <tr>
                                                <th>Notes</th>
                                                <td>{{$diagnosis->notes}}</td>
                                            </tr>
                                        </table>

                                        <div class="mt-5">
                                            <span class="h3">Prescription Statement</span> 
                                        </div>
                                        <table class="table table-bordered align-items-center table-flush my-2">
                                            <tr>
                                                <th>#</th>
                                                <th>Prescription</th>
                                                <th>Qty</th>
                                                <th>Remark</th>
                                            </tr>

                                            @foreach ($statements as $statement)
                                            @php
                                            $presc = DB::table("prescriptions")->where("id",$statement->presc_id)->first();
                                            @endphp
                                            <tr>
                                                <td>{{$loop->index+1}}</td>
                                                <td>{{$presc->name}}</td>
                                                <td>{{$statement->qty}}</td>
                                                <td>{{$statement->remark}}</td>
                                            </tr>
                                            @endforeach
                                            

                                        </table>
                                    @endif
                                <div class="text-right">
                                    <a href="{{ route('pages.meeting.updatestatus') }}" class="btn btn-success mt-4">Back</a>
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
