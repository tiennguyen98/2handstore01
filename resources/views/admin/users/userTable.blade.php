<table class="table">
    <thead>
        <th>{{ __('Num.') }}</th>
        <th>Avatar</th>
        <th> @lang('name') </th>
        <th>Email</th>
        <th> @lang('address') </th>
        <th> @lang('phone') </th>
        <th> @lang('verified') </th>
    </thead>
    <tbody>
        @php( $i = --$page * config('database.paginate') + 1)
        @forelse($users as $user)
            <tr class="{{ $i % 2 == 0 ? 'table-success' : 'table-secondary' }}">
                <td>{{ $i++ }}</td>
                <td>{!! Html::image($user->getAvatar(), 'avatar', ['class' => 'avatar']) !!}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->verified() ? __('yes') : __('no') }}</td>
                <td>

                    <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}" class="btn btn-primary">{{ __('edit') }}</a>
                    
                    @if($user->status >= 0)
                        <button onclick="block('{{ route('admin.users.block') }}', '{{ $user->id }}', '{{ __('Do you really want to block this user?') }}')" class="block btn btn-danger">{{ __('block') }}</button>
                    @else
                        <button onclick="block('{{ route('admin.users.block') }}', '{{ $user->id }}', '{{ __('Do you really want to unblock this user?') }}')" class="block btn btn-success">{{ __('unblock') }}</button>
                    @endif
                </td>
            </tr>
        @empty
            <tr class="table-success">
                <td colspan="8">{{ __('No Data') }}</td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="paginate">
    {{ $users->links() }}
</div>
