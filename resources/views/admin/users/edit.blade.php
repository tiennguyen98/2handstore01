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
                'class' => 'col-sm-1'
            ]) !!}
            <div class="col-sm-5">
                <img name="avatar" id="avatar" src="{{ $user->getAvatar() }}" alt="avatar">
                {!! Form::file('image', ['id' => 'image']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('name', 'Name', ['class' => 'col-sm-1 col-form-label']) !!}
            <div class="col-sm-5">
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('is_active', __('is_active'), ['class' => 'col-sm-1 col-form-label']) !!}
            <div class="col-sm-5">
                {!! Form::radio('status', 1) !!} {{ __('verified') }}
                {!! Form::radio('status', 0) !!} {{ __('unverify') }}
                {!! Form::radio('status', -1) !!} {{ __('blocked') }}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('description', __('description'), ['class' => 'col-sm-1 col-form-label']) !!}
            <div class="col-sm-5">
                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
            </div>
        </div>    
        <div class="form-group row">
            <div class="col-sm-5 offset-sm-1">
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
