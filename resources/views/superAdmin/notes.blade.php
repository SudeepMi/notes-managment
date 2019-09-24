@extends('superadmin.layout.dash')
@section('title', 'Create Admins')
@section('content')
<form class="kt-form" id="kt_form" method="POST" action="{{ route('cpannel.master.addnotes') }}" enctype="multipart/form-data">
{!! $view !!}
@endsection

@section('css')

@endsection

@section('js')
    <script>
        $(function(){

            $('#date').daterangepicker({
                singleDatePicker: true,
                opens: 'right',
                locale: {
                    format: 'YY-MM-DD'
                }
            });
        });
        Dropzone.options={
            url : '/this'
        }
    </script>


@endsection


