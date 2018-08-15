@extends('client.layout.master')

@section('css')

<link rel="stylesheet" href="{{ asset('css/product.css') }}">

@endsection


@section('title', $product->name)


@section('content')

<div class="container">
    <div class="product-top mt-5">
        <div class="product-top-left">
            <div class="product-images">
                <div class="product-slideshow">
                    <img id="show" src="{{ asset(Storage::url($product->thumbnail)) }}" alt="product image 1">
                    <div class="product-slideshow-dots">
                        @php($count = count($product->images))
                        @if($count > 0)
                            <span class="dot active"></span>
                            @for ($i = 0; $i < $count; $i++)
                                <span class="dot"></span>
                            @endfor
                        @endif
                    </div>
                </div>
                <div class="product-carousel owl-carousel owl-theme">
                    <a href="#" class="item">
                        <img class="item-thumb" src="{{ asset(Storage::url($product->thumbnail)) }}" alt="product image 1">
                    </a>   
                    @foreach ($product->images as $image)
                        <a href="#" class="item">
                            <img class="item-thumb" src="{{ asset(Storage::url($image->file_name)) }}" alt="product image 1">
                        </a>                       
                    @endforeach
                </div>
            </div>
        </div>
        <div class="product-top-right">
            <div class="product-detail">
                <div class="product-title">
                    <h1>{{ $product->name }}</h1>
                </div>
                <div class="product-price">
                    <span class="newprice">
                        <strong>{{ $product->money }}</strong>
                    </span>
                </div>
            </div>
            <div class="product-detail">
                <div class="product-title">
                    <h1>
                        <label>{{ __('Contact') }} :</label>
                        <span class="text-danger"><strong>{{ $product->user->phone }}</strong></span>
                    </h1>
                </div>
            </div>
            <div class="product-detail">
                <div class="shipping">
                    {!! 
                        Form::open([
                            'class' => 'form-inline'
                        ]) 
                    !!}
                        {!! 
                            Form::label(
                                'shipping', 
                                __('client.product.shipto'), 
                                [
                                    'class' => 'control-label'
                                ]
                            ) 
                        !!}
                        
                        {!! 
                            Form::select(
                                'shipping', 
                                $cities, 
                                null, 
                                [
                                    'class' => 'form-control col-md-4 ml-2'
                                ]
                            ) 
                        !!}

                    {!! Form::close() !!}
                </div>
            </div>
            <div class="product-detail">
                <div class="product-order">
                    <a href="#" class="btn btn-success col-md-6">
                        <i class="fas fa-shopping-cart"></i>
                        @lang('client.product.buynow')
                    </a>
                    <button class="btn btn-secondary report ml-5" type="button" data-toggle="modal" data-target="#report-modal">{{ __('Report') }}</button>
                </div>
            </div>
            <div class="product-infor">
                <table>
                    <tr>
                        <td class="product-infor-lable">@lang('client.category.category')</td>
                        <td class="product-infor-value">
                            <span><a href="">{{ $product->category->name }}</a></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="product-infor-lable">
                            @lang('client.product.brand')
                        </td>
                        <td class="product-infor-value">
                            <a href="#">{{ $product->brand }}</a>
                        </td>
                    </tr>
                </table>
                <div class="product-description">
                    <span>@lang('client.product.description')</span>
                    <p class="product-description-content mb-0">
                        {{ $product->detail }}
                    </p>
                    <span class="show-more">
                        <a href="javascript:void(0)">
                            @lang('client.product.showmore')
                        </a>
                    </span>
                </div>
            </div>
            <div class="product-owner">
                <div class="avatar">
                    <img src="{{ asset(Storage::url($product->user->avatar)) }}" alt="avatar">
                </div>
                <div class="owner-infor">
                    <div>
                        <label for="owner-name">
                            @lang('client.product.postedby')
                        </label>
                        <span name="owner-name">
                            <a href="#">{{ $product->user->name }}</a>
                        </span>
                    </div>
                    <div>
                        <label for="owner-address">
                            @lang('client.product.address')
                        </label>
                        <span name="owner-address">{{ $product->user->address }}</span>
                    </div>
                </div>
            </div> 
        </div>
    </div>

    <div id="comments">
        @include('client.product.comment')
    </div>

    <div class="comment-editor">
        <div class="form-group">
            <textarea name="content" class="form-control" rows="5" placeholder="@lang('client.product.comment')" required></textarea>
            <button class="btn btn-primary mt-2" onclick="comment('{{ route('client.products.comment', ['id' => $product->id]) }}', this, true)">
                @lang('client.product.comment')
            </button>
        </div>
    </div>
    <div class="box suggested mt-3">
        <div class="box__title">
            @lang('client.product.related')
        </div>
        <div class="products suggested-carousel owl-carousel owl-theme">
            @foreach ($suggestedProducts as $product)
                <a href="{{ route('client.products.show', ['id' => $product->id]) }}" class="item">
                    <img src="{{ asset(Storage::url($product->thumbnail)) }}" alt="{{ __('thumbnail') }}">
                    <p>{{ $product->name }}</p>
                    <div class="item__foot">
                        <b>{{ $product->money }}</b>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span>(10000)</span>
                    </div>
                 </a>                
            @endforeach
        </div>
    </div>
</div>
<div class="modal fade" id="report-modal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Report') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('Close') }}">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    {!! Form::label(__('Type'), null, ['class' => 'col-sm-3']) !!}
                    <div class="col-sm-9">
                        {!! Form::select('type', trans('message.type'), null, [
                            'id' => 'type',
                            'class' => 'form-control'
                        ]) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label(__('Description'), null, ['class' => 'col-sm-3']) !!}
                    <div class="col-sm-12">
                        {!! Form::textarea('content', null, [
                                'id' => 'report-content',
                                'class' => 'form-control',
                                'rows' => '3'
                            ]
                        ) !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="report('{{ route('client.report.store', ['id' => $product->id]) }}')" 
                    data-dismiss="modal" data-toggle="modal" data-target="#message">{{ __('Submit') }}</button>
                <button class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="message">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">{{ __('Sent') }}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('Close') }}">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>{{ __('Your Report Have Been Sent') }}</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('js')
<script src="{{ asset('js/client/product.js') }}">
</script>
@endsection
