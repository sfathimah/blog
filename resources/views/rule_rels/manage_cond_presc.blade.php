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
    <li class="breadcrumb-item active">Manage Related Treatments/ Prescriptions</li>

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
                Manage Treatments/ Prescriptions Related to <span style="color:#0585f2;">{{$condition->name}}</span>
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
                    <a class="btn xbtn-block btn-lg btn-pill btn-success float-right font-weight-bolder cil-plus"
                        type="button" href="{{ route('rule_rels.create_cond_presc',$condition->id) }}"></a></div>

            </div>
            <table class="table table-responsive-sm xtable-bordered">
                <thead>
                    <tr>
                        <th>Presription</th>
                        <th>CF Value</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cond_prescs as $cond_presc)
                    @if ($condition->id == $cond_presc->cond_id)
                    <tr>
                        <td>{{ $cond_presc->presc_name }}</td>
                        <td>{{ $cond_presc->cf_value }}</td>
                        <td class="text-center">
                            <form action="{{ route('rule_rels.destroy_cond_presc',[$condition, $cond_presc->id]) }}"
                                method="POST">
                                <div class="xbtn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-info btn-lg cil-pencil"
                                        href="{{ route('rule_rels.edit_cond_presc',[$condition, $cond_presc->id]) }}"></a>

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
