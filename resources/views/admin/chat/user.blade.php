<ul class="list-group">
    @forelse($users as $user)
        <a href="javascript:void(0)" class="user-result">
            <div class="p-1 bg-light overflow-auto list-group-item text-left">
                <div class="chat_img">
                    {!! Html::image($user->getAvatar(), 'avatar') !!}
                </div>
                <div class="chat_ib overflow-hidden">
                    <h5 class="search-email" data-id="{{ $user->id }}">{{ $user->email }}</h5>
                    <h5 class="search-name">{{ $user->name }}</h5>
                </div>
            </div>
        </a>
    @empty
        <a href="javascript:void(0)">
            <li class="list-group-item">
                <p>{{ __('No Data') }}</p>
            </li>
        </a>
    @endforelse
</ul>
