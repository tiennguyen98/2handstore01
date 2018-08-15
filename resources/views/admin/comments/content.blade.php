<table class="table">
    <thead>
        <th>{{ __('Num.') }}</th>
        <th>{{ __('user_id') }}</th>
        <th>{{ __('product_id') }}</th>
        <th>{{ __('content') }}</th>
        <th>{{ __('parent_id') }}</th>
        <th></th>
    </thead>
    <tbody>
        @php($i = --$page * config('database.paginate') + 1)
        @forelse($comments as $comment)
            <tr class="{{ $i % 2 == 0 ? 'table-warning' : 'table-primary'}}">
                <td>{{ $i++ }}</td>
                <td>{{ $comment->user_id }}</td>
                <td>{{ $comment->product_id }}</td>
                <td>{{ $comment->content }}</td>
                <td>{{ $comment->parent_id }}</td>
                <td>
                    <button onclick="destroy('{{ route('admin.comments.destroy', ['id' => $comment->id]) }}', '{{ __('Do you really want to delete this item?') }}')" class="delete btn btn-danger">{{ __('Delete') }}</button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">{{ __('No Data') }}</td>
            </tr>
        @endforelse
    </tbody>
</table>

<div>
    {{ $comments->links() }}
</div>
