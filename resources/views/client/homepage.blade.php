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

<div class="box categories mt-4">
    <div class="container">
        <div class="box__title">

            @lang('client.home.categories')

        </div>
        <div class="categories__carousel owl-carousel owl-theme">
            <a href="#" class="item">
                <img src="{{ asset('images/cat1.jpg') }}" alt="">
                Ten danh muc 1
            </a>
        </div>
    </div>
</div>
<div class="box trending mt-5">
    <div class="container">
        <div class="box__title">

            @lang('client.home.featured')

        </div>
        <div class="products trending__carousel owl-carousel owl-theme">
            <a href="#" class="item">
                <img src="{{ asset('images/productImage1.jpeg') }}" alt="">
                <p>Sản phẩm 1</p>
                <div class="item__foot">
                    <div class="place text-right">
                        <i class="fas fa-map-marker-alt"></i> Hà Nội
                    </div>
                    <b>100.000.000 VND</b>
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    <span>(10000)</span>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="box mt-5">
    <div class="container">
        <div class="box__title box__title--border">
            
            @lang('client.home.newproduct')

        </div>
        <div class="row products">
            <div class="product-box col-xl-2 col-md-4 col-6">
                <a href="#" class="item">
                    <img src="{{ asset('images/productImage1.jpeg') }}" alt="">
                    <p>Sản phẩm 1</p>
                    <div class="item__foot">
                        <div class="place text-right">
                            <i class="fas fa-map-marker-alt"></i> Hà Nội
                        </div>
                        <b>100.000.000 VND</b>
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        <span>(10000)</span>
                    </div>

                </a>
            </div>
        </div>
        <div class="text-center mt-4">
            <button class="loadmore">

                @lang('client.home.loadmore')
                
            </button>
        </div>
    </div>
</div>

@endsection


@section('js')
<script>
    $(document).ready(function() {
        $('.categories__carousel').owlCarousel({
            loop: true,
            responsiveClass: true,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 3,
                    nav: false
                },
                1000: {
                    items: 8,
                    nav: true,
                    loop: false,
                }
            }
        });

        $('.trending__carousel').owlCarousel({
            loop: true,
            responsiveClass: true,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 3,
                    nav: false
                },
                1000: {
                    items: 6,
                    nav: true,
                    margin: 10,
                    loop: false,
                }
            }
        });
    })
</script>
@endsection
