@extends('layouts.app')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active">medical record</li>
</ol>
@endsection

@section('content')

<!-- <script type="text/javascript" src="jquery-3.3.1.js" ></script> -->

<?php
$mysqli = NEW MySQLi('localhost','root','','crud7');
$resultSet = $mysqli-> query("Select id FROM patient");
?>

<div class="container-fluid">
    <div class="col-6 m-auto">
        <div class="card">
            <div class="card-header">Medical Records</div>
                <div class="card-body">
                @if(!empty($successMsg))
                <div class="alert alert-success"> {{ $successMsg }}</div>
                @endif
                    <form method="POST" action="/done1" >
                    @csrf <!-- {{ csrf_field() }} -->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">Patient ID</span></div>
                                    <select name="patientID" id="patientID" class="form-control">
                                    <?php
                                    while ($rows = $resultSet -> fetch_assoc())
                                    {
                                        $id = $rows['id'];
                                        echo "<option value='$id'>$id</option>";
                                    }
                                    ?> 
                                    
                                </div>
                            </div>
                            <input type="button" hidden="true" ></input>
                            <button  name="search" class="btn-success btn" id="searchBtn" type="submit" hidden="true">Search</button>
                           
                        </div>
                        <br><br>
                        <div class="form-group">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Yes</th>
                                        <th scope="col">No</th>
                                        <th scope="col">Additional Notes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Admitted to Hospital</th>
                                        <td><input type="radio" name="ath" value="1" id="y1"></td>
                                        <td><input type="radio" name="ath" value="0" id="n1"></td>
                                        <td><input type="text" name="athNotes" id="athNotes" ></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Serious Illness</th>
                                        <td><input type="radio" name="si" value="1" id="y2"></td>
                                        <td><input type="radio" name="si" value="0" id="n2"></td>
                                        <td><input type="text" name="siNotes" id="siNotes" ></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Current Medication</th>
                                        <td><input type="radio" name="cm" value="1" id="y3"></td>
                                        <td><input type="radio" name="cm" value="0" id="n3"></td>
                                        <td><input type="text" name="cmNotes" id="cmNotes" ></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Allergies</th>
                                        <td><input type="radio" name="al" value="1" id="y4"></td>
                                        <td><input type="radio" name="al" value="0" id="n4"></td>
                                        <td><input type="text" name="alNotes" id="alNotes" ></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Others</th>
                                        <td><input type="radio" name="ot" value="1" id="y5"></td>
                                        <td><input type="radio" name="ot" value="0" id="n5"></td>
                                        <td><input type="text" name="otNotes" id="otNotes" ></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                        <div class="form-group form-actions text-right">
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
