@extends('layouts.app')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item">Manage Symptoms, Medical Conditions, Treatments/ Prescriptions</li>
    <li class="breadcrumb-item active">Add Related Symptom & CF</li>

</ol>
@endsection

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add Related Symptom & CF</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('symptoms.index') }}"> Back</a>
        </div>
    </div>
</div>
   
<!-- @if ($errors->any()) // nnti boleh guna ni utk disp error
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->
   
<form action="{{ route('symptoms.store_rule_rel') }}" method="POST">
    @csrf
  
     <div class="row mt-5">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <input type="text" name="cond_id" value="{{ $condition->id }}" class="form-control" placeholder="Symptom" hidden>

                <strong>Symptom:</strong>
                <input type="text" name="symp_id" class="form-control" placeholder="Symptom">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>CF Value:</strong>
                <input type="text" name="cf_value" class="form-control" placeholder="CF Value">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
</div>
@endsection