@extends('client.layout.master')


@section('title', __('auth.login'))


@section('content')

<div class="login">
    <div class="container">
        <div class="row">
            <div class="offset-md-3 col-md-6 bg-white mt-5 pb-4">
                <h2 class="text-center mt-4">
                    @lang('auth.login')
                </h2>
                @if($errors->has('messages'))
                    <div class="alert alert-success">

                        <span>{{ $errors->first('messages') }}</span>
                    </div>
                @endif
                <h3 class="text-center">
                    <img src="{{ $provider_user->avatar }}" alt=""> {{ $provider_user->name }}
                </h3>
                {!! Form::open([
                    'url' => route('register'),
                    'method' => 'POST'
                ]) !!}
                    {!! Form::hidden('email', $provider_user->email, []) !!}
                    {!! Form::hidden('name', $provider_user->name, []) !!}
                    {!! Form::hidden('phone', null, []) !!}
                    <div class="form-group row">

                        {{ Form::label(__('auth.password'), null, ['class' => 'col-sm-3 col-form-label']) }}

                        <div class="col-sm-9">
                            {!! Form::password('password', [
                                'placeholder' => __('auth.password'),
                                'class' => 'form-control'
                            ]) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {{ Form::label(__('auth.repassword'), null, ['class' => 'col-sm-3 col-form-label']) }}
                        <div class="col-sm-9">
                            {!! Form::password('password_confirmation', [
                                'placeholder' => __('auth.repassword'),
                                'class' => 'form-control'
                            ]) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {{ Form::label(__('address'), null, ['class' => 'col-sm-3 col-form-label']) }}
                        <div class="col-sm-9">
                            {!! Form::text('address', null, [
                                    'class' => 'form-control',
                                    'placeholder' => __('address')
                                ]) 
                            !!}
                        </div>
                    </div>
                    <div class="text-center">
                        {!! Form::button(__('auth.confirm'), [
                            'class' => 'btn btn-success px-5',
                            'type' => 'submit'
                        ]) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection
