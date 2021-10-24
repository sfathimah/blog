@extends('layouts.app')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item">Manage Services and It's TFactor and Expected Duration</li>
    <li class="breadcrumb-item active">Add New Services and It's TFactor and Expected Duration</li>

</ol>
@endsection

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Service</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('pages.workload.appointmentSetting') }}"> Back</a>
        </div>
    </div>
</div>
   

<form action="{{ route('pages.workload.store_serv') }}" method="POST">
    @csrf
  
     <div class="row mt-5">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Service:</strong>
                <input type="text" name="service" class="form-control" placeholder="Service"><br>
                <strong>TFactor:</strong>
                <input type="text" name="TFactor" class="form-control" placeholder="TFactor">
                <strong>Duration:</strong>
                <input type="text" name="duration" class="form-control" placeholder="Expected Duration">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
</div>
@endsection