@extends('admin.layout.master')

@section('title', __('user manager'))

@section('module', __('user manager'))

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<button class="show-option btn btn-primary btn-warning" data-option="all">{{ __('Show All User') }}</button>
<button class="show-option btn btn-primary" data-option="verified">{{ __('Show Verified User') }}</button>
<button class="show-option btn btn-primary" data-option="unverify">{{ __('Show Unverify User') }}</button>
<button class="show-option btn btn-primary" data-option="blocked">{{ __('Show Blocked User') }}</button>
    <div class="table-user">
        @include('admin.users.userTable')
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/userTable.js') }}"></script>
@endsection
