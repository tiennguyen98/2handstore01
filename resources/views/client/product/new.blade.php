@extends('client.layout.master')


@section('title', 'Second Hand Store')


@section('content')

<div class="container">
    <div class="bg-white newpost px-4 pb-4">
        <div class="newpost__title">
            <div class="container">
                @lang('client.product.new')
                <a href="{{ route('index') }}" class="newpost__back btn btn-danger"> 
                    <i class="fas fa-backspace"></i> 
                    @lang('client.product.back') 
                </a>
                <a href="javascript:void(0)" class="newpost__save btn btn-success">
                    <i class="fas fa-save"></i> 
                    @lang('client.product.save') 
                </a>
            </div>
        </div>
        <div class="newpost__form">

            @forelse($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @empty
            @endforelse
            
            {!! Form::open([
                'class' => 'dropzone',
                'id' => 'my-dropzone',
                'method' => 'POST',
                'route' => 'client.product.upload.image'
            ]) !!}
            {!! Form::close() !!}

            {!! Form::open([
                'route' => 'client.product.store',
                'id' => 'new_product',
                'files' => true
            ]) !!} 

                {!! Form::hidden('image_data', null, ['id' => 'imageData']) !!}
                <div class="form-group mt-4 row">
                    <div class="input-group mb-2 col-sm-8">
                        <div class="input-group-prepend">
                            <div class="input-group-text">@lang('admin.product.name')</div>
                        </div>
                        {!! Form::text('name', null, [
                            'class' => 'form-control',
                            'placeholder' => __('admin.product.name')
                        ]) !!}
                    </div>
                    <div class="input-group mb-2 col-sm-4">
                        <div class="input-group-prepend">
                            <div class="input-group-text">@lang('admin.product.price')</div>
                        </div>
                        {!! Form::number('price', null, [
                            'class' => 'form-control',
                            'placeholder' => __('admin.product.price')
                        ]) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-8">
                        {!! Form::label('detail', __('admin.product.description'), []) !!}
                        {!! Form::textarea('detail', null, [
                            'class' => 'form-control',
                            'rows' => 13,
                            'placeholder' => __('admin.product.description')
                        ]) !!}
                    </div>
                    <div class="col-sm-4">
                        {!! Form::label('description', __('admin.product.thumbnail'), []) !!}
                        <div class="custom-file mb-4">
                            {!! Form::file('thumbnail', ['class' => 'custom-file-input']) !!}
                            {!! Form::label(null, __('admin.product.thumbnail'), ['class' => 'custom-file-label']) !!}
                        </div>

                        <div class="form-group mb-2">
                            {!! Form::label('', __('Quantity'), []) !!}
                            {!! Form::number('quantity', 1, [
                                'class' => 'form-control',
                                'placeholder' => __('Quantity')
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label(null, __('admin.product.category'), []) !!}
                            {!! Form::select('category_id', $categories, null, ['class' => 'custom-select']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label(null, __('admin.product.city'), []) !!}
                            {!! Form::select('city', $cities, null, [
                                    'class' => 'custom-select', 
                                    'id' => 'city',
                                    'data-url' => route('client.products.get_search_province')
                                ]) 
                            !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label(null, __('client.category.province'), []) !!}
                            {!! Form::select('province_id', [__('client.category.province')], null, ['class' => 'custom-select', 'id' => 'province']) !!}
                        </div>
                    </div>
                </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection


@section('js')
    <script src="{{ asset('bower_components/dropzone/dist/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('js/newproduct.js') }}"></script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/newproduct.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/dropzone/dist/min/dropzone.min.css') }}">
@endsection
