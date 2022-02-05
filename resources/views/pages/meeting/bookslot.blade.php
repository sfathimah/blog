@extends('layouts.app')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('pages.meeting.index') }}">Book Appointment</a></li>
    <li class="breadcrumb-item active">Book Available Slots</li>

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
                        
                            <table class="table table-responsive-sm xtable-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Dentist</th> 
                                        <th class="text-center">Date</th> 
                                        <th class="text-center">Slots</th> 
                                        <th class="text-center">Book</th>                                                                                                                                                                                                                                                                                                                                                       </th>
                                    </tr>
                                </thead>
                                <tbody>

                                @for($i = 0; $i< count($realslot); $i++)
                           
                                    <tr>
                                    <td class="text-center">{{ $realslot[$i]['name'] }}</td>
                                    <td class="text-center">{{ $date }}</td>
                                    <td class="text-center">{{ $realslot[$i]['slot'] }}</td>
                                    
                                        <td class="text-center">
                                           
                                            <form action="{{ route('pages.meeting.book', [$realslot[$i]['dentistid'], $date, $realslot[$i]['slot'], $service, $symptom] ) }}" method="POST">
                                                    @csrf
                                                    @method('POST')

                                                    <button type="submit" class="btn btn-success btn-lg cil-calendar-check"></button></div>
                                            </form>
                                        </td>
                                    </tr>

                                @endfor

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