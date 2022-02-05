@extends('layouts.admin.app')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active">User Profile</li>

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
                <div class="card-header card-accent-primaryx">List of Users</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="text-center"><a class="viewData btn btn-primary btn-lg cil-notes font-sm" href=""
                                        data-id="{{ $user->id }}"></a>
                                    <a class="btn btn-info btn-lg cil-pencil font-sm"
                                        href="{{ route('pages.viewprofile',$user->id) }}">  Medical Record</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="view_modal" tabindex="-1" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLiveLabel">Profile</h5>
                    <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="insertdata"></div>
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

            event.preventDefault();
            var id = $(this).data('id');
            $.get('profiles/view/' + id, function (data) {

                var tabledata =
                    '<table class="table"><tbody>' +
                    '<tr><th scope="col">Name</th><td scope="col">' + data.data[0].name + '</td></tr>' +
                    '<tr><th scope="col">Email</th><td scope="col">' + data.data[0].email + '</td></tr>' +
                    '<tr><th scope="col">IC No.</th><td scope="col">' + data.data[0].icno + '</td></tr>' +
                    '<tr><th scope="col">D.O.B</th><td scope="col">' + data.data[0].dob + '</td></tr>' +
                    '<tr><th scope="col">Gender</th><td scope="col">' + data.data[0].gender + '</td></tr>' +
                    '<tr><th scope="col">Phone No.</th><td scope="col">' + data.data[0].phone + '</td></tr>' +
                    '<tr><th scope="col">Address</th><td scope="col">' + data.data[0].address + '</td></tr>' +
                    
                    '</tbody></table>';

                $('#insertdata').html(tabledata);
                $('#view_modal').modal('show');
            });
        });

    });

</script>
@endpush
