@extends('layouts.app')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active">Manage Dentist Workload</li>

</ol>
@endsection

@push('page_css')

@endpush('page_css')

@section('content')
<div class="container-fluid">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="nav-tabs-boxed" id="page-font">
        
        <div class="tab-content">
            <div class="tab-pane active" id="service" role="tabpanel">
            
            <table class="table table-responsive-sm xtable-bordered">
                    <thead>
                        <tr>
                            <th>Service</th>
                            <th class="text-center">TaskWorkload</th>
                            <th class="text-center">Duration</th>
                            <th class="text-center">Action</th>                                                                                                                                                                                                                                                                                                                                                           </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($AppointmentSetting as $AppointmentSetting)
                        <tr>
                            <td><input type="text" name="service" value="{{ $AppointmentSetting->service }}" class="form-control" placeholder="Service"></td>
                            <td class="text-center">
                            <input type="text" name="TaskWorkload" value="{{ $AppointmentSetting->TaskWorkload }}" class="form-control" placeholder="TaskWorkload">
                               
                            </td>
                            <td class="text-center"> 
                                <select name="duration" id="duration" value="{{ $AppointmentSetting->duration }}" class="form-control">
                                    <option value = "15" <?php echo (15== $AppointmentSetting->duration ? 'selected="selected"': ''); ?>>15</option>
                                    <option value = "30" <?php echo (30== $AppointmentSetting->duration ? 'selected="selected"': ''); ?>>30</option>
                                    <option value = "45" <?php echo (45== $AppointmentSetting->duration ? 'selected="selected"': ''); ?>>45</option>
                                    <option value = "60" <?php echo (60== $AppointmentSetting->duration ? 'selected="selected"': ''); ?>>60</option>
                                    <option value = "75" <?php echo (75== $AppointmentSetting->duration ? 'selected="selected"': ''); ?>>75</option>
                                    <option value = "90" <?php echo (90== $AppointmentSetting->duration ? 'selected="selected"': ''); ?>>90</option>
                                    </select>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('pages.workload.update_newserv',$AppointmentSetting->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success btn-lg cil-check-alt"></button>
                                </form>
                                <form action="{{ route('pages.workload.destroy_serv',$AppointmentSetting->id) }}" method="POST">
                                    <div class="xbtn-group" role="group" aria-label="Basic example">
                                        <a class="btn btn-info btn-lg cil-pencil"
                                            href="{{ route('pages.workload.edit_serv',$AppointmentSetting->id) }}"></a>
                                            <!-- <a class="btn btn-success btn-lg cil-check-alt"
                                            href="{{ route('pages.workload.update_serv',$AppointmentSetting->id) }}"></a> -->

                                        @csrf
                                        @method('POST')

                                        <button type="submit" class="btn btn-danger btn-lg cil-trash"></button></div>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>

@endsection

