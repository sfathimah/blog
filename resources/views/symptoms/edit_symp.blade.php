@extends('layouts.admin.app')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item">Manage Symptoms, Medical Conditions, Treatments/ Prescriptions</li>
    <li class="breadcrumb-item active">Edit Symptom</li>

</ol>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
    <h3 class="card-header">
            <div class="row">
            <div class="col-1">
                <a class="btn btn-dark cil-arrow-thick-left" href="{{ route('symptoms.index') }}"></a>
            </div>
            <div class="col-11">
                Edit Symptom
            </div></div>
        </h3>

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

            <form action="{{ route('symptoms.update_symp',$symptom->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                        <strong>Name:</strong>
                            <input type="text" name="name" value="{{ $symptom->name }}" class="form-control text-body"
                                placeholder="Name">
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
