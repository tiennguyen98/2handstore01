<div class="sidebar">
    <div class="user-brief p-2">
        <div class="avatar">
            <img src="{{ asset(Storage::url($user->avatar)) }}" alt="avatar">
        </div>
        <div class="d-inline-block">{{ $user->name }}</div>
    </div>
    <ul class="mt-3">
        <li><a href="{{ route('client.user.profile') }}">{{ __('Profile') }}</a></li>
        <li><a href="">{{ __('Orders') }}</a></li>
        <li><a href="{{ route('password.edit') }}">{{ __('Change Password') }}</a></li>
        <li><a href="javascript:document.getElementById('logout').submit()">{{ __('Logout') }}</a></li>
    </ul>
</div>
