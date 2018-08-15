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
        @php( $i = --$page * 10 + 1)
        @forelse($users as $user)
            <tr class="{{ $i % 2 == 0 ? 'table-success' : 'table-secondary' }}">
                <td>{{ $i++ }}</td>
                <td><img src="{{ $user->getAvatar() }}" alt="avatar" class="avatar"></td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->verified() ? __('yes') : __('no') }}</td>
                <td>
                    <button onclick="show('{{ route('admin.users.show') }}', '{{ $user->id }}')" class="show btn btn-warning" data-toggle="modal" data-target="#userModal">{{ __('show') }}</button>

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

<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ __('user information') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body" id="modal-body">
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>

<div class="paginate">
    {{ $users->links() }}
</div>
