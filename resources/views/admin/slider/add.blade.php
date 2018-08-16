@extends('admin.layout.master')

@section('module', __('admin.slider'))

@section('content')
<div class="card">
    <div class="card-body">
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
        @endif

        {!! Form::open([
                'route' => 'admin.slide.store',
                'method' => 'POST',
                'files' => true
            ]) 
        !!}
        <div class="form-group">
            {!! Form::file('image', ['class' => 'form-control image-input']) !!}
        </div>
        <div class="text-center border my-4 image">
            <img />
        </div>
        <div class="form-group">
            {!! Form::text('link', null, 
                [
                    'class' => 'form-control',
                    'placeholder' => __('admin.slide.link')
                ]
            ) !!}
        </div>
        <div class="text-center">
            {!! Form::submit(__('admin.slide.add'), 
                [
                    'class' => 'btn btn-success w-100'
                ]
            ) !!}
        </div>

        {!! Form::close() !!}
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('bower_components/sufee-admin-dashboard/assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('js/slider.js') }}"></script>

@endsection
