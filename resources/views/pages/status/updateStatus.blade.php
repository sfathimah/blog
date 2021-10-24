@extends('layouts.app')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item active">Update Meeting Status</li>

</ol>
@endsection

@section('content')

<div class="container-fluid">
    <div class="col-6 m-auto">
        <div class="card">
            <div class="card-header">Update Status</div>
            <div class="card-body">
            
                <form action="/updated" method="POST">
                @csrf <!-- {{ csrf_field() }} -->
                
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label>Current Meeting Status : {{$meeting->status}}</label><br>
                                
                                <select name="status" id="status" class="form-control">
                                    <option value = "Pending">Pending</option>
                                    <option value = "Accepted">Accepted</option>
                                    <option value = "Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="id" id="id" value= "{{$meeting->id}}">
                        <div class="col-xs-12 col-sm-12 col-md-12 ">
                        <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
            
                </form>

            </div>
        </div>
    </div>



</div>
@endsection

