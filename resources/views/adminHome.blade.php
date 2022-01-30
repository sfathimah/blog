@extends('layouts.admin.app')
@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>

</ol>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-6">
                                    <div class="border-start border-start-4 border-start-danger px-3 mb-3">
                                        <big class="text-medium-emphasis">Days Before Next Schedule Update</big>
                                        <div class="fs-5 fw-semibold">20</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="border-start border-start-4 border-start-info px-3 mb-3">
                                        <big class="text-medium-emphasis">Registered Users</big>
                                        <div class="fs-5 fw-semibold">55</div>
                                    </div>
                                </div>

                                

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
