@extends('admin.layout.master')

@section('module', __('admin.dashboard'))

@section('content')
    <div class="d-none get-chart" data-url="{{ route('admin.get_chart') }}"></div>
    <div class="card">
        <div class="card-body">
            <h4 class="mb-3">@lang('Posted Products')</h4>
            <canvas id="myChart" y-label="@lang('Number of products')" x-label="@lang('Month')">
            </canvas>
        </div>
    </div>
    <div class="card col-md-6 offset-md-3">
        <div class="card-body">
            <h4 class="mb-3">@lang('Posted Products')</h4>
            <canvas class="mt-4" id="myChartPie">
            </canvas>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('bower_components/sufee-admin-dashboard/assets/js/lib/chart-js/Chart.bundle.js') }}"></script>
    <script src="{{ asset('js/admin/chart.js') }}"></script>
@endsection

