@extends('client.layout.master')

@section('css')

<link rel="stylesheet" href="{{ asset('css/category.css') }}">

@endsection


@section('title', __('client.category.category') . ': ' . $getCategory->name)


@section('content')

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-3">
            <div class="bg-white p-4">
                <div class="tieuchi">
                    <h3 class="filter__title">
                        <i class="fas fa-filter"></i>
                        @lang('client.category.filter')
                    </h3>
                </div>

                {!! Form::open() !!}
                    <div class="tieuchi">
                        <p> @lang('client.category.category') </p>
                        {!! 
                            Form::select('danhmuc', [__('client.category.allcate')], null, ['class' => 'form-control']) 
                        !!}
                    </div>
                    <div class="tieuchi">
                        <p> @lang('client.category.where') </p>
                        {!! 
                            Form::select('city', [__('client.category.allcity')], null, ['class' => 'form-control']) 
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
                        {!! Form::submit(__('client.category.filter'), ['class' => 'btn btn-primary w-100']
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
                                <div class="col-md-4">
                                    {!! Form::select('price', 
                                        [
                                            __('client.category.sortByPrice'),
                                            '?sortBy=price&type=asc' => __('client.category.lowtohigh'),
                                            '?sortBy=price&type=desc' => __('client.category.hightolow'),
                                        ],
                                        null,
                                        ['class' => 'form-control sort']
                                    ) !!}
                                </div>
                                <div class="col-md-4">
                                    {!! Form::select('time', 
                                        [
                                            __('client.category.sortByTime'),
                                            '?sortBy=created_at&type=desc' => __('client.category.latest'),
                                            '?sortBy=created_at&type=asc' => __('client.category.oldest'),
                                        ],
                                        null,
                                        ['class' => 'form-control sort']
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
@endsection
