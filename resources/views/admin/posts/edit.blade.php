@php
    $pageInfo = [
        'title' => trans('admin.posts.create_post'),
        'breadcrumbs' => [
            ['text' => trans("admin.posts.create_post")]
        ]
    ]
@endphp

@extends('admin.layouts.dashboard', $pageInfo)
@section('admin.posts', 'active open')
@section('admin.posts.index', 'active open')

@section('page_styles')
    <link href="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="row">
        {!! Form::open(['route' => ['admin.posts.update', $post->id], 'class' => 'form-horizontal', 'method' => 'post', 'files' => true]) !!}
        <div class="col-xs-12 col-sm-10">
            <div class="portlet light bordered">
                <div class="portlet-body form">

                    <div class="form-group">
                        {{ Form::text('title', $post->title, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::textarea('content', $post->content, ['id' => 'post_content', 'class'=>'ckeditor form-control', 'rows' => 10, 'data-error-container' => '#editor2_error']) }}
                        <div id="editor2_error"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-2">
            <div class="portlet light bordered">
                <div class="form-group">
                    <label class="mt-radio">
                        {{ Form::radio('status', '1', $post->status == 1 ?? true, ['status' => '']) }}
                        {{trans("common.public")}}
                        <span></span>
                    </label>
                    <label class="mt-radio">
                        {{ Form::radio('status', '0', $post->status == 0 ?? true, ['status' => '']) }}
                        {{trans("common.unpublic")}}
                        <span></span>
                    </label>
                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            {{ Form::submit('Save', ['class' => 'btn green']) }}
                            {{ Form::reset('Reset', ['class' => 'btn default']) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="portlet light bordered">
                <div class="form-group">
                    <label>Category:</label>
                    {{ Form::select('category_id', $categories, $post->category_id, ['class' => 'form-control', 'placeholder' => 'Pick a category...']) }}
                </div>
            </div>
            <div class="portlet light bordered">
                <div class="form-group">
                    <label>Tag:</label>
                    {{ Form::select('tags_id[]', $tags, $postTags, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) }}
                </div>
            </div>
            <div class="portlet light bordered">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                         style="width: 200px; height: 150px; line-height: 150px;">
                        @if($post->feature_image)
                            <img src="{{ asset('uploads/images/' . Carbon\Carbon::parse($post->created_at)->format('Y/m/d') . '/' . $post->feature_image) }}">
                        @endif
                    </div>
                    <div>
                        <span class="btn red btn-outline btn-file">
                        <span class="fileinput-new"> Select image </span>
                        <span class="fileinput-exists"> Change </span>
                        <input type="hidden"><input type="file" name="feature_image"> </span>
                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    @include('admin.layouts.partials.button_delete')
@endsection

@section('page_plugin_scripts')
    <script src="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
@endsection

@section('inline_scripts')
    <script>
        CKEDITOR.replace('post_content', {
            height: 400,
            language: 'vi'
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#tag_list').select2({
                placeholder: 'Tags',
                tags: true
            });
        });
    </script>
@endsection