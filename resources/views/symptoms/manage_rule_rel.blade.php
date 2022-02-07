@extends('layouts.admin.app')

@section('third_party_stylesheets')

<!-- Editable Table -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>



@endsection

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item">Manage Symptoms, Medical Conditions, Treatments/ Prescriptions</li>
    <li class="breadcrumb-item active">Manage Related Symptoms</li>

</ol>
@endsection

@section('content')
<div class="container-fluid">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="card">
    <h3 class="card-header">
            <div class="row">
            <div class="col-1">
                <a class="btn btn-dark cil-arrow-thick-left" href="{{ route('symptoms.index') }}"></a>
            </div>
            <div class="col-11">
                Manage Symptoms Related to <span style="color:#0585f2;">{{$condition->name}}</span>
            </div></div>
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

            <div class="row mb-2">
                <div class="col-2 ml-auto">
                    <a class="btn xbtn-block btn-lg btn-pill btn-success float-right font-weight-bolder cil-plus" type="button"
                        href="{{ route('symptoms.create_rule_rel',$condition->id) }}"></a></div>

            </div>
            <table class="table table-responsive-sm xtable-bordered">
                <thead>
                    <tr>
                        <th>Symptom</th>
                        <th>CF Value</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rule_relations as $rule_relation)
                    @if ($condition->id == $rule_relation->cond_id)
                    <tr>
                        <td>{{ $rule_relation->symp_name }}</td>
                        <td>{{ $rule_relation->cf_value }}</td>
                        <td class="text-center">
                            <form action="{{ route('symptoms.destroy_rule_rel',[$condition, $rule_relation->id]) }}" method="POST">
                                <div class="xbtn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-info btn-lg cil-pencil"
                                        href="{{ route('symptoms.edit_rule_rel',[$condition, $rule_relation->id]) }}"></a>

                                    @csrf
                                    @method('POST')

                                    <button type="submit" class="btn btn-danger btn-lg cil-trash"></button></div>
                            </form>
                        </td>

                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
