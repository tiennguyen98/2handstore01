@extends('client.layout.master')

@section('title', __('Products'))

@section('content')

<div class="container bg-white mt-5">
    <table class="table">
            <thead>
                <tr>
                    <th scope="col">@lang('admin.product.thumbnail')</th>
                    <th scope="col">@lang('admin.product.name')</th>
                    <th scope="col">@lang('admin.product.price')</th>
                    <th scope="col">@lang('admin.product.postedby')</th>
                    <th scope="col">@lang('admin.product.status.status')</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                    <tr>
                        <td><img src="{{ $order->products->thumbnail() }}" alt=""></td>
                        <td><a href="{{ route('client.products.show', ['id' => $order->products->id]) }}">{{ $order->products->name }}</a></td>
                        <td>{{ $order->products->money }}</td>
                        <td>{{ $order->products->user->email }}</td>
                        <td>
                            @if($order->status == 1)
                                {!! Form::submit(__('admin.product.status.available'), ['class' => 'btn btn-secondary']) !!}
                            @else
                                {!! Form::submit(__('admin.product.status.sold'), ['class' => 'btn btn-success']) !!}
                            @endif
                        </td>
                    </tr>
                @empty
                    <div class="alert alert-warning text-center">
                        @lang('client.empty')
                    </div>
                @endforelse
        </tbody>
    </table>
    <div class="text-center">
        {{ $orders->links() }}
    </div>
</div>
@endsection
