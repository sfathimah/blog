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
                                            <th>Patient Name</th>
                                            <td>{{$patientname}}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td class="font-weight-bold {{$text}}">{{$Bookedmeetingid->status}}</td>
                                        </tr>
                                    </table>
                                    </div>

                                    @if ($i == "Completed")

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
                                        <div class="mt-4">
                                            <span class="h3">Diagnosis Details</span> 
                                        </div>
                                        
                                        <table class="table table-bordered align-items-center table-flush my-1">

                                            <tr>
                                                <th>Selected Symptoms</th>
                                                <td>
                                                @php
                                                $sel_symp = $diagnosis->sel_symp;
                                                $sel_symps = explode(',', $sel_symp);

                                                $d = [];
                                                @endphp

                                                @foreach ($sel_symps as $sel_symp)
                                                    @php
                                                    $symp = DB::table('symptoms')->where('id',$sel_symp)->first();
                                                    @endphp

                                                    {{$symp->name}}<br>
                                                @endforeach

                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Selected Medical Conditions</th>
                                                <td>
                                                    @php
                                                    $sel_cond = $diagnosis->sel_cond;
                                                    $sel_conds = explode(',', $sel_cond);

                                                    $d = [];
                                                    @endphp

                                                    @foreach ($sel_conds as $sel_cond)
                                                        @php
                                                        $cond = DB::table('conditions')->where('id',$sel_cond)->first();
                                                        @endphp

                                                        {{$cond->name}}<br>
                                                    @endforeach
                                            
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Selected Prescriptions</th>
                                                <td>
                                                    @php
                                                    $sel_presc = $diagnosis->sel_presc;
                                                    $sel_prescs = explode(',', $sel_presc);

                                                    $d = [];
                                                    @endphp

                                                    @foreach ($sel_prescs as $sel_presc)
                                                        @php
                                                        $presc = DB::table('prescriptions')->where('id',$sel_presc)->first();
                                                        @endphp

                                                        {{$presc->name}}<br>
                                                    @endforeach
                                            
                                                </td>
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
