@extends('superadmin.layout.dash')
@section('title', 'Create Admins')
@section('content')

<div class="col-lg-12">
        <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile" id="kt_page_portlet">
            <div class="kt-portlet__head kt-portlet__head--lg hposition">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title"> Contact Details</h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                        <div class="btn-group hcustom-btn">
                            <button class="btn btn-brand edit">
                                <i class="la la-edit"></i>
                                <span class="kt-hidden-mobile">Edit</span>
                            </button>
                        </div>
                    </div>
            </div>
            <div class="kt-portlet__body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-xl-12 col-xs-12 col-md-12">
                            <div class="kt-section kt-section--first">
                                <div class="kt-section__body">
                                    <table class="table table-striped">
                                        <tr>
                                            <td>Name To Show :</td>
                                            <td>{{ $details->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email To Show :</td>
                                            <td>{{ $details->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone To Show :</td>
                                            <td>{{ $details->phone }}</td>
                                        </tr>
                                        <tr>
                                            <td>Address To Show :</td>
                                            <td>{{ $details->address }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
</div>

@endsection

@section('modals')
<div class="modal fade modal-aside center right-modal edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg width-80" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> <span class="edit-modal-title-name">Edit Contact Details </span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-info">
            <form class="kt-form edit-form" id="kt_form">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile" id="kt_page_portlet">
                        <div class="kt-portlet__head kt-portlet__head--lg hposition">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title"> Contact Details</h3>
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
                                                <!-- <h3 class="kt-section__title kt-section__title-lg">Contact Details:</h3> -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >Name</label>
                                                            <input type="hidden" name="id" value="{{ $details->id }}">
                                                            <input class="form-control @error('name') is-invalid @enderror" type="text" value="{{ $details->name ?? old('name') }}" name="name" placeholder="Name" required>
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
                                                                <input type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ $details->phone ?? old('phone') }}" placeholder="Phone" aria-describedby="basic-addon1" name="phone" required>
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
                                                                    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $details->email ?? old('email') }}" placeholder="Email" aria-describedby="basic-addon1" name="email" required>
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
                                                            <label>Address</label>
                                                            <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text"><i class="pe-7s-map-marker"></i></span></div>
                                                            <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" placeholder="address" value="{{ $details->address }}" required>
                                                            </div>
                                                            @error('address')
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
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Sumbit</button>
    </div>
</div>
</div>
</div>
@endsection

@section('css')


@endsection

@section('js')
    <script>
        $('.edit').on('click', function(e){
            e.preventDefault()
            $('.edit-modal').modal('show');
        })
        $(document).on('submit','.edit-form', function(e){
            e.preventDefault()
            var data = getData($(this));
            $.ajax({
                method: "POST",
                url: '/cpannel/master/ContactDetails',
                data: { data: data}
            }).done( function(response){
                if(response.status != 'failed'){
                    Swal.fire(
                        { title: 'Updated!',
                        text: response.successMsg,
                        type: response.status,
                        toast:true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 1500,
                    })
                    location.reload()

                    } else {
                    Swal.fire(
                        {  title: 'Sorry!',
                    text: response.successMsg,
                    type:  response.status,
                    toast:true,
                    confirmButton: false,})
                }

            }).fail( function(){
                Swal.fire(
                    {  title: 'Sorry!',
                text: failed,
                type:  error,
                toast:true,
                confirmButton: false,})
                })
        })
    </script>
@endsection
