@extends('admin.layout.master')

@section('module', __('admin.article.articles'))

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table" style="font-size: 14px">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">@lang('admin.product.thumbnail')</th>
                    <th scope="col">@lang('admin.product.name')</th>
                    <th scope="col">@lang('admin.product.price')</th>
                    <th scope="col">@lang('admin.product.postedby')</th>
                    <th scope="col">@lang('admin.product.category')</th>
                    <th scope="col">@lang('admin.product.province')</th>
                    <th scope="col">@lang('admin.product.status.status')</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr id="{{ 'product' . $product->id }}">
                    <th scope="row">{{ $product->id }}</th>
                    <td><img src="{{ $product->thumbnail() }}" alt="" width="100px"></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->money }}</td>
                    <td>{{ $product->user->email }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->city->name }}</td>
                    <td>
                        <a class="status btn btn-{{ $product->status()['css'] }}" title="{{ $product->status()['status'] }}">
                        </a>
                    </td>
                    <td>
                        <a href="javascript:void(0)" 
                            data-id="{{ $product->id }}" 
                            class="btn btn-danger delete"
                            data-url="{{ route('product.destroy', ['product' => $product->id]) }}"
                            data-msg="@lang('admin.control.confirm', ['action' => 'delete'])"
                        >
                            @lang('admin.control.delete')
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="text-center">
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('js/product.js') }}"></script>
@endsection

