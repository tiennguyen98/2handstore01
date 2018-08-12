<table class="table">
    <thead>
        <tr class="d-flex">
            <th class="col-1 col-sm-1">{{ __('Num.') }}</th>
            <th class="col-2">{{ __('User Email') }}</th>
            <th class="col-2">{{ __('Product Name') }}</th>
            <th class="col-3">{{ __('Content') }}</th>
            <th class="col-3">{{ __('Parent Comment') }}</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @php($i = --$page * config('database.paginate') + 1)
        @forelse($comments as $comment)
            <tr class="d-flex {{ $i % 2 == 0 ? 'table-warning' : 'table-primary'}}">
                <td class="col-1 col-sm-1">{{ $i++ }}</td>
                <td class="col-2">{{ $comment->email }}</td>
                <td class="col-2">{{ $comment->name }}</td>
                <td class="col-3">{{ $comment->content }}</td>
                <td class="col-3">{{ $comment->parentComment() }}</td>
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
