@extends('layouts.admin.app')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active">Manage Dentist Workload</li>

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
                    aria-controls="home">Services</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#condition" role="tab"
                    aria-controls="profile">Threshold</a></li>
            
        </ul>
        <div class="tab-content">
        <div class="tab-pane active" id="service" role="tabpanel">
                <div class="row mb-2">
                    <div class="col-2 ml-auto">
                        <a class="btn xbtn-block btn-lg btn-pill btn-success float-right font-weight-bolder cil-plus" type="button" 
                            title="Add New Service"
                            href="{{ route('pages.workload.create_serv') }}"></a></div>

                </div>
                <table class="table table-responsive-sm xtable-bordered text-center">
                    <thead>
                        <tr>
                            <th>Service</th>
                            <th>TFactor</th>
                            <th>Duration</th>                                                                                                                                                                                                                                                                                                                                                           </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($AppointmentSetting as $AppointmentSetting)
                        <tr>
                            <td>{{ $AppointmentSetting->service }}</td>
                            <td>{{ $AppointmentSetting->TFactor }}</td>
                            <td>{{ $AppointmentSetting->duration }}</td>
                            <td>
                                <form action="{{ route('pages.workload.destroy_serv',$AppointmentSetting->id) }}" method="POST">
                                    <div class="xbtn-group" role="group" aria-label="Basic example">
                                        <a class="btn btn-info btn-lg cil-pencil"
                                            href="{{ route('pages.workload.edit_serv',$AppointmentSetting->id) }}"></a>

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

@endsection

