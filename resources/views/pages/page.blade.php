@extends('layouts.app')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item active">Profile</li>

</ol>
@endsection

@section('content')
<div class="container-fluid">
    <div class="col-6 m-auto">
    
        <div class="card">
            <div class="card-header">My Profile</div>
            <div class="card-body">
                <form action="{{ route('pages.update') }}" method="post">
                @csrf
                @method('PUT')
                    
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">Full Name</span></div>
                            <input class="form-control" id="name" type="text" name="name" autocomplete="name" value="{{ Auth::user()->name }}" required>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">IC No.</span></div>
                            <input class="form-control" id="icno" type="text" name="icno" autocomplete="icno" value="{{ Auth::user()->icno }}" required>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">D.O.B</span></div>
                            <input class="form-control" id="dob" type="date" name="dob"
                                placeholder="date" value="{{ Auth::user()->dob }}" required>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">Gender</span></div>
                            <div class="col-md-9 col-form-label">
                                <div class="form-check form-check-inline mr-1">
                                    <input class="form-check-input" id="gender1" type="radio"  name="gender" value="0" {{ (Auth::user()->gender == '0') ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="gender1">Male</label>
                                </div>
                                <div class="form-check form-check-inline mr-1">
                                    <input class="form-check-input" id="gender2" type="radio" name="gender" value="1" {{ (Auth::user()->gender == '1') ? 'checked' : '' }} >
                                    <label class="form-check-label" for="gender2">Female</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">Email</span></div>
                            <input class="form-control" id="email" type="email" name="email" autocomplete="email" value="{{ Auth::user()->email }}" required>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">Contact No.</span></div>
                            <input class="form-control" id="phone" type="text" name="phone"
                                autocomplete="contact" value="{{ Auth::user()->phone }}" required>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">Address</span></div>
                            <textarea class="form-control" id="address" name="address" rows="1"
                                placeholder="" spellcheck="false" required>{{ Auth::user()->address }}</textarea>

                        </div>
                    </div>
                    <div class="form-group form-actions text-right">
                        <button class="btn btn-pill btn-success" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
