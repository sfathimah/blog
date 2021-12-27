@extends('layouts.app')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('pages.workload.appointmentSetting') }}">Manage Services and Task Workload</a></li>
    <li class="breadcrumb-item active">Edit Services and Task Workload</li>

</ol>
@endsection

@section('content')
<div class="container-fluid">
    <div class="col-6 m-auto">
        <div class="card">
            <div class="card-header">Update Service and Task Workload
            </div>
            <div class="card-body">

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
            
                <form action="{{ route('pages.workload.update_serv',$AppointmentSetting->id) }}" method="POST">
                    @csrf
                    @method('PUT')
            
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <br>
                                <strong>Services:</strong>
                                <input type="text" name="service" value="{{ $AppointmentSetting->service }}" class="form-control" placeholder="Service"><br>
                                <strong>Task Workload:</strong>
                                <input type="text" name="TFactor" value="{{ $AppointmentSetting->TFactor }}" class="form-control" placeholder="TFactor"><br>
                                
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 ">
                            <button type="submit" class="btn btn-primary col-md-12">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
            
@endsection