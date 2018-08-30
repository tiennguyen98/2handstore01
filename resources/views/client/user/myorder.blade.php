@extends('client.layout.master')

@section('title', __('Orders'))

@section('content')

<div class="container-fluid bg-white mt-5">
    <h2 class="text-center my-4 pt-4">{{ __('Orders') }}</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="15%">#</th>
                <th>@lang('profile.product')</th>
                <th>@lang('profile.deal')</th>
                <th>@lang('profile.order.contact')</th>
                <th>@lang('profile.shipto')</th>
                <th>@lang('auth.city')</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
            <tr @if($order->status == config('site.discard'))
                    class="bg-dark text-white" 
                @endif
            >
                <td><img src="{{ $order->products->thumbnail() }}" alt=""></td>
                <td>
                    <a href="{{ route('client.products.show', ['id' => $order->products->id]) }}">{{ $order->products->name }}</a>
                </td>
                <td>
                    {{ $order->money }}
                </td>
                <td>
                    Email: <b>{{ $order->user->email }}</b> <br>
                    @lang('client.phone'): <b>{{ $order->user->phone }}</b>
                </td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->city->name }}</td>
                <td>
                    @if($order->status != config('site.discard'))
                        {!! Form::open([
                            'route' => 'client.orders.sell',
                            'method' => 'PUT'
                        ]) !!}
                            {!! Form::hidden('order_id', $order->id, []) !!}
                            @if($order->status == config('site.active'))
                                {!! Form::submit(__('profile.Sell'), ['class' => 'btn btn-success']) !!}
                            @else
                                {!! Form::submit(__('profile.Sold'), ['class' => 'btn btn-secondary']) !!}
                            @endif
                        {!! Form::close() !!}
                        
                        {!! Form::open([
                            'route' => 'client.orders.discard',
                            'method' => 'PUT'
                        ]) !!}
                            {!! Form::hidden('order_id', $order->id, []) !!}
                            {!! Form::submit(__('client.Discard'), [
                                    'class' => 'btn btn-danger mt-2 discard',
                                    'data-msg' => __('client.Discard') . '?'
                                ]) 
                            !!}
                        {!! Form::close() !!}
                    @else
                        <span class="btn btn-danger">@lang('client.Discarded')</span>
                    @endif
                </td>
            </tr>
            @empty
            <div class="alert alert-warning">
                @lang('client.empty')
            </div>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@section('js')
    <script src="{{ asset('js/client/myorder.js') }}"></script>
@endsection
