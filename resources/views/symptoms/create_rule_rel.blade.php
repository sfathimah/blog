@extends('layouts.admin.app')

@section('third_party_stylesheets')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endsection

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item">Manage Symptoms, Medical Conditions, Treatments/ Prescriptions</li>
    <li class="breadcrumb-item active">Add Related Symptom & CF</li>

</ol>
@endsection

@section('content')
<div class="container-fluid">
<div class="card">
        <h3 class="card-header">
            <div class="row">
                <div class="col-1">
                    <a class="btn btn-dark cil-arrow-thick-left" href="{{ URL::previous() }}"></a>
                </div>
                <div class="col-11">
                Add Symptom Related to <span style="color:#0585f2;">{{$condition->name}}</span>
                </div>
            </div>
        </h3>

        <div class="card-body">
   
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
   
<form action="{{ route('symptoms.store_rule_rel', $condition) }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-6">
            <div class="form-group">
                <input type="text" name="cond_id" value="{{ $condition->id }}" class="form-control" placeholder="Symptom" hidden>

                <strong>Symptom:</strong>
                <!-- <input type="text" name="symp_id" class="form-control" placeholder="Symptom"> -->
                <select id="selectsearch" name="symp_id" class="form-select" aria-label="Default select example">
                    <option selected>Select Symptom</option>
                    @foreach ($symptoms as $symptom)
                        <option value="{{ $symptom->id }}">{{ $symptom->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <strong>CF Value:</strong>
                <input type="text" name="cf_value" class="form-control" placeholder="CF Value">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                <button type="submit" class="btn btn-success">Save</button>
        </div>
    </div>
   
</form>
</div>
</div>
</div>
@endsection

@push('page_scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
$("#selectsearch").select2( {
	allowClear: true
	} );
</script>
@endpush