@extends('layouts.dentist.app')
@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('dentist.home') }}">Home</a></li>
    
</ol>
@endsection
@push('page_css')
<style>
    .card-header-danger {
        background-color: rgba(200, 0, 105, 0.1);
    }
    .card-header-warning {
        background-color: rgba(255,236,132, 0.4);
    }

</style>
@endpush('page_css')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header card-header-danger">
                    <h5>Upcoming Appointment</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table border mb-0">
                            <thead class="table-light fw-semibold">
                                <tr class="align-middle">
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Patient Name</th>
                                    <th class="text-center">Appointment Date</th>
                                    <th class="text-center">Time</th>
                                    <th class="text-center">Service</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="align-middle">
                                    <td class="text-center">
                                        <div>1</div>
                                    </td>
                                    <td class="text-center">
                                        <div>Mark Lim</div>
                                    </td>
                                    <td class="text-center">
                                        <div>15 December 2021</div>
                                    </td>
                                    <td class="text-center">
                                        <div>9.00 - 10.00</div>
                                    </td>
                                    <td class="text-center">
                                        <div>Check up</div>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-secondary cil-list" href=""></a>
                                        <a class="btn btn-success cil-clipboard" href=""> Start Appointment</a>
                                    </td>

                                </tr>
                                <tr class="align-middle">
                                    <td class="text-center">
                                        <div>2</div>
                                    </td>
                                    <td class="text-center">
                                        <div>Amy Jones</div>
                                    </td>
                                    <td class="text-center">
                                        <div>15 December 2021</div>
                                    </td>
                                    <td class="text-center">
                                        <div>15.00 - 16.00</div>
                                    </td>
                                    <td class="text-center">
                                        <div>Scaling</div>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-secondary cil-list" href=""></a>
                                        <a class="btn btn-success cil-clipboard" href=""> Start Appointment</a>
                                    </td>

                                </tr>
                                <tr class="align-middle">
                                    <td class="text-center">
                                        <div>3</div>
                                    </td>
                                    <td class="text-center">
                                        <div>John Smith</div>
                                    </td>
                                    <td class="text-center">
                                        <div>17 December 2021</div>
                                    </td>
                                    <td class="text-center">
                                        <div>10.00 - 11.00</div>
                                    </td>
                                    <td class="text-center">
                                        <div>Whitening</div>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-secondary cil-list" href=""></a>
                                        <a class="btn btn-success cil-clipboard" href=""> Start Appointment</a>
                                    </td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header card-header-warning">
                    <h5>Pending Appointment Request</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table border mb-0">
                            <thead class="table-light fw-semibold">
                                <tr class="align-middle">
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Patient Name</th>
                                    <th class="text-center">Appointment Date</th>
                                    <th class="text-center">Time</th>
                                    <th class="text-center">Service</th>
                                    <th class="text-center">Requested at</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="align-middle">
                                    <td class="text-center">
                                        <div>1</div>
                                    </td>
                                    <td class="text-center">
                                        <div>Peter Lee</div>
                                    </td>
                                    <td class="text-center">
                                        <div>1 December 2021</div>
                                    </td>
                                    <td class="text-center">
                                        <div>9.00 - 10.00</div>
                                    </td>
                                    <td class="text-center">
                                        <div>Scaling</div>
                                    </td>
                                    <td class="text-center">
                                        <div>9.34 a.m | 15/11/2021</div>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-secondary cil-list" href=""></a>
                                        <a class="btn btn-success cil-thumb-up" href=""></a>
                                        <a class="btn btn-danger cil-thumb-down" href=""> </a>
                                    </td>

                                </tr>
                                <tr class="align-middle">
                                    <td class="text-center">
                                        <div>2</div>
                                    </td>
                                    <td class="text-center">
                                        <div>Sarah Bt Salam</div>
                                    </td>
                                    <td class="text-center">
                                        <div>8 December 2021</div>
                                    </td>
                                    <td class="text-center">
                                        <div>15.00 - 16.00</div>
                                    </td>
                                    <td class="text-center">
                                        <div>Scaling</div>
                                    </td>
                                    <td class="text-center">
                                        <div>11.09 a.m | 1/12/2021</div>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-secondary cil-list" href=""></a>
                                        <a class="btn btn-success cil-thumb-up" href=""></a>
                                        <a class="btn btn-danger cil-thumb-down" href=""> </a>
                                    </td>

                                </tr>
                                <tr class="align-middle">
                                    <td class="text-center">
                                        <div>3</div>
                                    </td>
                                    <td class="text-center">
                                        <div>John Smith</div>
                                    </td>
                                    <td class="text-center">
                                        <div>10 December 2021</div>
                                    </td>
                                    <td class="text-center">
                                        <div>10.00 - 11.00</div>
                                    </td>
                                    <td class="text-center">
                                        <div>Whitening</div>
                                    </td>
                                    <td class="text-center">
                                        <div>4.40 p.m | 2/12/2021</div>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-secondary cil-list" href=""></a>
                                        <a class="btn btn-success cil-thumb-up" href=""></a>
                                        <a class="btn btn-danger cil-thumb-down" href=""> </a>
                                    </td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
