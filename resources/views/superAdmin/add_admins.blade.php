@extends('superadmin.layout.dash')
@section('title', 'Create Admins')
@section('content')

<!-- //Create -->

<form class="kt-form" id="kt_form" method="POST" action="{{ route('cpannel.master.storeAdmins') }}">
@csrf
<div class="row">
    <div class="col-lg-12">
        <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile" id="kt_page_portlet">
            <div class="kt-portlet__head kt-portlet__head--lg hposition">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">Create User</h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="btn-group hcustom-btn">
                        <button class="btn btn-brand" type="submit">
                            <i class="la la-check"></i>
                            <span class="kt-hidden-mobile">Save</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-xl-12 col-xs-12 col-md-12">
                            <div class="kt-section kt-section--first">
                                <div class="kt-section__body">
                                    <!-- <h3 class="kt-section__title kt-section__title-lg">Create User:</h3> -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label >Name</label>
                                                <input class="form-control @error('name') is-invalid @enderror" type="text" value="{{ $name ?? old('name') }}" name="name" placeholder="Name" required>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label >Phone</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ $phone ?? old('phone') }}" placeholder="Phone" aria-describedby="basic-addon1" name="phone" required>
                                                    @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>


                                            </div>
                                            <div class="form-group">
                                                <label>Email Address</label>

                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
                                                        <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $email ?? old('email') }}" placeholder="Email" aria-describedby="basic-addon1" name="email" required>
                                                    </div>
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                            </div>



                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label>Password</label>
                                                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" required>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
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
</form>
@endsection

@section('css')


@endsection

@section('js')

@endsection
