@extends('client.layout.master')

@section('title', __('Products'))

@section('content')

<div class="container bg-white mt-5">
    <h2 class="text-center my-4 pt-4">{{ __('client.purchases') }}</h2>
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
                    @if($order->products)
                        <tr>
                            <td>
                                {!! Html::image($order->products->thumbnail())  
                                !!}
                            </td>
                            <td><a href="{{ route('client.products.show', ['id' => $order->products->id]) }}">{{ $order->products->name }}</a></td>
                            <td>{{ $order->products->money }}</td>
                            <td>{{ $order->products->user->email }}</td>
                            <td>
                                @if($order->status == config('site.active'))
                                    {!! Form::submit(__('admin.product.status.available'), ['class' => 'btn btn-secondary']) !!}
                                @else
                                    {!! Form::submit(__('admin.product.status.sold'), ['class' => 'btn btn-success']) !!}
                                @endif
                            </td>
                        </tr>
                    @else
                        <tr class="bg-secondary">
                            <td>
                                {!! Html::image(asset('storage/thumbnails/default.jpg')) !!}
                            </td>
                            <td class="text-white">@lang('client.product.deleted')</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endif
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
