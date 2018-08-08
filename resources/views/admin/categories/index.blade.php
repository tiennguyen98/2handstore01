@extends('admin.layout.master')

@section('title', __('Categories Manager'))

@section('module', __('Categories Manager'))

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
    @include('admin.categories.content')
@endsection

@section('js')
    <script src="{{ asset('js/admin/category.js') }}"></script>
@endsection
