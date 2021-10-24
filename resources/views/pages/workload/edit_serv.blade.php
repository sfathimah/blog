@extends('layouts.app')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item">Manage Services and It's TFactor and Expected Duration</li>
    <li class="breadcrumb-item active">Edit Services and It's TFactor and Expected Duration</li>

</ol>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Service</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('pages.workload.appointmentSetting') }}"> Back</a>
            </div>
        </div>
    </div>
   
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
                    <strong>TFactor:</strong>
                    <input type="text" name="TFactor" value="{{ $AppointmentSetting->TFactor }}" class="form-control" placeholder="TFactor"><br>
                    <strong>Duration:</strong>
                    <input type="text" name="duration" value="{{ $AppointmentSetting->duration }}" class="form-control" placeholder="duration"><br>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 ">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
    </div>
@endsection