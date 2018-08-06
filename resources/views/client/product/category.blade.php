@extends('client.layout.master')

@section('css')

<link rel="stylesheet" href="{{ asset('css/category.css') }}">

@endsection


@section('title', 'Demo')


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
                            Form::select(
                                'danhmuc', 
                                [
                                    __('client.category.allcate'),
                                ],
                                null,
                                [
                                    'class' => 'form-control'
                                ]
                            ) 
                        !!}
                    </div>
                    <div class="tieuchi">
                        <p> @lang('client.category.where') </p>
                        {!! 
                            Form::select(
                                'city', 
                                [
                                    __('client.category.allcity'),
                                ],
                                null,
                                [
                                    'class' => 'form-control'
                                ]
                            ) 
                        !!}
                    </div> 
                    <div class="tieuchi">
                        <p> @lang('client.category.price') </p>
                        <span>
                            {!! 
                                Form::text(
                                    'minprice', 
                                    null, 
                                    [
                                        'class' => 'form-control ml-1',
                                        'placeholder' => __('client.category.lowest')
                                    ]
                                ) 
                            !!}
                            <span>~</span>
                            {!! 
                                Form::text(
                                    'maxprice', 
                                    null, 
                                    [
                                        'class' => 'form-control ml-1',
                                        'placeholder' => __('client.category.highest')
                                    ]
                                ) 
                            !!}
                        </span>
                    </div> 
                    <div class="tieuchi">
                        {!! 
                            Form::submit(
                                __('client.category.filter'), 
                                [
                                    'class' => 'btn btn-primary w-100'
                                ]
                            ) 
                        !!}
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
                                    {!! 
                                        Form::select(
                                            'price', 
                                            [
                                                __('client.category.lowtohigh'),
                                                __('client.category.hightolow'),
                                            ],
                                            null,
                                            [
                                                'class' => 'form-control'
                                            ]
                                        ) 
                                    !!}
                                </div>
                                <div class="col-md-4">
                                    {!! 
                                        Form::select(
                                            'place', 
                                            [
                                                __('client.category.latest'),
                                                __('client.category.oldest'),
                                            ],
                                            null,
                                            [
                                                'class' => 'form-control'
                                            ]
                                        ) 
                                    !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <a href="#" class="item">
                            <img src="{{ asset('images/productImage1.jpeg') }}" alt="">
                            <p>Sản phẩm 1</p>
                            <div class="item__foot">
                                <b>100.000.000 VND</b>
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                <span>(10000)</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
