@extends('admin.layout.master')

@section('title', __('edit user'))

@section('module', __('edit user'))

@section('content')
    {!! Form::model($user, [
        'method' => 'PUT',
        'class' => 'form-horizontal',
        'url' => route('admin.users.update', ['id' => $user->id]),
        'files' => true
    ]) 
    !!}
        <div class="form-group row">
            {!! Form::label('avatar', 'Avatar',[
                'class' => 'col-sm-2'
            ]) !!}
            <div class="col-sm-5">
                <img name="avatar" id="avatar" src="{{ $user->getAvatar() }}" alt="avatar">
                {!! Form::file('image', ['id' => 'image']) !!}
            </div>
            <div class="offset-sm-2 col-sm-5 mt-3">
                @if($errors->has('image'))
                    <span class="alert alert-danger"><strong>{{ $errors->first('image') }}</strong></span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('name', __('Name'), ['class' => 'col-sm-2 col-form-label']) !!}
            <div class="col-sm-5">
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="offset-sm-2 col-sm-5 mt-3">
                @if($errors->has('name'))
                    <span class="alert alert-danger"><strong>{{ $errors->first('name') }}</strong></span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('is_active', __('is_active'), ['class' => 'col-sm-2 col-form-label']) !!}
            <div class="col-sm-5">
                {!! Form::radio('status', 1) !!} {{ __('verified') }}
                {!! Form::radio('status', 0) !!} {{ __('unverify') }}
                {!! Form::radio('status', -1) !!} {{ __('blocked') }}
            </div>
            <div class="offset-sm-2 col-sm-5 mt-3">
                @if($errors->has('is_active'))
                    <span class="alert alert-danger"><strong>{{ $errors->first('is_active') }}</strong></span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('description', __('Description'), ['class' => 'col-sm-2 col-form-label']) !!}
            <div class="col-sm-5">
                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
            </div>
            <div class="offset-sm-2 col-sm-5 mt-3">
                @if($errors->has('description'))
                    <span class="alert alert-danger"><strong>{{ $errors->first('description') }}</strong></span>
                @endif
            </div>
        </div>    
        <div class="form-group row">
            <div class="col-sm-5 offset-sm-2">
                {!! Form::button(__('save'), [
                    'class' => 'btn btn-success',
                    'type' => 'submit'
                ]) !!}
                <a href="{{ route('admin.users.index') }}" class="btn btn-danger">@lang('cancel')</a>
            </div>
        </div>             
    {!! Form::close() !!}
@endsection

@section('js')
    <script>
        $(jQuery).ready(function () {
            function readURL(input) {

                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                
                    reader.onload = function(e) {
                    $('#avatar').attr('src', e.target.result);
                    }
                
                    reader.readAsDataURL(input.files[0]);
                }
            }
                
            $("#image").change(function() {
                readURL(this);
            });
        })
    </script>
@endsection
