@extends('client.layout.master')

@section('title', __('order.order'))

@section('content')
<div class="bg-white container mt-5 pb-4">
    <h2 class="text-center">
        @lang('order.order')
    </h2>
    @if($is_active)
    <div class="row">
        <div class="col-md-6 text-center border-right">
            <img src="{{ $product->thumbnail() }}" alt="">
            <h2>
                {{ $product->name }}
            </h2>
            <p class="text-danger">
                {{ $product->money }}
            </p>
            <b>
                {{ $product->province->city->name }}
            </b>
        </div>
        <div class="col-md-6">
            {!! Form::open([
                'url' => route('client.order.buy', ['product' => $product->id]),
                'method' => 'POST'
            ]) !!}
                {!! Form::hidden('city_id', $city->id, []) !!}
                <p>
                    @lang('order.ship_to'): <b>{{ $city->name }}</b>
                </p>
                <div class="form-group">
                    {!! Form::label(null, __('client.address'), []) !!}
                    {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 
                    __('client.address')]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label(null, __('order.note'), []) !!}
                    {!! Form::textarea('note', null, ['class' => 'form-control', 'placeholder' => 
                    __('order.note')]) !!}
                </div>
                {!! Form::submit(__('order.order'), ['class' => 'btn btn-success w-100']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    @else
        <div class="alert alert-warning text-center">
            @lang('order.not_active')
        </div>
    @endif
</div>
@endsection

