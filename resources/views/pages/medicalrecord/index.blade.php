@extends('layouts.admin.app')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active">Manage Patients' Medical Record</li>
</ol>
@endsection

@section('content')


<br/>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p id="msg">{{ $message }}</p>
</div>
@endif
 <table class="table table-bordered">
    <tr>
        <th>Patient ID</th>
        <th>Patient Name</th>
        <th width="280px">Action</th>
    </tr>

@foreach ($Patient as $Patient)
    <tr id="Patient_id_{{ $Patient->id }}">
        <td>{{ $Patient->id }}</td>
        <td>{{ $Patient->name }}</td>
        <td>
            <form action="{{ route('pages.medicalrecord.destroy',$Patient->id) }}" method="POST">
                <a class="btn btn-info" id="show-customer" data-toggle="modal" data-id="{{ $Patient->id }}" >Show</a>
                <a href="javascript:void(0)" class="btn btn-success" id="edit-customer" data-toggle="modal" data-id="{{ $Patient->id }}">Edit </a>
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <a id="delete-customer" data-id="{{ $Patient->id }}" class="btn btn-danger delete-user">Delete</a></td>
            </form>
        </td>
    </tr>
@endforeach

</table>


<!-- Add and Edit customer modal -->
<div class="modal fade" id="crud-modal" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="customerCrudModal"></h4>
            </div>
            <div class="modal-body">
                <form name="custForm" action="{{ route('pages.medicalrecord.store') }}" method="POST">
                    <input type="hidden" name="cust_id" id="cust_id" >
                    @csrf

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
                                        <td>
                                            <textarea class="col-10" name="athNotes" id="athNotes" style="height:70px;"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Serious Illness</th>
                                        <td><input type="radio" name="si" value="1" id="y2"></td>
                                        <td><input type="radio" name="si" value="0" id="n2"></td>
                                        <td>
                                            <textarea class="col-10" name="siNotes" id="siNotes" style="height:70px;"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Current Medication</th>
                                        <td><input type="radio" name="cm" value="1" id="y3"></td>
                                        <td><input type="radio" name="cm" value="0" id="n3"></td>
                                        <td>
                                            <textarea class="col-10" name="cmNotes" id="cmNotes" style="height:70px;"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Allergies</th>
                                        <td><input type="radio" name="al" value="1" id="y4"></td>
                                        <td><input type="radio" name="al" value="0" id="n4"></td>
                                        <td>
                                            <textarea class="col-10" name="alNotes" id="alNotes" style="height:70px;"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Others</th>
                                        <td><input type="radio" name="ot" value="1" id="y5"></td>
                                        <td><input type="radio" name="ot" value="0" id="n5"></td>
                                        <td>
                                            <textarea class="col-10" name="otNotes" id="otNotes" style="height:70px;"></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary" disabled>Submit</button>
                                <a href="{{ route('pages.medicalrecord.index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
</div>

@endsection
<!-- <script>
error=false

function validate()
{
	if(document.custForm.name.value !='' && document.custForm.email.value !='' && document.custForm.address.value !='')
	    document.custForm.btnsave.disabled=false
	else
		document.custForm.btnsave.disabled=true
}
</script> -->
