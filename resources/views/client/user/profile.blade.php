@extends('client.layout.profile')

@section('title', __('Profile'))

@section('profile-content')
    <h3>{{ __('Profile') }}</h3>

    {!! Form::model($user,[
        'method' => 'PUT',
        'url' => route('client.user.update', ['id' => $user->id]),
        'class' => 'from-horizontal',
        'files' => true
    ]) !!}

        <div class="form-group row">
            <div class="input-group">
                {!! Form::label(__('avatar'), null, ['class' => 'form-label col-sm-3']) !!}
                <span class="input-group-btn">
                    <span class="btn btn-default btn-file">
                        <button class="btn btn-secondary">{{ __('Browse… ') }}</button>
                        <input type="file" name="image" id="imgInp">
                    </span>
                </span>
                <div class="img-upload">
                    <img id='img-upload' src="{{ asset(Storage::url($user->avatar)) }}"/>
                </div>
                @if($errors->has('image'))
                    <div class="offset-sm-3 col-sm-8">
                        <span class=" text-danger">{{ __($errors->first('image')) }}</span>
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            {!! Form::label(__('name'), null, ['class' => 'form-label col-sm-3']) !!}
            <div class="col-sm-8">
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            @if($errors->has('name'))
            <div class="offset-sm-3 col-sm-8">
                <span class=" text-danger">{{ __($errors->first('name')) }}</span>
            </div>
            @endif
        </div>

        <div class="form-group row">
            {!! Form::label(__('email'), null, ['class' => 'form-label col-sm-3']) !!}
            <div class="col-sm-8">
                <p>{{ $user->email }}</p>
            </div>
        </div>

        <div class="form-group row">
            {!! Form::label(__('phone'), null, ['class' => 'form-label col-sm-3']) !!}
            <div class="col-sm-8">
                {!! Form::text('phone', null, ['class' => 'form-control']) !!}
            </div>
            @if($errors->has('phone'))
            <div class="offset-sm-3 col-sm-8">
                <span class=" text-danger">{{ __($errors->first('phone')) }}</span>
            </div>
            @endif
        </div>

        <div class="form-group row">
            {!! Form::label(__('address'), null, ['class' => 'form-label col-sm-3']) !!}
            <div class="col-sm-8">
                {!! Form::text('address', null, ['class' => 'form-control']) !!}
            </div>
            @if($errors->has('address'))
            <div class="offset-sm-3 col-sm-8">
                <span class=" text-danger">{{ __($errors->first('address')) }}</span>
            </div>
            @endif
        </div>

        <div class="form-group row">
            {!! Form::label(__('description'), null, ['class' => 'form-label col-sm-3']) !!}
            <div class="col-sm-8">
                {!! Form::textarea('description', null, [
                    'class' => 'form-control',
                    'rows' => 5
                ]) !!}
            </div>
            @if($errors->has('description'))
            <div class="offset-sm-3 col-sm-8">
                <span class=" text-danger">{{ __($errors->first('description')) }}</span>
            </div>
            @endif
        </div>
        <div class="form-group row">
            <div class="col-sm-8 offset-sm-3"> 
                <button type="submit" class="btn btn-success">{{ __('save') }}</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
    
@endsection

@section('js')
    <script src="{{ asset('js/profile.js') }}"></script>
@endsection
