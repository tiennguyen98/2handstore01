<table class="table">
    <thead>
        <tr class="d-flex">
            <th class="col-sm-1">{{ __('Num.') }}</th>
            <th class="col-sm-2">{{ __('Thumbnail') }}</th>
            <th class="col-sm-2">{{ __('Product Name') }}</th>
            <th class="col-sm-2">{{ __('Buyer Email') }}</th>
            <th class="col-sm-2">{{ __('Seller Email') }}</th>
            <th>{{ __('Address') }}</th>
            <th>{{ __('Status') }}</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @php($i = --$page * config('database.paginate') + 1)
        @forelse ($orders as $order)
            @if($order->products)
                <tr class="d-flex">
                    <td class="col-sm-1">{{ $i++ }}</td>
                    <td class="col-sm-2">
                        {!! Html::image( asset(config('site.thumbnail') . $order->thumbnail), 'thumbnail') !!}
                    </td>
                    <td class="col-sm-2">{{ $order->name }}</td>
                    <td class="col-sm-2">{{ $order->email }}</td>
                    <td class="col-sm-2">{{ $order->products->user->email }}</td>
                    <td>{{ $order->address }}</td>
                    <td>
                        @if($order->status != config('site.discard'))
                            @if($order->status == config('site.active'))
                                <a class="status btn btn-success"></a>
                            @else
                                <a class="status btn btn-secondary"></a>
                            @endif
                        @else
                            <a class="status btn btn-danger"></a>
                        @endif
                    </td>
                    <td class="col">
                        <button class="btn btn-danger" onclick="destroy('{{ route('admin.orders.destroy', ['id' => $order->id]) }}', '{{ __('Do you really want to delete this item?') }}')">{{ __('Delete') }}</button>
                    </td>
                </tr>
            @else
                <tr class="bg-secondary d-flex">
                    <td class="col-sm-1"></td>
                    <td class="col-sm-2">
                        {!! Html::image(asset('storage/thumbnails/default.jpg')) !!}
                    </td>
                    <td class="text-white" colspan="6">@lang('client.product.deleted')</td>
                </tr>
            @endif
        @empty
            <tr class="d-flex">
                <td colspan="" class="text-center">{{ __('No Data') }}</td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="paginate">
    {{ $orders->links() }}
</div>
