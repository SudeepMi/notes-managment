@extends('admin.layout.dash')
@section('title','Teachers')
@section('page','teachers')
@section('content')
<div class="card mb-3">
    <div class="card-header">
            <div class="toolbar">
                    <div class="left toolbar-info">
                            <span class="toolbar-info-title"> <span class=""> Teachers</span></span>
                            </div>
                 <div class="right">
                     {{--  <a href="{{ route('cpannel.master.addAdmins') }}" class="btn btn-primary add-admin-btn"><i class="ti-plus"></i> Add Admin</a>  --}}
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
    @foreach($teachers as $teacher)
      <tr>
          <td>{{ $loop->iteration }}</td>
        <td>
            <a href="#" class="kt-link kt-link--brand kt-font-bolder">{{ $teacher->name }}</a>

            </td>
        <td>{{ $teacher->email }}</td>
        <td>{{ $teacher->phone }}</td>
        <td class="status-find">
            @if ($teacher->status == 0)
            <span class="false">Inactive</span>
            @else
            <span class="true">Active</span>

            @endif
        </td>
        <td>
            {{--  <button class="btn btn-sm btn-primary edit" data-name="{{ $teacher->name }}" data-email="{{ $teacher->email }}" data-phone="{{ $teacher->phone }}" data-id="{{ $teacher->id }}"><i class="la la-edit"></i>Edit</button>  --}}
            <button class="btn btn-sm btn-dark status" id="{{ $teacher->status }}" data-id="{{ $teacher->id }}"><i class="la la-ban"></i>update status</button>

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

        swal.fire({
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
                url: '/cpannel/admin/updatestatus_teacher',
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
</script>
@endsection
