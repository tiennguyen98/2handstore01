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
                <th scope="col">@lang('admin.product.category')</th>
                <th scope="col">@lang('admin.product.province')</th>
                <th scope="col">@lang('admin.product.status.status')</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td><img src="{{ $product->thumbnail() }}" alt=""></td>
                    <td>
                        <a href="{{ route('client.products.show', ['id' => $product->id]) }}">{{ $product->name }}</a>
                    </td>
                    <td>{{ $product->money }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->province->city->name }}</td>
                    <td>
                        {!! Form::open([
                            'url' => route('client.myproduct.status', ['product' => $product->id]),
                            'method' => 'PUT'
                        ]) !!}
                        @if($product->status == 1)
                            {!! Form::submit(__('admin.product.status.available'), ['class' => 'btn btn-success']) !!}
                        @else
                            {!! Form::submit(__('admin.product.status.sold'), ['class' => 'btn btn-secondary']) !!}
                        @endif
                            {!! Form::close() !!}
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
        {{ $products->links() }}
    </div>
</div>
@endsection
