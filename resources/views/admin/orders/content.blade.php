<table class="table">
    <thead>
        <tr class="d-flex">
            <th class="col-sm-1">{{ __('Num.') }}</th>
            <th class="col-sm-2">{{ __('Email') }}</th>
            <th class="col-sm-2">{{ __('Thumbnail') }}</th>
            <th class="col-sm-2">{{ __('Product Name') }}</th>
            <th class="col-sm-2">{{ __('Address') }}</th>
            <th class="col-sm-2">{{ __('Note') }}</th>
            <th class="col"></th>
        </tr>
    </thead>
    <tbody>
        @php($i = --$page * config('database.paginate') + 1)
        @forelse ($orders as $order)
            <tr class="d-flex">
                <td class="col-sm-1">{{ $i++ }}</td>
                <td class="col-sm-2">{{ $order->email }}</td>
                <td class="col-sm-2">
                    <img src="{{ asset(Storage::url($order->thumbnail)) }}" alt="">
                </td>
                <td class="col-sm-2">{{ $order->name }}</td>
                <td class="col-sm-2">{{ $order->address }}</td>
                <td class="col-sm-2">{{ $order->note }}</td>
                <td class="col">
                    <button class="btn btn-danger" onclick="destroy('{{ route('admin.orders.destroy', ['id' => $order->id]) }}', '{{ __('Do you really want to delete this item?') }}')">{{ __('Delete') }}</button>
                </td>
            </tr>
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
