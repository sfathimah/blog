@extends('layouts.dentist.app')

@push('page_css')
<style>
    @media print {

        /* body {
    background: transparent;
    color: black;
    font: normal 20pt/1 sans-serif;
    text-align: center;
  } */
        button {
            display: none;
        }

        .form {
            border: 10px double black;
            padding: 2em;

            &:after {
                font-family: "Fontawesome";
                color: black;
                content: "\f259";
                padding-left: .5cm;
            }
        }

        @page {
            size: Letter Landscape;
            margin: 3cm;
        }
    }

</style>
@endpush

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active">Generate Prescription Statement</li>

</ol>
@endsection

@section('content')
<div class="container-fluid">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="row">
        <div class="col-11 m-auto">
            <div class="card">
                <div class="card-header card-accent-primary">Generate Prescription Statement</div>

                <div class="card-body">
                        <form action="{{ route('statement.store_statement_int', [$patient->id, $meetingid]) }}" method="POST">
                            @csrf
                            <div class="mb-3 row">
                                <!-- <label class="col-sm-2 col-form-label" for="stateno">Statement No.</label> -->
                                <div class="col-sm-7">
                                    <!-- <input class="form-control-plaintext" id="stateno" type="text" readonly value="insert latest id +1" name="id"> -->
                                    <input class="form-control-plaintext" type="text" hidden
                                        value="{{ Auth::user()->id }}" name="dentist_id">
                                    <!-- <input class="form-control-plaintext" type="text" readonly value="" name="patient_id"> -->
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label" for="name">Patient Name</label>
                                <div class="col-sm-7">
                                    <input class="form-control-plaintext" type="text" name="patient_id" value="{{ $patient->id }}" hidden>
                                    <input class="form-control-plaintext" type="text" value="{{ $patient->name }}">

                                </div>
                            </div>
                            <div class="mb-5 row">
                                <label class="col-sm-2 col-form-label" for="date">Date</label>
                                <div class="col-sm-7">
                                    <input class="form-control-plaintext" id="datePicker" type="date" name="date"
                                        readonly>
                                </div>
                            </div>
                            <div class="mb-3 mx-5 row">
                                <table id="table1" class="table display">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Prescription</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Remark</th>
                                        </tr>
                                    </thead>
                                    <div class="row mb-2">

                                </table>
                                <div class="row">
                                    <div class="text-center ml-auto mb-4">
                                        <button
                                            class="btn btn-lg btn-pill btn-secondary font-weight-bolder cil-plus mx-1"
                                            type="button" title="Add" id="AddRow"></button>
                                    </div>
                                </div>
                                <hr>
                        </form>
                    <!-- </div> -->
                    <div class="col-auto ml-auto">
                        <!-- <a class="btn btn-lg btn-pill btn-info float-right font-weight-bolder cil-print mx-1"
                            type="button" title="Print" xonclick="print()"></a> -->
                        <button
                            class="btn btn-lg btn-pill btn-success float-right font-weight-bolder cil-check-alt mx-1"
                            type="submit" title="Save & Finish"></button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@push('page_scripts')
<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

<script>
    document.getElementById('datePicker').valueAsDate = new Date();

    $.extend(true, $.fn.dataTable.defaults, {
        "searching": false,
        "paging": false,
        "info": false
    });

    $(document).ready(function () {
        var t = $('#table1').DataTable();
        var counter = 1;

        $('#AddRow').on('click', function () {
            t.row.add([
                '<input name="item_id[]" class="form-control-plaintext" type="text" readonly value="' +
                counter + '">',
                '<select class="form-select" name="presc_id[]" aria-label="Default select example" required>' +
                '<option selected>Select Prescription</option>' +
                '@foreach ($prescs as $presc)' +
                '<option value="{{ $presc->id }}">{{ $presc->name }}</option>' +
                '@endforeach' +
                '</select>',
                '<input name="qty[]" class="form-control" type="text" placeholder="Enter Quantity" required>',
                '<input name="remark[]" class="form-control" type="text" placeholder="Enter Remark">'
            ]).draw(false);

            counter++;
        });

        // Automatically add a first row of data
        $('#addRow').click();
    });

    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }

</script>
@endpush
