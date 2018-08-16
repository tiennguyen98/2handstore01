@extends('admin.layout.master')

@section('module', __('admin.slider'))

@section('content')
<div class="card">
    <div class="card-body">
        @if(session('msg'))
            <div class="alert alert-success">
                {{ session('msg') }}
            </div>
        @endif
        <table class="table" style="font-size: 14px">
            <thead>
                <tr>
                    <th scope="col" width="50%">@lang('admin.slide.image')</th>
                    <th scope="col">@lang('admin.slide.link')</th>
                    <th scope="col">
                        <a href="{{ route('admin.slide.add') }}" class="btn btn-success">
                            @lang('admin.slide.add')
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
            @if(count($slides) > 0)
            @foreach ($slides as $slide)
                <tr id="{{ 'slide' . $slide->id }}">
                    <td>
                        <a href="javascript:void(0)" class="zoom">
                            <img src="{{ $slide->getImage() }}" alt="">
                        </a>
                    </td>
                    <td>
                        <a href="{{ $slide->link() }}">{{ $slide->link() }}</a>
                    </td>
                    <td>
                        <a href="{{ route('admin.slide.edit', ['id' => $slide->id]) }}" class="btn btn-warning">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="javascript:void(0)" 
                            data-id="{{ $slide->id }}" 
                            class="btn btn-danger delete" 
                            data-url="{{ route('admin.slide.destroy') }}"
                            data-msg="@lang('admin.control.confirm', ['action' => 'delete'])"
                        >
                            <i class="fa fa-times"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            @endif
            </tbody>
        </table>
        <div class="text-center">
            {{ $slides->links() }}
        </div>
    </div>
</div>
<div class="modal fade" id="image-zoom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <img src="" alt="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i></button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('js/slider.js') }}"></script> 
@endsection
