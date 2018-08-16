@extends('client.layout.master')

@section('title', __('Orders'))

@section('content')

<div class="container bg-white mt-5">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="15%">#</th>
                <th>@lang('profile.product')</th>
                <th>@lang('profile.order.contact')</th>
                <th>@lang('profile.shipto')</th>
                <th>@lang('auth.city')</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
            <tr>
                <td><img src="{{ $order->products->thumbnail() }}" alt=""></td>
                <td>
                    <a href="{{ route('client.products.show', ['id' => $order->products->id]) }}">{{ $order->products->name }}</a>
                <td>
                    Email: <b>{{ $order->user->email }}</b> <br>
                    @lang('client.phone'): <b>{{ $order->user->phone }}</b>
                </td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->city->name }}</td>
                <td>
                    {!! Form::open([
                        'route' => 'client.orders.sell',
                        'method' => 'PUT'
                    ]) !!}
                    {!! Form::hidden('order_id', $order->id, []) !!}
                    @if($order->status == 1)
                        {!! Form::submit(__('profile.Sell'), ['class' => 'btn btn-success']) !!}
                    @else
                        {!! Form::submit(__('profile.Sold'), ['class' => 'btn btn-secondary']) !!}
                    @endif
                        {!! Form::close() !!}
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

