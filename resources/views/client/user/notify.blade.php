@extends('client.layout.master')

@section('title', __('client.Notifications'))

@section('content')
    <div class="container mt-5 bg-white p-5">
        <h2 class="text-center mb-4">
            @lang('client.Notifications')
        </h2>
        <div class="text-center">
            {!! Form::open([
                'method' => 'PUT',
                'route' => 'client.notifications.seenall'
            ]) !!}
                {!! Form::button(__('notify.seenall'), ['class' => 'btn btn-success w-25 mb-2', 'type' => 'submit']) !!}
            {!! Form::close() !!}
        </div>
        @forelse ($notifications as $notify)
            @if($notify->status > 0)
                <div href="{{ $notify->link }}" class="alert alert-info d-block notification">
                    <a href="{{ $notify->link }}">
                        {{ __($notify->content) }}
                        {{ $notify->detail }}
                        <br>
                        {{ $notify->time }}
                    </a>
                    {!! Form::open([
                        'method' => 'PUT',
                        'route' => 'client.notifications.seen'
                    ]) !!}
                        {!! Form::hidden('id', $notify->id, []) !!}
                        {!! Form::button('<i class="fas fa-eye"></i>', ['class' => 'btn read', 'type' => 'submit']) !!}
                    {!! Form::close() !!}
                </div>
            @else
                <div href="{{ $notify->link }}" class="alert alert-dark d-block notification">
                    <a href="{{ $notify->link }}">
                        {{ __($notify->content) }}
                        {{ $notify->detail }}
                        <br>
                        {{ $notify->time }}
                    </a>
                    {!! Form::button(__('client.seen'), ['class' => 'btn read text-white bg-dark']) !!}
                </div>
            @endif
        @empty
            <div class="alert alert-warning">
                @lang('client.empty')
            </div>
        @endforelse
    </div>

@endsection
