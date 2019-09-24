@extends('teacher.layouts.dash')
@section('title','Teacher Area')
@section('content')

{{ Auth::guard('teacher')->user()->name }}
@endsection
