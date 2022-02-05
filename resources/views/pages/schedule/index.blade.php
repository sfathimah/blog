@extends('layouts.admin.app')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active">Manage Dentists' Data and Schedule</li>

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
                @endif
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

                <div class="nav-tabs-boxed" id="page-font">
                    
                    <div class="tab-content">
                        <div class="tab-pane active" id="service" role="tabpanel">
                        
                            <div class="row mb-2"> 
                                <div class="col-2 ml-auto">
                                    <a class="btn xbtn-block btn-lg btn-pill btn-success float-right font-weight-bolder cil-plus" type="button" 
                                        title="Add New Dentist"
                                        href="{{ route('pages.schedule.create') }}"></a>
                                    </div>

                            </div>
                                
                            <table class="table table-responsive-sm xtable-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Name</th>
                                        <th style="width:30%" class="text-center">Action</th>                                                                                                                                                                                                                                                                                                                                                           </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($User as $User)
                                    <tr>
                                    <td class="text-center">{{ $User->name }}</td>
                                    
                                        <td class="text-center">
                                           
                                            <form action="{{ route('pages.schedule.destroy',$User->id) }}" method="POST">
                                                <div class="xbtn-group" role="group" aria-label="Basic example">
                                                    <a class="btn btn-info btn-lg cil-pencil"
                                                        href="{{ route('pages.schedule.edit',$User->id) }}"></a>
                                                    <a class="btn btn-primary btn-lg cil-calendar"
                                                        href="{{ route('pages.schedule.fullcalender',$User->id) }}"></a>
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