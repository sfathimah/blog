@extends('layouts.admin.app')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('pages.schedule.index') }}">Manage Dentists' Data and Schedule</a></li>
    <li class="breadcrumb-item active">Edit Dentists' Data</li>

</ol>
@endsection

@section('content')
<div class="container-fluid">
    <div class="col-6 m-auto">
        <div class="card">
            <div class="card-header">Update Dentists' Data
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
            
                <form action="{{ route('pages.schedule.update',$User->id) }}" method="POST">
                    @csrf
                    @method('PUT')
            
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <br>
                                <strong>Name:</strong>
                                <input type="text" name="name" value="{{ $User->name }}" class="form-control" placeholder="Name" required><br>
                                <strong>Email:</strong>
                                <input type="text" name="email" value="{{ $User->email }}" class="form-control" placeholder="Email" required><br>
                                <strong>IC No:</strong>
                                <input type="text" name="icno" value="{{ $User->icno }}" class="form-control" placeholder="IC No" required><br>
                                
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 ">
                            <button type="submit" class="btn btn-primary col-md-12">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
            
@endsection