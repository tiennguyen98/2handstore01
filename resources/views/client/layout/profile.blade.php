@extends('client.layout.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    @yield('profile-css')
@endsection

@section('content')

    <div class="container mt-3">
        @include('client.user.sidebar')
        <div class="profile-content">
            @yield('profile-content')
        </div>
    </div>

@endsection
