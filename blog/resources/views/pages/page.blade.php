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
                <form action="" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">Username</span></div>
                            <input class="form-control" id="username3" type="text" name="username3"
                                autocomplete="username">

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">Full Name</span></div>
                            <input class="form-control" id="name3" type="text" name="name3" autocomplete="name">

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">IC No.</span></div>
                            <input class="form-control" id="ic3" type="text" name="ic3" autocomplete="ic">

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">D.O.B</span></div>
                            <input class="form-control" id="date-input" type="date" name="date-input"
                                placeholder="date">

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">Gender</span></div>
                            <div class="col-md-9 col-form-label">
                                <div class="form-check form-check-inline mr-1">
                                    <input class="form-check-input" id="inline-radio1" type="radio" value="option1"
                                        name="inline-radios">
                                    <label class="form-check-label" for="inline-radio1">Male</label>
                                </div>
                                <div class="form-check form-check-inline mr-1">
                                    <input class="form-check-input" id="inline-radio2" type="radio" value="option2"
                                        name="inline-radios">
                                    <label class="form-check-label" for="inline-radio2">Female</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">Email</span></div>
                            <input class="form-control" id="email3" type="email" name="email3" autocomplete="email">

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">Contact No.</span></div>
                            <input class="form-control" id="contact3" type="text" name="contact3"
                                autocomplete="contact">

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">Address</span></div>
                            <textarea class="form-control" id="textarea-input" name="textarea-input" rows="1"
                                placeholder="" spellcheck="false"></textarea>

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
