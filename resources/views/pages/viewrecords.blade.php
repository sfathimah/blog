@extends('layouts.admin.app')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('pages.viewprofile') }}">User Profile</a></li>
    <li class="breadcrumb-item active">View Patient Medical Records </li>

</ol>
@endsection
@section('content')
<div class="container-fluid">
    <div class="col-10 m-auto">
        <div class="card">
            <div class="card-header">
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
                                   
                                    <table class="table align-items-center table-flush">
                                    @php
                                        $patientid = $records-> patientID;
                                        $patient = DB::table('users')->where('id',$patientid)->first();
                                        $patientname = $patient-> name;
                                    @endphp
                                        <tr>
                                            <th>Patients Name</th>
                                            <td>{{$patientname}}</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            @php
                                            $ath = $records->ath;
                                            $athNotes = $records->athNotes;
                                            if($ath ==1)
                                            {$ans = "Yes"; $color="text-danger";}
                                            else{$ans="No"; $color="text-success";}
                                            @endphp
                                            <th>Admitted to hospital before?</th>
                                            <td class="{{$color}} font-weight-bold">{{$ans}}</td>
                                            <td>{{$athNotes}}</td>
                                        </tr>
                                        <tr>@php
                                            $si = $records->si;
                                            $siNotes = $records->siNotes;
                                            if($si ==1)
                                            {$ans = "Yes"; $color="text-danger";}
                                            else{$ans="No";$color="text-success";}
                                            @endphp
                                            <th>Serious Illness?</th>
                                            <td class="{{$color}} font-weight-bold">{{$ans}}</td>
                                            <td>{{$siNotes}}</td>
                                        </tr>
                                        <tr>@php
                                            $cm = $records->cm;
                                            $cmNotes = $records->cmNotes;
                                            if($cm ==1)
                                            {$ans = "Yes"; $color="text-danger";}
                                            else{$ans="No";$color="text-success";}
                                            @endphp
                                            <th>Current Medications</th>
                                            <td class="{{$color}} font-weight-bold">{{$ans}}</td>
                                            <td>{{$cmNotes}}</td>
                                        </tr>
                                        <tr>@php
                                            $al = $records->al;
                                            $alNotes = $records->alNotes;
                                            if($al ==1)
                                            {$ans = "Yes"; $color="text-danger";}
                                            else{$ans="No";$color="text-success";}
                                            @endphp
                                            <th>Allergies</th>
                                            <td class="{{$color}} font-weight-bold">{{$ans}}</td>
                                            <td>{{$alNotes}}</td>
                                        </tr>
                                        <tr>@php
                                            $ot = $records->ot;
                                            $otNotes = $records->otNotes;
                                            if($ot ==1)
                                            {$ans = "Yes"; $color="text-danger";}
                                            else{$ans="No";$color="text-success";}
                                            @endphp
                                            <th>Others?</th>
                                            <td class="{{$color}} font-weight-bold">{{$ans}}</td>
                                            <td>{{$otNotes}}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <a  href="{{ route('pages.viewprofile') }}" class="btn btn-success mt-4">Back</a>
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
