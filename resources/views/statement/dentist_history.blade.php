@extends('layouts.dentist.app')

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
                <div class="card-header card-accent-primaryx">Prescription Statement History</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Prescribed To</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($statements as $statement)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $statement->date }}</td>
                                <td>{{ $statement->patient_name }}</td>
                                <td><a class="viewData btn btn-info btn-lg cil-notes" href="" data-id="{{ $statement->id }}"></a>
                                </td>
                            </tr>                            
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="view_modal" tabindex="-1" aria-labelledby="exampleModalLiveLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLiveLabel">Prescriptions</h5>
                    <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="insertdata"  style="color: white;"></div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-coreui-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('page_scripts')
<script>

$(document).ready(function () {

    $('.viewData').click(function (event) {
console.log("click");
        event.preventDefault();
        var id = $(this).data('id');
        $.get('/statement/view/' + id, function (data) {

            var rows; 
            for (let i = 0; i < data.data.length; i++) {
                rows += '<tr><th scope="row">'+ [i+1] + '</th>' +
                '<td>' + data.data[i].presc_name + '</td>' +
                '<td>' + data.data[i].qty + '</td>' +
                '<td>' + data.data[i].remark + '</td>' +
                '</tr>';
            }
            var tabledata = '<table class="table">'+
                    '<thead><tr><th scope="col">#</th><th scope="col">Prescription</th><th scope="col">Qty</th><th scope="col">Remark</th></tr>' +
                    '</thead>' +
                    '<tbody>'+
                    rows +
                    '</tbody></table>';

            $('#insertdata').html(tabledata);
            $('#view_modal').modal('show');
        });
    });

}); 
</script>
@endpush  
