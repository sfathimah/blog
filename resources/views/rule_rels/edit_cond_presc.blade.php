@extends('layouts.admin.app')

@section('third_party_stylesheets')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endsection

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item">Manage Symptoms, Medical Conditions, Treatments/ Prescriptions</li>
    <li class="breadcrumb-item active">Edit Related Treatment/ Prescription & CF</li>

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
                    Edit Treatment/ Prescription Related to <span style="color:#0585f2;">{{$condition->name}}</span>
                </div>
            </div>
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

            <form action="{{ route('rule_rels.update_cond_presc',[$cond_presc->id, $condition]) }}" method="POST">
                @csrf
                @method('POST')

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <strong>Treatment/ Prescription:</strong>
                            <!-- <input type="text" name="presc_id" value="{{ $cond_presc->presc_id }}" class="form-control" placeholder="Treatment/ Prescription"> -->
                            <select id="selectsearch" name="presc_id" class="form-select"
                                aria-label="Default select example">
                                <option selected>Select Treatment/ Prescription</option>
                                @foreach ($prescs as $presc)
                                @if($presc->id == $cond_presc->presc_id)
                                    <option value="{{ $presc->id }}" selected>{{ $presc->name }}</option>
                                    @else
                                    <option value="{{ $presc->id }}">{{ $presc->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <strong>CF Value:</strong>
                            <input type="text" name="cf_value" value="{{ $cond_presc->cf_value }}" class="form-control"
                                placeholder="CF Value">
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
            $("#selectsearch").select2({
                allowClear: true
            });

        </script>
        @endpush
