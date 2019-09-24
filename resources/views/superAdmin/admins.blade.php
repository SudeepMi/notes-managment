@extends('superadmin.layout.dash')
@section('title','Master Dashboard - Admins')
@section('content')

<div class="card mb-3">
        <div class="card-header">
                <div class="toolbar">
                        <div class="left toolbar-info">
                                <span class="toolbar-info-title"><i class="la la-cutlery"></i> <span class="title"> Admins</span></span>
                                </div>
                     <div class="right">
                         <a href="{{ route('cpannel.master.addAdmins') }}" class="btn btn-primary add-admin-btn"><i class="ti-plus"></i> Add Admin</a>
                         <button class="btn btn-transparent export">
                                <span class="kt-nav__section-text">Export Tools</span>
                     </button>
                            <div class="dropdown-menu export-tool dropdown-menu-right">
                            <ul class="kt-nav">
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link" id="export_print">
                                    <i class="kt-nav__link-icon la la-print"></i>
                                    <span class="kt-nav__link-text">Print</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link" id="export_copy">
                                    <i class="kt-nav__link-icon la la-copy"></i>
                                    <span class="kt-nav__link-text">Copy</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link" id="export_excel">
                                    <i class="kt-nav__link-icon la la-file-excel-o"></i>
                                    <span class="kt-nav__link-text">Excel</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link" id="export_csv">
                                    <i class="kt-nav__link-icon la la-file-text-o"></i>
                                    <span class="kt-nav__link-text">CSV</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link" id="export_pdf">
                                    <i class="kt-nav__link-icon la la-file-pdf-o"></i>
                                    <span class="kt-nav__link-text">PDF</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                        </div>
                 </div>
        </div>
        <div class="card-body">
<div class="table-responsive">
<table class="table table-bordered dataTable-init" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>SN</th>
            <th>Name</th>
            <th>Email</th>
            <th>phone</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>

        <tbody>
        @foreach($admins as $admin)
          <tr>
              <td>{{ $loop->iteration }}</td>
            <td>
                <a href="#" class="kt-link kt-link--brand kt-font-bolder">{{ $admin->name }}</a>

                </td>
            <td>{{ $admin->email }}</td>
            <td>{{ $admin->phone }}</td>
            <td class="status-find">
                @if ($admin->status == 0)
                <span class="false">Inactive</span>
                @else
                <span class="true">Active</span>

                @endif
            </td>
            <td>
                <button class="btn btn-sm btn-primary edit" data-name="{{ $admin->name }}" data-email="{{ $admin->email }}" data-phone="{{ $admin->phone }}" data-id="{{ $admin->id }}"><i class="la la-edit"></i>Edit</button>
                <button class="btn btn-sm btn-dark status" id="{{ $admin->status }}" data-id="{{ $admin->id }}"><i class="la la-ban"></i>update status</button>

            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- /tables-->
</div>
@endsection
@section('js')
<script>
    $(document).on('click','.status', function(e){
        e.preventDefault()

        var $this = $(this);
        var id = $(this).data('id')
        console.log(id)
        if($this.attr('id') == 1) {
            msgText     = 'Do you want to Inactivate this stock Item?';
            successMsg  = 'This Item is Inactivated now.';
            errorMsg    = 'Sorry, Could not Inactivate this Setting at this time. Please try again.';
            content     = '<span class="false">Inactive</span>';
            new_val     = 0;

        } else {
        msgText     = 'Is this item is avialable now ?';
        successMsg  = 'This Item is Avilable now.';
        errorMsg    = 'Sorry, Could not Activate this Item at this time. Please try again.';
        content     = '<span class="true">Active</span>';
        new_val     = 1;

        }

        Swal.fire({
        title: 'Are you sure?',
        text: msgText,
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Sure !'

        }).then( function(result) {
        if(result.value){

            $.ajax({
                url: '/cpannel/master/updatestatus_admin',
                data: {id: id},
                type: 'POST',
                async: false,
                success: function (response) {
                    console.log(response)
                    if(response.status != 'failed'){
                        $this.parents('tr').find('.status-find').html(content);
                        $this.parents('tr').find('.status').attr('id', new_val);

                        Swal.fire(
                            { title: 'Updated!',
                            text: response.successMsg,
                            type: response.status,
                            toast:true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 1500,
                        }
                            )
                    } else {
                        Swal.fire(
                            {  title: 'Sorry!',
                        text: response.successMsg,
                        type:  response.status,
                        toast:true,
                        confirmButton: false,})
                    }
                }
            });
        }
        })

    })

    $(document).on('click','.edit', function(e){
        e.preventDefault()
        var id = $(this).data('id')
        var name = $(this).data('name')
        var email = $(this).data('email')
        var phone = $(this).data('phone')
        form ='<input type="hidden" name="id" value="'+id+'"><div class="form-group"><label >Name</label><input class="form-control" type="text" value="'+name+'" name="name" placeholder="Name" required>'+
            '</div><div class="form-group"><label >Phone</label><div class="input-group">'+
            '<div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>'+
            '<input type="text" class="form-control" value="'+phone+'" placeholder="Phone" aria-describedby="basic-addon1" name="phone" required>'+
            '</div> </div><div class="form-group"><label>Email Address</label><div class="input-group">'+
            '<div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>'+
            '<input type="email" class="form-control" value="'+email+'" placeholder="Email" aria-describedby="basic-addon1" name="email" required></div></div>';
        $('.edit-modal').modal('show')
        $('.edit-form').html(form)
        })

    $(document).on('submit','.admin-edit-form', function(e){
        e.preventDefault()
        var data = getData($(this))
        $.ajax({
            method: "POST",
            url: '/cpannel/master/updateAdmins',
            data: { data: data}
        }).done( function(response){
            console.log(response)
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
@section('modals')
<div class="modal fade modal-aside center right-modal edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg width-80" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> <span class="edit-modal-title-name">Edit Admin Details </span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="admin-edit-form">
            <div class="add-modal-body">
                <div class="edit-modal-info">
                    <div class="row">
                        <div class="col-8 m-auto edit-form">



                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Sumbit</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
