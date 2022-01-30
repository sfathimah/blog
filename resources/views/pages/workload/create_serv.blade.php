@extends('layouts.app')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    
    <li class="breadcrumb-item"><a href="{{ route('pages.workload.appointmentSetting') }}">Manage Services and Task Workload</a></li>
    <li class="breadcrumb-item active">Add New Services and Task Workload</li>
</ol>
@endsection

@section('content')
<div class="container-fluid">
    <div class="col-6 m-auto">
        <div class="card">
            <div class="card-header">Add Service and Task Workload
            </div>
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
    

                    <form action="{{ route('pages.workload.store_serv') }}" method="POST">
                        @csrf
                    
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Service:</strong>
                                    <input type="text" name="service" class="form-control" placeholder="Service"><br>
                                    <strong>TFactor:</strong>
                                    <input type="text" name="TFactor" class="form-control" placeholder="TFactor"><br>
                                    
                                </div>
                            </div> <br>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-primary col-md-12">Add</button>
                            </div>
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection