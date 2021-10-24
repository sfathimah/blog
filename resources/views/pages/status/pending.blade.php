@extends('layouts.app')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active">Update Status Meeting</li>
</ol>
@endsection

@section('content')

<div class="container-fluid">
    <div class="col-12 m-auto">
        <div class="card">
            <div class="card-header">List of Meetings</div>
            <div class="card-body">
            @if(!empty($successMsg))
                <div class="alert alert-success"> {{ $successMsg }}</div>
                @endif
                <table class="table table-bordered">
                <thead>
                    <tr class="table-success">
                        <th scope="col">Patient ID</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Dentist</th>
                        <th scope="col">Service</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>    
                
                    @foreach ($meetings as $meeting)
            
                    <tr>
                        <td>{{ $meeting->patientID }}</td>
                        <td>{{ $meeting->date }}</td>
                        <td>{{ $meeting->time }}</td>
                        <td>{{ $meeting->dentist }}</td>
                        <td>{{ $meeting->service }}</td>
                        <td>{{ $meeting->status }}</td>
                        <td>
                        <a class="btn btn-success" href="{{ route('updateStatus', $meeting->id)}}">Update</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
  
            </div>
        </div>
    </div>
</div>
@endsection

