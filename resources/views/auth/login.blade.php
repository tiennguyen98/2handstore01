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
                @if($errors->has('verify'))
                    <div class="alert alert-success">
                        <p>{{ $errors->first('verify') }}</p>
                        <p><a href="{{ route('register.showResendForm') }}">{{ __('Click here to resend verify email') }} </a></p>
                    </div>
                @endif                    
                {!! Form::open(['route' => 'login']) !!}

                    <div class="form-group row">

                        {{ Form::label(
                                __('auth.email'), 
                                null, 
                                [
                                    'class' => 'col-sm-3 col-form-label'
                                ]
                            ) 
                        }}

                        <div class="col-sm-9">
                            {!! Form::text(
                                'email',
                                 null, 
                                [
                                    'placeholder' => __('auth.email'),
                                    'class' => 'form-control'
                                ]
                            ) 
                            !!}
                        </div>
                        @if($errors->has('email'))
                        <div class="col-sm-9 offset-sm-3 mt-3">
                            <span class="alert alert-danger">{{ $errors->first('email') }}</span>
                        </div>
                        @endif
                    </div>
                    <div class="form-group row">
                        {{ Form::label(
                                __('auth.password'), 
                                null, 
                                [
                                    'class' => 'col-sm-3 col-form-label'
                                ]
                            ) 
                        }}
                        <div class="col-sm-9">
                            {!! Form::password('password',
                                    [
                                        'placeholder' => __('auth.password'),
                                        'class' => 'form-control'
                                    ]
                                ) 
                            !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('remember me') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        {!! Form::button(__('auth.login'), 
                            [
                                'class' => 'btn btn-success px-5',
                                'type' => 'submit'
                            ]) 
                        !!}
                    </div>
                    <div class="text-left mt-2">
                        <p><a href="{{ route('password.request') }}">{{ __('forgot password') }}</a></p>
                    </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>

@endsection
