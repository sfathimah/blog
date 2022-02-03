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
                <div class="card-header card-accent-primary">Prescription Statement History</div>
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
                                <th scope="row">1</th>
                                <td>{{ $statement->date }}</td>
                                <td>{{ $statement->patient_name }}</td>
                                <td><a class="btn btn-info btn-lg cil-notes"
                                            href="{{ route('statement.history') }}"></a></td>
                            </tr>                            
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
