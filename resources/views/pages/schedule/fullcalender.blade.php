@extends('layouts.admin.app')


@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('pages.schedule.index') }}">Manage Dentists' Data and Schedule</a>
    </li>
    <li class="breadcrumb-item active">Update Dentists' Schedule</li>

</ol>
@endsection

@push('page_css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

<style>
    .fc-title {
        color: white;
        text-align: center;
    }

    .fc-content {
        color: black;
    }

</style>
@endpush('page_css')

@section('content')
<?php
        $mysqli = NEW MySQLi('localhost','root','','dentalsystem');
        $resultSet1 = $mysqli-> query("Select name, empid FROM dentist");
    ?>

<div class="container">
    <div class="card card-body">
        <div class="row">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>

        <div class="row">
            <div id="calendar"></div>
        </div>

        <input type="hidden" value="{{$User->id}}" name="userid" id="userid">

    </div>
</div>

@endsection

@push('page_scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    $(document).ready(function () {

        var SITEURL = "{{ url('/') }}";

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var userid = document.getElementById("userid").value;
        console.log(userid);
        var calendar = $('#calendar').fullCalendar({
            editable: true,
            events: SITEURL + "/schedule/" + userid + "/fullcalender",
            displayEventTime: false,
            eventRender: function (event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
            selectable: true,
            eventStartEditable: false,
            selectHelper: true,
            select: function (start, end, allDay) {
                var txt;
                if (confirm("Set selected date as working for selected dentist?")) {
                    
                    var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                    var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
                    $.ajax({
                        url: SITEURL + "/schedule/fullcalenderAjax/" + userid,
                        data: {
                            start: start,
                            end: end,
                            type: 'add',
                            "_token": "{{ csrf_token() }}"
                            // "id": id

                        },
                        type: "POST",
                        success: function (data) {
                            displayMessage("Work Status Update Successfully");
                            location.reload();
                            calendar.fullCalendar('renderEvent', {
                                id: data.id,
                                start: start,
                                end: end,
                                allDay: allDay
                            }, true);

                            calendar.fullCalendar('unselect');
                        }
                    });
                } else {
                    txt = "You pressed Cancel!";
                }
                // var Notes = prompt('Additional Notes*:');
                // if (Notes) 
                // {

                // }
            },
            // eventDrop: function (event, delta) {
            //     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
            //     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
                
            //     $.ajax({
            //         url: SITEURL + '/schedule/fullcalenderAjax/' + userid,
            //         data: {

            //             start: start,
            //             end: end,
            //             id: event.id,
            //             type: 'update',
            //             "_token": "{{ csrf_token() }}"
            //             // "id": id
            //         },
            //         type: "POST",
            //         success: function (response) {
            //             displayMessage("Work Status Updated Successfully");
            //         }
            //     });
            // },
            eventClick: function (event) {
                var deleteMsg = confirm("Do you really want to delete?");
                if (deleteMsg) {
                    $.ajax({
                        type: "POST",
                        url: SITEURL + '/schedule/fullcalenderAjax/' + userid,
                        data: {
                            id: event.id,
                            type: 'delete',
                            "_token": "{{ csrf_token() }}"
                            // "id": id
                        },
                        success: function (response) {
                            calendar.fullCalendar('removeEvents', event.id);
                            displayMessage("Working Status Deleted Successfully");
                        }
                    });
                }
            }

        });

    });

    function displayMessage(message) {
        toastr.success(message, 'Event');
    }

</script>
@endpush('page_scripts')
