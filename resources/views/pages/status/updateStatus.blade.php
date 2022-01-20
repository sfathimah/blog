@extends('layouts.app')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item"><a href="{{ route('pending') }}">View Meeting Status</a></li>
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
                            @php $i=$meeting->status;@endphp
                            @php
                                if($i=='Accepted'){
                                    $bg='bg-success';
                                    $text='text-white';
                                }
                                else if($i=='Pending'){
                                    $bg='bg-warning';
                                    $text='text-white';
                                }
                                else{
                                    $bg='bg-danger';
                                    $text='text-white';
                                }
                            @endphp

                                <label>Current Meeting Status : <span class="{{$bg}} {{$text}}">&nbsp&nbsp&nbsp{{$meeting->status}}&nbsp&nbsp&nbsp</span></label><br>
                                
                                <select name="status" id="status" class="form-control">
                                    
                                <option class="bg-success text-white" value = "Accepted" <?php echo ('Accepted'== $meeting->status ? 'selected="selected"': ''); ?>>Accepted</option>
                                    <option class="bg-danger text-white" value = "Rejected" <?php echo ('Rejected'== $meeting->status ? 'selected="selected"': ''); ?>>Rejected</option>
                                    <option class="bg-warning text-white" <?php echo ('Pending'== $meeting->status ? 'selected="selected"': ''); ?>>Pending</option>
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

