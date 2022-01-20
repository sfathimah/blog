@extends('layouts.app')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active">View Meeting Status</li>
</ol>
@endsection

@push('page_css')
<style>
#page-font {
    font-size: 0.975rem;
}
.nav-tabs .nav-link{
    /* border-color: #c4c9d0 #c4c9d0; */
    border-color: snow;
    margin-bottom: 0;
    background: 0 0 #b0c4d3d9;
    color: darkslategray;
}
.nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link {
    color: rgba(44, 56, 74, 0.95);
}

</style>
@endpush('page_css')

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
                    <tr class="table">
                        <th scope="col">Patient ID</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Dentist</th>
                        <th scope="col">Service</th>
                        <th scope="col">Status</th>
                        <th style="width:60px" scope="col">Update Status</th>
                    </tr>
                </thead>    
                    @foreach ($meetings as $meeting)
                    @php $i=$meeting->status;@endphp
                    @php
                        if($i=='Accepted'){
                            $bg='bg-success';
                            $text='text-success';
                        }
                        else if($i=='Pending'){
                            $bg='bg-warning';
                            $text='text-warning';
                        }
                        else{
                            $bg='bg-danger';
                            $text='text-danger';
                        }
                    @endphp
                    <tr>
                        <td>{{ $meeting->patientID }}</td>
                        <td>{{ $meeting->date }}</td>
                        <td>{{ $meeting->time }}</td>
                        <td>{{ $meeting->dentist }}</td>
                        <td>{{ $meeting->service }}</td>
                        <td class="{{$text}} font-weight-bold">{{ $meeting->status}}</td>
                        <td class="text-center"><a class="btn btn-info btn-lg cil-pencil" href="{{ route('updateStatus', $meeting->id)}}"></a></td>
                        
                    </tr>
                    @endforeach
                </table>
  
            </div>
        </div>
    </div>
</div>
@endsection

