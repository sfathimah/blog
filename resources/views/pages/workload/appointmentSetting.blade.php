@extends('layouts.app')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active">Manage Services and Task Workload</li>

</ol>
@endsection

<!-- @push('page_css')
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
@endpush('page_css') -->

@section('content')
<div class="container-fluid">
    <div>
        <div class="card">
            <div class="card-body col-10 m-auto">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @elseif ($message = Session::get('error'))
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
                @else
                @endif

                <div class="nav-tabs-boxed" id="page-font">
                    
                    <div class="tab-content">
                        <div class="tab-pane active" id="service" role="tabpanel">
                        
                            <div>
                                <br>
                                <table>
                                    <tr >
                                        <td>Workload Threshold:   </td> 
                                        @foreach ($Threshold as $Threshold)
                                        <form action="{{ route('pages.workload.update_thres', $Threshold->id) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <td><input type="text" name="threshold" value="{{ $Threshold->threshold }}" class="form-control ml-2" placeholder="Threshold"></td>
                                        @endforeach
                                        <td>
                                            
                                                <div class="xbtn-group" role="group" aria-label="Basic example">
                                                    
                                                <button type="submit" class="btn btn-success btn-lg ml-3">Submit</button></div>
                                            
                                        </td>
                                        </form>
                                    </tr>
                                    
                                </table>
                                
                                <hr>
                            </div>
                            <div class="row mb-2"> 
                                <div class="col-2 ml-auto">
                                    <a class="btn xbtn-block btn-lg btn-pill btn-success float-right font-weight-bolder cil-plus" type="button" 
                                        title="Add New Service"
                                        href="{{ route('pages.workload.create_serv') }}"></a>
                                    </div>

                            </div>
                                
                            <table class="table table-responsive-sm xtable-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Service</th>
                                        <th class="text-center">Task Workload</th>
                                        <th style="width:30%" class="text-center">Action</th>                                                                                                                                                                                                                                                                                                                                                           </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($AppointmentSetting as $AppointmentSetting)
                                    <tr>
                                    <td class="text-center">{{ $AppointmentSetting->service }}</td>
                                        <td class="text-center">{{ $AppointmentSetting->TFactor }}</td>
                                    
                                        <td class="text-center">
                                            <!-- <form action="{{ route('pages.workload.update_newserv',$AppointmentSetting->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-success btn-lg cil-check-alt"></button>
                                            </form> -->
                                            <form action="{{ route('pages.workload.destroy_serv',$AppointmentSetting->id) }}" method="POST">
                                                <div class="xbtn-group" role="group" aria-label="Basic example">
                                                    <a class="btn btn-info btn-lg cil-pencil"
                                                        href="{{ route('pages.workload.edit_serv',$AppointmentSetting->id) }}"></a>
                                                        <!-- save on same page -->
                                                        <!-- <a class="btn btn-success btn-lg cil-check-alt"
                                                        href="{{ route('pages.workload.update_serv',$AppointmentSetting->id) }}"></a> -->
                                                        
                                                        <!-- disable the service
                                                        <a class="btn btn-warning btn-lg cil-low-vision hidden"
                                                        href="{{ route('pages.workload.edit_serv',$AppointmentSetting->id) }}"></a> -->
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
        </div>
    </div>
</div>

@endsection