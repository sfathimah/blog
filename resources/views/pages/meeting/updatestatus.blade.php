@extends('layouts.dentist.app')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active">View Meeting History</li>

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

                            <table class="table table-responsive-sm xtable-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Time</th>
                                        <th class="text-center">Status</th>
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

                                    <div class="modal fade" id="staticBackdropLive" data-coreui-backdrop="static"
                                        data-coreui-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLiveLabel">Confirmation
                                                    </h5>
                                                    <button class="btn-close" type="button" data-coreui-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to reject this meeting?</p>
                                                </div>
                                                <div class="modal-footer text-right">
                                                    <button class="btn btn-secondary" type="button"
                                                        data-coreui-dismiss="modal">Close</button>

                                                    <div class="modal-body">
                                                        <div id="understood"></div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="staticBackdropLive2" data-coreui-backdrop="static"
                                        data-coreui-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLiveLabel">Confirmation
                                                    </h5>
                                                    <button class="btn-close" type="button" data-coreui-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to accept this meeting?</p>
                                                </div>
                                                <div class="modal-footer text-right">
                                                    <button class="btn btn-secondary" type="button"
                                                        data-coreui-dismiss="modal">Close</button>

                                                    <div class="modal-body">
                                                        <div id="understood"></div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <tr>
                                        <td class="text-center">{{ $Bookedmeetings->date }}</td>
                                        <td class="text-center">{{ $Bookedmeetings->slot }}</td>
                                        <td class="{{$text}} font-weight-bold text-center">{{ $Bookedmeetings->status }}
                                        </td>
                                        <td class="text-center">{{ $patientname }}</td>

                                        <td class="text-center">
                                            <div class="xbtn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-info"
                                                    href="{{ route('pages.meeting.viewupdate',$Bookedmeetings->id) }}">View</a>
                                                @php
                                                if($Bookedmeetings->status == "Approved" || $Bookedmeetings->status == "Rejected")
                                                {
                                                $class1 = 'invisible ';
                                                $class = 'invisible ';
                                                }
                                                else
                                                {
                                                $class = 'visible';
                                                $class1 = 'visible';
                                                }
                                                @endphp
                                                
                                                <a class="btn btn-success {{$class}}"
                                                    href="{{ route('pages.meeting.approve',$Bookedmeetings->id) }}">Approve</a>
                                                <!-- <button type="button" data-coreui-toggle="modal"
                                                    data-coreui-target="#staticBackdropLive2" id="cancelBtn"
                                                    class="btn btn-success approve {{$class}}"
                                                    data-id="{{$Bookedmeetings->id}}">Approve</button> -->
                                                @csrf
                                                @method('POST')

                                               
                                                <button type="button" data-coreui-toggle="modal"
                                                    data-coreui-target="#staticBackdropLive" id="cancelBtn"
                                                    class="btn btn-danger reject {{$class1}}"
                                                    data-id="{{$Bookedmeetings->id}}">Reject</button>



                                        </td>
                                    </tr>


                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('page_scripts')
<script>
    $(document).ready(function () {

        $('.reject').click(function (event) {

            event.preventDefault();
            var ids = $(this).data('id');
            console.log(window.location.href);
            var route = window.location.origin + "/pages/meeting/reject/" + ids;
            var button = '<a class="btn btn-primary" id="understood" href="' + route +
            '"> Confirm </a>';

            $('#understood').html(button);
            $('#staticBackdropLive').modal('show');
        });


    });

    // $(document).ready(function () {

    //     $('.approve').click(function (event) {

    //         event.preventDefault();
    //         var ids = $(this).data('id');
    //         console.log(window.location.href);
    //         var route = window.location.origin + "/pages/meeting/approve/" + ids;
    //         var button = '<a class="btn btn-primary" id="confirm" href="' + route +
    //         '"> Confirm </a>';

    //         $('#confirm').html(button);
    //         $('#staticBackdropLive2').modal('show');
    //     });


    // });

</script>
@endpush

@push('js')
<!-- <script>
    $(".cancel").on("submit", function () {
        return confirm("Cancel Appointment?");
    });

</script> -->
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
