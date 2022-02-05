@extends('layouts.admin.app')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    
    <li class="breadcrumb-item"><a href="{{ route('pages.schedule.index') }}">Manage Dentists' Data and Schedule</a></li>
    <li class="breadcrumb-item active">Add New Dentist</li>
</ol>
@endsection

@section('content')
<div class="container-fluid">
    <div class="col-6 m-auto">
        <div class="card">
            <div class="card-header">Add Dentist
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
    

                    <form action="{{ route('pages.schedule.store') }}" method="POST">
                        @csrf
                    
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    <input type="text" name="name" class="form-control" placeholder="Name" required><br>
                                    <strong>Email:</strong>
                                    <input type="text" name="email" value=" " class="form-control" placeholder="Email" required><br>
                                    <strong>Password:</strong>
                                    <input type="password" name="password" class="form-control" placeholder="Password" required><br>
                                    <strong>IC No:</strong>
                                    <input type="text" name="icno" class="form-control" placeholder="IC No" required><br>
                                    
                                    <input type="hidden" name="user_type" class="form-control" placeholder="IC No" value="Dentist" required><br>
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