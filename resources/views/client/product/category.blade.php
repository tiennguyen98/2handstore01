@extends('client.layout.master')

@section('css')

<link rel="stylesheet" href="{{ asset('css/category.css') }}">

@endsection


@section('title', __('Search'))


@section('content')

<div class="col-lg-10 mr-auto ml-auto mt-5">
    <div class="row">
        <div class="col-md-3">
            <div class="bg-white p-4">
                <div class="tieuchi">
                    <h3 class="filter__title">
                        <i class="fas fa-filter"></i>
                        @lang('client.category.filter')
                    </h3>
                </div>

                {!! Form::open([
                    'method' => 'get',
                    'url' => route('client.products.search'),
                    'id' => 'filter-form'
                ]) !!}
                    <input type="hidden" id="search" name="search" value="">
                    <input type="hidden" id="sort" name="sort" value="">
                    <div class="tieuchi">
                        <p> @lang('client.category.category') </p>
                        {!! 
                            Form::select('category', ['' => __('Choose category')] + $categories, null, [
                                'class' => 'form-control',
                                'id' => 'category',
                            ]) 
                        !!}
                    </div>
                    <div class="tieuchi">
                        <p> @lang('client.category.city') </p>
                        {!! 
                            Form::select('city', ['' => __('Choose city')] + $cities, old('city'), [
                                'class' => 'form-control',
                                'id' => 'city',
                                'data-url' => route('client.products.get_search_province')
                            ]) 
                        !!}
                    </div> 
                    <div class="tieuchi">
                        <p> @lang('client.category.province') </p>
                        {!! 
                            Form::select('province', [__('client.category.province')] + $province, old('province'), [
                                'class' => 'form-control',
                                'id' => 'province'
                            ]) 
                        !!}
                    </div> 
                    <div class="tieuchi">
                        <p> @lang('client.category.price') </p>
                        <span>
                            {!! Form::text('minprice', null, [
                                'class' => 'form-control ml-1',
                                'placeholder' => __('client.category.lowest')
                            ]) !!}
                            <span>~</span>
                            {!! Form::text('maxprice', null, [
                                'class' => 'form-control ml-1',
                                'placeholder' => __('client.category.highest')
                            ]) !!}
                        </span>
                    </div> 
                    <div class="tieuchi">
                        {!! Form::button(__('client.category.filter'), [
                            'class' => 'btn btn-primary w-100',
                            'id' => 'filter'
                            ]
                            ) !!}
                    </div>
                {!! Form::close() !!}

            </div>
        </div>
        <div class="col-md-9">
            <div class="box">
                <div class="row products">
                    <div class="col-12 mb-4">
                        <div class="filter">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <i class="fas fa-sort-amount-up"></i>
                                    @lang('client.category.sortby')
                                </div>
                                <div class="col-md-4 offset-md-4">
                                    {!! Form::select('sort', 
                                            [
                                                __('client.category.lowtohigh'),
                                                __('client.category.hightolow'),
                                                __('client.category.latest'),
                                                __('client.category.oldest'),
                                            ],
                                            old('sort'),
                                            [
                                                'class' => 'form-control',
                                                'id' => 'sort-select'
                                            ]
                                        ) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    @forelse($products as $product)
                        @include('client.components.product')
                    @empty
                    {{ __('client.empty') }}
                    @endforelse
                </div>
                <div class="custom-paginate text-center col-12 mt-4">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<style>

</style>
@endsection

@section('js')
<script src="{{ asset('js/categoryClient.js') }}"></script>
<script src="{{ asset('js/client/search.js') }}"></script>
@endsection
