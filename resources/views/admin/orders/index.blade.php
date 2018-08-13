@extends('admin.layout.master')

@section('title', __('Orders Manager'))

@section('module', __('Orders Manager'))

@section('content')
    @include('admin.orders.content')
@endsection
