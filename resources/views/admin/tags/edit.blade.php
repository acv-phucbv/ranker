@php
    $pageInfo = [
        'title' => trans('common.edit'),
        'breadcrumbs' => [
            ['text' => trans('admin.tags')]
        ]
    ]
@endphp

@extends('admin.layouts.dashboard', $pageInfo)
@section('admin.posts', 'active open')
@section('admin.tags.index', 'active open')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <div class="portlet light bordered">
                <form method="post" action="{{ route('admin.tags.update', $tag->id) }}" class="form-horizontal"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body card-block">
                        <div class="has-success form-group">
                            <label for="name" class=" form-control-label">Name</label>
                            <input type="text" id="name" class="form-control" name="name" value="{{ $tag->name }}" required>
                        </div>
                        <div class="has-warning form-group">
                            <label for="description" class=" form-control-label">Description</label>
                            <textarea type="text" id="description" class="form-control" name="description" cols="4">{{ $tag->description}}</textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Update
                        </button>
                        <button type="reset" class="btn btn-warning btn-sm">
                            <i class="fa fa-refresh"></i> Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('admin.layouts.partials.button_delete')
@endsection
