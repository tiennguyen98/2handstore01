@extends('admin.layout.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')

    @if(!isset($category))
    @section('title', __('Create Category'))

    @section('module', __('Create Category'))
    {!! Form::open([
        'method' => 'POST',
        'url' => route('admin.categories.store'),
        'class' => 'form-horizontal',
        'files' => true
        ]) 
    !!}
    @else
    @section('title', __('Edit Category'))

    @section('module', __('Edit Category'))
    {!! Form::model($category, [
        'method' => 'PUT',
        'url' => route('admin.categories.update', ['id' => $category->id]),
        'class' => 'form-horizontal',
        'files' => true
    ]) 
    !!}
    @endif
        <div class="form-group row">
            {!! Form::label(__('admin.category.thumbnail'), null, ['class' => 'col-sm-2']) !!}
            <div class="col-sm-5">
                {!! Form::file('image', ['id' => 'image']) !!}
                <img src="{{ isset($category) ? $category->getThumbnail() : '' }}" id="uploading-img" alt="">
            </div>
            <div class="offset-sm-2 col-sm-5 mt-2">
                @if($errors->has('image'))
                    <span class="alert alert-danger"><strong>{{ $errors->first('image') }}</strong></span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label(__('admin.category.name'), null, ['class' => 'col-sm-2']) !!}
            <div class="col-sm-5">
                {!! Form::text('name', null, [
                    'class' => 'form-control', 
                    'placeholder' => __('Input Category Name'),
                    'required'
                ]) !!}
                @if($errors->has('name'))
                    <span class="alert alert-danger"><strong>{{ $errors->first('name') }}</strong></span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label(__('admin.category.slug'), null, ['class' => 'col-sm-2']) !!}
            <div class="col-sm-5">
                {!! Form::text('slug', null, [
                    'class' => 'form-control', 
                    'placeholder' => __('Input Category Slug'),
                    'required'
                ]) !!}
                @if($errors->has('slug'))
                    <span class="alert alert-danger"><strong>{{ $errors->first('slug') }}</strong></span>
                @endif                
            </div>
        </div>

        @if(((isset($category) && ($category->parent_id !== null 
            || count($category->categories) < 1)) 
            || !isset($category)) && count($categories) > 0)
            <div class="form-group row">
                {!! Form::label(__('is parent'), null, ['class' => 'col-sm-2']) !!}
                <div class="col-sm-5">
                    {!! Form::radio('is_parent', 1, true) !!} {{ __('yes') }}
                    {!! Form::radio('is_parent', 0, false) !!} {{ __('no') }}
                </div> 
            </div>
            <div class="form-group row select-parent" hidden="hidden">
                {!! Form::label(__('parent'), null, ['class' => 'col-sm-2']) !!}
                <div class="col-sm-5">
                    {!! Form::select('parent_id', $categories) !!}
                </div>
            </div>
        @endif
        <div class="form-group row">
            <div class="col-sm-5 offset-sm-2">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            </div>
        </div>        
    {!! Form::close() !!}
@endsection

@section('js')
    <script src="{{ asset('bower_components/jquery/dist/jquery.js') }}"></script>
    <script src="{{ asset('js/admin/category.js') }}"></script>
@endsection
