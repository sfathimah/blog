@extends('layouts.app')

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
        <h3 class="card-header">Edit Symptom</h3>

        <div class="card-body">
            <div class="row mb-5">
                <div class="col-lg-12 margin-tb">
                    <!-- <div class="pull-left">
                        <h2>Edit Symptom</h2>
                    </div> -->
                    <div class="pull-right">
                        <a class="btn btn-dark cil-arrow-thick-left" href="{{ route('symptoms.index') }}"></a>
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

            <form action="{{ route('symptoms.update_symp',$symptom->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label><h5>Name :</h5></label>
                            <input type="text" name="name" value="{{ $symptom->name }}" class="form-control"
                                placeholder="Name">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
