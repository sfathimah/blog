@extends('layouts.app')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item active">meeting</li>

</ol>
@endsection

@section('content')
<?php
$mysqli = NEW MySQLi('localhost','root','','crud7');
$resultSet = $mysqli-> query("Select service FROM appointmentsettings");

$resultSet1 = $mysqli-> query("Select name FROM dentist");
?>

<div class="container-fluid">
    <div class="col-6 m-auto">
        <div class="card">
            <div class="card-header">My Meeting</div>
            <div class="card-body">
            @if(!empty($successMsg))
                <div class="alert alert-success"> {{ $successMsg }}</div>
                @endif
                <form method="POST" action="/done" >
                @csrf <!-- {{ csrf_field() }} -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"> Date</span></div>
                            <input class="form-control" id="date" type="date" name="date" autocomplete="name">
                        </div>
                     
                    </div>
                        
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">Time</span></div>
                            
                            <select name="time" id="time" class="form-control">
                                <option value = "9:00 AM - 10:00 AM">9:00 AM - 10:00 AM</option>
                                <option value = "10:00 AM - 11:00 AM">10:00 AM - 11:00 AM</option>
                                <option value = "11:00 AM - 12:00 PM">11:00 AM - 12:00 PM</option>
                                <option value = "2:00 PM - 3:00 PM">2:00 PM - 3:00 PM</option>
                                <option value = "3:00 PM - 4:00 PM">3:00 PM - 4:00 PM</option>
                                <option value = "4:00 PM - 5:00 PM">4:00 PM - 5:00 PM</option>
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">Services</span></div>
                                    <select name="service" id="service" class="form-control">
                                    <?php
                                    while ($rows = $resultSet -> fetch_assoc())
                                    {
                                        $service = $rows['service'];
                                        echo "<option value='$service'>$service</option>";
                                    }
                                    ?> 
                                    
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">Time</span></div>
                                <input class="form-control" id="time11" type="hidden" name="time11" autocomplete="name">

                            </div>
                        </div>
                    <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">Dentist</span></div>
                                    <select name="dentist" id="dentist" class="form-control">
                                    <?php
                                    while ($rows = $resultSet1 -> fetch_assoc())
                                    {
                                        $name = $rows['name'];
                                        echo "<option value='$name'>$name</option>";
                                    }
                                    ?> 
                                    
                                </div>
                            </div>
                        </div>
                  
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">Time</span></div>
                                <input class="form-control" id="time111" type="hidden" name="time111" autocomplete="name">

                            </div>
                        </div>
                        
                        
                        <div class="form-group form-actions text-right">
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                        
                    <br><br>
                    
                    <br>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
