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
                @forelse ($products as $product)
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
                        <td data-id="{{ $product->id }}">
                            <a href="javascript:void(0)"
                                class="btn btn-success show"
                                data-url="{{ route('admin.product.show', ['product' => $product->id]) }}"
                            >
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="javascript:void(0)" 
                                class="btn btn-danger delete"
                                data-url="{{ route('admin.product.destroy', ['product' => $product->id]) }}"
                                data-msg="@lang('admin.control.confirm', ['action' => 'delete'])"
                            >
                                <i class="fa fa-times"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
        <div class="text-center">
            {{ $products->links() }}
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fa fa-times"></i>
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/product.js') }}"></script>
@endsection

