@extends('admin.layout.master')

@section('module', __('admin.article.articles'))

@section('content')
<div class="card">
    <div class="card-body">
        @include('admin.products.content')
    </div>
</div>

@endsection

@section('js')
    <script src="{{ asset('js/product.js') }}"></script>
@endsection

