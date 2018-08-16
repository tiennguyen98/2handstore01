@extends('client.layout.master')

@section('content')

@if(count($slides) > 0)
    <div class="slider">
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach($slides as $slide)
                        <div class="carousel-item 
                        @if ($loop->first)
                            active
                        @endif
                        ">
                            <a href="{{ $slide->link() }}">
                                <img class="d-block w-100" src="{{ $slide->getImage() }}" alt="First slide">
                            </a>
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </div>
@endif

@if(count($categories) > 0)
<div class="box categories mt-4">
    <div class="container">
        <div class="box__title">

            @lang('client.home.categories')

        </div>
        <div class="categories__carousel owl-carousel owl-theme">
            @foreach ($categories as $category)
            <a href="{{ route('client.category', ['slug' => $category->slug]) }}" class="item" title="{{ $category->name }}">
                <img src="{{ $category->getThumbnail() }}" alt="" class="mb-2">
                {{ $category->name }}
            </a>
            @endforeach
        </div>
    </div>
</div>
@endif
<div class="box mt-5">
    <div class="container">
        <div class="box__title box__title--border">
            
            @lang('client.home.newproduct')

        </div>
        <div class="row products new_products">
            @forelse($new_products as $product)
                @include('client.components.product_normal')
            @empty
                @lang('client.empty')
            @endforelse
        </div>
        <div class="text-center mt-4">
            <div class="loading">
                <img src="{{ asset('static/loading.gif') }}" alt="">
            </div>
            <button class="loadmore" data-page="1" data-url="{{ route('loadmore') }}">

                @lang('client.home.loadmore')
                
            </button>
        </div>
    </div>
</div>

@endsection


@section('js')
<script src="{{ asset('js/client/homepage.js') }}"></script>
@endsection
