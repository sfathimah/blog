@extends('layouts.admin.app')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active">View Overall Appointment</li>

</ol>
@endsection
@section('content')
<div class="container-fluid">
    <div class="col-12 m-auto">
        <div class="card">
            <div class="card-header">Meeting History List
            </div>
            <div class="card-body">
                @if(!empty($successMsg))
                <div class="alert alert-success"> {{ $successMsg }}
                </div>
                @endif
                <div class="nav-tabs-boxed" id="page-font">

                    <div class="tab-content">
                        <div class="tab-pane active" id="service" role="tabpanel">
                        @if ($Bookedmeeting->count() == 0)
                        <tr>
                            <td colspan="5">No meetings are booked to display.</td>
                        </tr>
                        @endif

                            <table class="table table-responsive-sm xtable-bordered">
                                <thead>
                                    <tr>
                                    <th class="text-center">Date</th>
                                        <th class="text-center">Time</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Dentist</th>
                                        <th class="text-center">Patient</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($Bookedmeeting as $Bookedmeetings)
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

                                    @php
                                    $patientid = $Bookedmeetings-> patientid;
                                    $patient = DB::table('users')->where('id',$patientid)->first();
                                    $patientname = $patient-> name;
                                    @endphp

                                    <tr>
                                    <td class="text-center">{{ $Bookedmeetings->date }}</td>
                                        <td class="text-center">{{ $Bookedmeetings->slot }}</td>
                                        <td class="{{$text}} font-weight-bold text-center">{{ $Bookedmeetings->status }}</td>
                                        <td class="text-center">{{ $Bookedmeetings->dentistname }}</td>
                                        <td class="text-center">{{ $patientname }}</td>

                                        <td class="text-center">
                                            <div class="xbtn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-info"
                                                    href="{{ route('pages.meeting.adminviewdetails',$Bookedmeetings->id) }}">View</a>
                                        
                                        </td>
                                    </tr>
                                    

                                    @endforeach

                                </tbody>
                            </table>
                            {{ $Bookedmeeting->links() }}
                            <p>
                                Displaying {{$Bookedmeeting->count()}} of {{ $Bookedmeeting->total() }} appointment(s).
                            </p>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@push('js')
<!-- <script>
    $(".cancel").on("submit", function () {
        return confirm("Cancel Appointment?");
    });

</script> -->
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
