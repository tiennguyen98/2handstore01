@extends('admin.layout.master')

@section('title', __('Comments Manager'))

@section('module', __('Comments Manager'))

@section('content')
    @include('admin.comments.content')
@endsection

