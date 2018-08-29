<table class="table">
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
            <td>
                {{ Html::image($product->thumbnail(), null, ['class' => 'image']) }}
            </td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->money }}</td>
            <td>{{ $product->user->email }}</td>
            <td>{{ $product->category->name }}</td>
            <td>{{ $product->province->city->name }}</td>
            <td>
                <a class="status btn btn-{{ $product->status()['css'] }}" title="{{ $product->status()['status'] }}">
                </a>
            </td>
            <td data-id="{{ $product->id }}">
                <a href="{{ route('client.products.show', ['id' => $product->id]) }}" class="btn btn-success" target="_blank">
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
