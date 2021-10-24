@extends('layouts.app')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active">Manage Symptoms, Medical Conditions, Treatments/ Prescriptions</li>

</ol>
@endsection

@push('page_css')
<style>
#page-font {
    font-size: 0.975rem;
}
.nav-tabs .nav-link{
    /* border-color: #c4c9d0 #c4c9d0; */
    border-color: snow;
    margin-bottom: 0;
    background: 0 0 #b0c4d3d9;
    color: darkslategray;
}
.nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link {
    color: rgba(44, 56, 74, 0.95);
}
</style>
@endpush('page_css')

@section('content')
<div class="container-fluid">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="nav-tabs-boxed" id="page-font">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#symptom" role="tab"
                    aria-controls="home">Symptoms</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#condition" role="tab"
                    aria-controls="profile">Medical Conditions</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#treatment" role="tab"
                    aria-controls="messages">Treatments/ Prescriptions</a></li>
        </ul>
        <div class="tab-content">
        
            <div class="tab-pane active" id="symptom" role="tabpanel">
                <div class="row mb-2">
                    <div class="col-2 ml-auto">
                        <a class="btn xbtn-block btn-lg btn-pill btn-success float-right font-weight-bolder cil-plus" type="button" 
                            title="Add New Symptom"
                            href="{{ route('symptoms.create_symp') }}"></a></div>

                </div>
                <table class="table table-responsive-sm xtable-bordered text-center">
                    <thead>
                        <tr>
                            <th>Symptom</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($symptoms as $symptom)
                        <tr>
                            <td>{{ $symptom->name }}</td>
                            <td>
                                <form action="{{ route('symptoms.destroy_symp',$symptom->id) }}" method="POST">
                                    <div class="xbtn-group" role="group" aria-label="Basic example">
                                        <a class="btn btn-info btn-lg cil-pencil"
                                            href="{{ route('symptoms.edit_symp',$symptom->id) }}"></a>

                                        @csrf
                                        @method('POST')

                                        <button type="submit" class="btn btn-danger btn-lg cil-trash"></button></div>
                                </form>
                            </td>
                            <!-- <td> //edit and delete button
                                <form action="{/{ route('symptoms.destroy_symp',$symptom->id) }}" method="POST">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a class="btn btn-primary"
                                            href="{/{ route('symptoms.edit_symp',$symptom->id) }}">Edit</a>

                                        @csrf
                                        @method('POST')

                                        <button type="submit" class="btn btn-danger">Delete</button></div>
                                </form>
                            </td> -->
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <!-- <ul class="pagination"> //paginaation nnti nak guna
                    <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul> -->
            </div>
            <div class="tab-pane" id="condition" role="tabpanel">
                <div class="row mb-2">
                    <div class="col-2 ml-auto">
                        <a class="btn xbtn-block btn-lg btn-pill btn-success float-right font-weight-bolder cil-plus" type="button"
                            href="{{ route('symptoms.create_cond') }}"></a></div>

                </div>
                <table class="table table-responsive-sm xtable-bordered text-center">
                    <thead>
                        <tr>
                            <th>Medical Condition</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($conditions as $condition)
                        <tr>
                            <td>{{ $condition->name }}</td>
                            <td>
                            <form action="{{ route('symptoms.destroy_cond',$condition->id) }}" method="POST">
                                <div class="xbtn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-dark btn-lg cil-playlist-add"
                                        href="{{ route('symptoms.manage_rule_rel',$condition->id) }}"></a>
                                        <a class="btn btn-info btn-lg cil-pencil"
                                        href="{{ route('symptoms.edit_cond',$condition->id) }}"></a>


                                        @csrf
                                        @method('POST')

                                        <button type="submit" class="btn btn-danger btn-lg cil-trash"></button></div>
                                </form>
                            </td>
                            <!-- <td> //edit and delete button
                                <form action="{/{ route('symptoms.destroy_symp',$symptom->id) }}" method="POST">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a class="btn btn-primary"
                                            href="{/{ route('symptoms.edit_symp',$symptom->id) }}">Edit</a>

                                        @csrf
                                        @method('POST')

                                        <button type="submit" class="btn btn-danger">Delete</button></div>
                                </form>
                            </td> -->
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="treatment" role="tabpanel">
                <div class="row mb-2">
                    <div class="col-2 ml-auto">
                        <a class="btn xbtn-block btn-lg btn-pill btn-success float-right font-weight-bolder cil-plus" type="button"
                            href="{{ route('symptoms.create_presc') }}"></a></div>

                </div>
                <table class="table table-responsive-sm xtable-bordered text-center">
                    <thead>
                        <tr>
                            <th>Treatment /Prescription</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prescriptions as $prescription)
                        <tr>
                            <td>{{ $prescription->name }}</td>
                            <td>
                                <form action="{{ route('symptoms.destroy_presc',$prescription->id) }}" method="POST">
                                    <div class="xbtn-group" role="group" aria-label="Basic example">
                                        <a class="btn btn-info btn-lg cil-pencil"
                                            href="{{ route('symptoms.edit_presc',$prescription->id) }}"></a>

                                        @csrf
                                        @method('POST')

                                        <button type="submit" class="btn btn-danger btn-lg cil-trash"></button></div>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{!! $symptoms->links() !!}
@endsection

