@extends('admin.layout.master')

@section('module', __('admin.system.config'))

@section('content')
<div class="card">
    <div class="card-body">
        <div id="pay-invoice">
            <div class="card-body">
                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
                @if($missedKey === false || count($options) <= 0)
                    {!! Form::open([
                        'route' => 'admin.config.save',
                        'method' => 'PUT',
                        'files' => true
                        ]) !!}

                        <div class="form-group">
                            {!! Form::label(null, __('info.title'), []) !!}
                            {!! Form::text('title', $options['title'], ['class' => 'form-control']
                            ) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label(null, __('info.description'), []) !!}
                            {!! Form::text('description', $options['description'], ['class' => 'form-control']
                            ) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label(null, __('info.keyword'), []) !!}
                            {!! Form::text('keyword', $options['keyword'], ['class' => 'form-control']
                            ) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label(null, __('info.address'), []) !!}
                            {!! Form::text('address', $options['address'], ['class' => 'form-control']
                            ) !!}
                        </div>

                        <div class="form-group">
                                {!! Form::label(null, __('info.phone'), []) !!}
                            {!! Form::text('phone', $options['phone'], ['class' => 'form-control']
                            ) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label(null, __('info.email'), []) !!}
                            {!! Form::text('email', $options['email'], ['class' => 'form-control']
                            ) !!}
                        </div>

                        {!! Form::label(null, __('info.logo'), []) !!}
                        <div class="form-group row">
                            <div class="col-4">
                                <img src="{{ $options['logo'] }}" alt="" id="logo">
                            </div>
                            <div class="col-8">
                                {!! Form::file('logo', ['class' => 'form-control logo']
                            ) !!}
                            </div>
                        </div>

                        {!! Form::label(null, __('info.favicon'), []) !!}
                        <div class="form-group row">
                            <div class="col-4">
                                <img src="{{ $options['favicon'] }}" alt="" id="favicon">
                            </div>
                            <div class="col-8">
                                {!! Form::file('favicon', ['class' => 'form-control favicon']
                            ) !!}
                            </div>
                        </div>
                        
                        {!! Form::submit(__('admin.system.config'), ['class' => 'btn btn-success']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('js/config.js') }}"></script>
@endsection
