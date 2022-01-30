@extends('layouts.app')
@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>

</ol>
@endsection
@push('page_css')
<style>
.card-header{
    background-color: rgba(0,200,105,0.08);
}
</style>
@endpush('page_css')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header"><h5>Appointment History</h5></div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="row mb-2">
                            <div class="col-2 ml-auto">
                                <a class="btn xbtn-block btn-lg btn-pill btn-success float-right xfont-weight-bolder cil-calendar-check" type="button" 
                                    title="Book Appointment"
                                    href="{{ route('home') }}"> Book</a>
                            </div>
                        </div>
                        <table class="table border mb-0">
                            <thead class="table-light fw-semibold">
                                <tr class="align-middle">
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Appointment Date</th>
                                    <th class="text-center">Time</th>
                                    <th class="text-center">Dentist</th>
                                    <th class="text-center">Service</th>
                                    <th class="text-center">Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="align-middle">
                                    <td class="text-center">
                                        <div>1</div>
                                    </td>
                                    <td class="text-center">
                                        <div>1 December 2021</div>
                                    </td>
                                    <td class="text-center">
                                        <div>9.00 - 10.00</div>
                                    </td>
                                    <td class="text-center">
                                        <div>Dr. Abdullah</div>
                                    </td>
                                    <td class="text-center">
                                        <div>Scaling</div>
                                    </td>
                                    <td class="text-center">
                                        <div><span class="badge me-1 rounded-pill bg-warning">Pending</span></div>
                                    </td>
                                    <td>
                                        <a class="btn btn-secondary btn-lg cil-list" href=""></a>
                                    </td>
                                    
                                </tr>
                                <tr class="align-middle">
                                    <td class="text-center">
                                        <div>2</div>
                                    </td>
                                    <td class="text-center">
                                        <div>10 October 2021</div>
                                    </td>
                                    <td class="text-center">
                                        <div>15.00 - 16.00</div>
                                    </td>
                                    <td class="text-center">
                                        <div>Dr. Abdullah</div>
                                    </td>
                                    <td class="text-center">
                                        <div>Scaling</div>
                                    </td>
                                    <td class="text-center">
                                        <div><span class="badge me-1 rounded-pill bg-danger">Rejected</span></div>
                                    </td>
                                    <td>
                                        <a class="btn btn-secondary btn-lg cil-list" href=""></a>
                                    </td>
                                    
                                </tr>
                                <tr class="align-middle">
                                    <td class="text-center">
                                        <div>3</div>
                                    </td>
                                    <td class="text-center">
                                        <div>22 January 2021</div>
                                    </td>
                                    <td class="text-center">
                                        <div>10.00 - 11.00</div>
                                    </td>
                                    <td class="text-center">
                                        <div>Dr. Maryam</div>
                                    </td>
                                    <td class="text-center">
                                        <div>Whitening</div>
                                    </td>
                                    <td class="text-center">
                                        <div><span class="badge me-1 rounded-pill bg-success">Completed</span></div>
                                    </td>
                                    <td>
                                        <a class="btn btn-secondary btn-lg cil-list" href=""></a>
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
