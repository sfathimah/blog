@extends('layouts.admin.app')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('pages.viewprofile') }}">User Profile</a></li>
    <li class="breadcrumb-item active">Manage Patients' Medical Record</li>
</ol>
@endsection

@section('content')

<!-- <script type="text/javascript" src="jquery-3.3.1.js" ></script> -->

<!-- <?php
$mysqli = NEW MySQLi('localhost','root','','crud7');
$resultSet = $mysqli-> query("Select id FROM patient");
?> -->

<div class="container-fluid">
    <div class="col-10 m-auto">
        <div class="card">
            <div class="card-header">Medical Records Management</div>
            <div class="card-body">
                @if(!empty($successMsg))
                <div class="alert alert-success"> {{ $successMsg }}</div>
                @endif
                <form method="POST" action="{{ route('pages.save', $records->patientID) }}">
                    @csrf
                    <!-- {{ csrf_field() }} -->
                    <!-- @php
                        
                        @endphp -->
                    <br>
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
                                    <td><input type="radio" name="ath" value="1"
                                            <?php echo ('1'== $records->ath ? 'checked="checked"': ''); ?> id="y1"></td>
                                    <td><input type="radio" name="ath" value="0"
                                            <?php echo ('0'== $records->ath ? 'checked="checked"': ''); ?> id="n1"></td>
                                    <td>
                                        <?php $notes= $records->athNotes;?>
                                        <textarea class="col-10" name="athNotes" id="athNotes"
                                            style="height:70px;">{{$notes}}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Serious Illness</th>
                                    <td><input type="radio" name="si" value="1"
                                            <?php echo ('1'== $records->si ? 'checked="checked"': ''); ?> id="y2"></td>
                                    <td><input type="radio" name="si" value="0"
                                            <?php echo ('0'== $records->si ? 'checked="checked"': ''); ?>id="n2"></td>
                                    <?php $siNotes= $records->siNotes;?>
                                    <td>
                                        <textarea class="col-10" name="siNotes" id="siNotes"
                                            style="height:70px;">{{$siNotes}}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Current Medication</th>
                                    <td><input type="radio" name="cm" value="1"
                                            <?php echo ('1'== $records->cm ? 'checked="checked"': ''); ?> id="y3"></td>
                                    <td><input type="radio" name="cm" value="0"
                                            <?php echo ('0'== $records->cm ? 'checked="checked"': ''); ?> id="n3"></td>
                                    <td>
                                        <?php $cmNotes= $records->cmNotes;?>
                                        <textarea class="col-10" name="cmNotes" id="cmNotes"
                                            style="height:70px;">{{$cmNotes}}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Allergies</th>
                                    <td><input type="radio" name="al" value="1"
                                            <?php echo ('1'== $records->al ? 'checked="checked"': ''); ?> id="y4"></td>
                                    <td><input type="radio" name="al" value="0"
                                            <?php echo ('0'== $records->al ? 'checked="checked"': ''); ?>id="n4"></td>
                                    <td>
                                        <?php $alNotes= $records->alNotes;?>
                                        <textarea class="col-10" name="alNotes" id="alNotes"
                                            style="height:70px;">{{$alNotes}}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Others</th>
                                    <td><input type="radio" name="ot" value="1"
                                            <?php echo ('1'== $records->ot ? 'checked="checked"': ''); ?> id="y5"></td>
                                    <td><input type="radio" name="ot" value="0"
                                            <?php echo ('0'== $records->ot ? 'checked="checked"': ''); ?> id="n5"></td>
                                    <td>
                                        <?php $otNotes= $records->otNotes;?>
                                        <textarea class="col-10" name="otNotes" id="otNotes"
                                            style="height:70px;">{{$otNotes}}</textarea>
                                    </td>
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

@endsection
