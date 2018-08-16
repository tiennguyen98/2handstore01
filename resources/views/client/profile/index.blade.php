@extends('client.layout.master')


@section('title', $user->name)


@section('content')

<div class="container profile mt-4">
    <div class="profile__information">
        <div class="row">
            <div class="col-md-2">
                <img src="{{ $user->getAvatar() }}" alt="" class="profile__avatar">
            </div>
            <div class="col-md-10 pl-5">
                <p class="mb-1">
                    {{ $user->name }}
                </p>
                <div class="rate">
                    <div class="voting">
                        <span class="text-danger">
                            <span>
                                @lang('profile.rating.avg')
                                <b id="avg">
                                    {{ $rates['avg'] }}
                                </b>
                                <i class="fas fa-star"></i>
                            </span>
                            | 
                            <span>
                                @lang('profile.rating.votes')
                                <b id="votes">
                                    {{ $rates['votes'] }}
                                </b>
                            </span>
                        </span>
                        @auth
                        @if(Auth::user()->id != $user->id)
                            {!! Form::open() !!}
                                <div class="stars" data-url="{{ route('client.profile.rate', ['user' => $user->id]) }}" my-vote="{{ $my_vote }}">
                                    {!! Form::radio('star', 1, null, [
                                        'class' => 'star-1', 
                                        'id' => 'star-1'
                                    ]) !!}
                                    {!! Form::label('star-1', 1, ['class' => 'star-1']) !!}

                                    {!! Form::radio('star', 2, null, [
                                        'class' => 'star-2', 
                                        'id' => 'star-2'
                                    ]) !!}
                                    {!! Form::label('star-2', 2, ['class' => 'star-2']) !!}


                                    {!! Form::radio('star', 3, null, [
                                        'class' => 'star-3', 
                                        'id' => 'star-3'
                                    ]) !!}
                                    {!! Form::label('star-3', 3, ['class' => 'star-3']) !!}

                                    {!! Form::radio('star', 4, null, [
                                        'class' => 'star-4', 
                                        'id' => 'star-4'
                                    ]) !!}
                                    {!! Form::label('star-4', 4, ['class' => 'star-4']) !!}

                                    {!! Form::radio('star', 5, null, [
                                        'class' => 'star-5', 
                                        'id' => 'star-5'
                                    ]) !!}
                                    {!! Form::label('star-5', 5, ['class' => 'star-5']) !!}
                                    <span></span>
                                </div>
                            {!! Form::close() !!}
                        @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="profile__description">
        <p>
            {{ $user->description }}
        </p>
    </div>
    <div class="card">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <i class="fas fa-map-marker-alt"></i> <span>@lang('client.address'):</span> {{ $user->address ?? __('profile.notupdate') }}
            </li>
            <li class="list-group-item">
                <i class="fas fa-phone"></i> <span>@lang('client.phone'):</span> {{ $user->phone ?? __('profile.notupdate') }}
            </li>
            <li class="list-group-item">
                <i class="fas fa-envelope"></i> <span>@lang('auth.email'):</span> {{ $user->email }}
            </li>
        </ul>
    </div>
    <h2 class="text-center mt-4">@lang('profile.myproduct', ['name' => $user->name])</h2>
    <div class="row products mt-5">
        @forelse($user_products as $product)
            @include('client.components.product')
        @empty
            <div class="alert alert-warning text-center w-100">
                @lang('client.empty')
            </div>
        @endforelse
        <div class="col-12">
            {{ $user_products->links() }}
        </div>
    </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/profile_client.css') }}">
@endsection

@section('js')
<script src="{{ asset('js/profile_voting.js') }}"></script>
@endsection
