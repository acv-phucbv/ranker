@php
    $pageInfo = [
        'title' => trans('admin.posts.post_menu'),
        'breadcrumbs' => [
            ['text' => trans("admin.posts.post_menu")]
        ]
    ]
@endphp

@extends('admin.layouts.dashboard', $pageInfo)
@section('admin.posts', 'active open')
@section('admin.posts.index', 'active open')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="portlet light bordered">
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <a href="{{ route('admin.posts.create') }}" class="btn green"> {{ trans('common.add_new') }}
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                {!! Form::open(['method' => 'GET', 'route' => 'admin.posts.index']) !!}
                                <div class="input-group">
                                    {{ Form::text('search', $request->search, ['class' => 'form-control']) }}
                                    <span class="input-group-btn">
                                        {{ Form::submit(trans('common.search'), ['class' => 'btn blue uppercase bold']) }}
                                     </span>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    {{ Form::open(['route' => ['admin.posts.batch_destroy'], 'method' => 'delete', 'id' => 'form-patch']) }}

                    @if (! $posts->isEmpty())
                        <div class="table-scrollable">
                            <table class="table table-hover">
                                <thead>
                                <tr role="row">
                                    @php $search = $request->search ? "&search={$request->search}" : '' @endphp
                                    <th width="50px" class="text-center check-column">
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" id="group-checkable" value="1" data-item=".checkboxes">
                                            <span></span>
                                        </label>
                                    </th>
                                    <th>{{ trans('common.title') }}</th>
                                    <th>{{ trans('common.author') }}</th>
                                    <th>{{ trans('common.status') }}</th>
                                    <th>{{ trans('admin.category') }}</th>
                                    <th>{{ trans('admin.tags') }}</th>
                                    <th>{{ trans('common.created_at') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td class="text-center">
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                <input type="checkbox" class="checkboxes checkbox-id-{{ $post->id }}" name="ids[]" value="{{ $post->id }}">
                                                <span></span>
                                            </label>
                                        </td>
                                        <td><a href="{{ route('admin.posts.edit', $post) }}">{{ $post->title }}</a></td>
                                        <td>{{ $post->author->username }}</td>
                                        <td>{{ \App\Helpers\Helper::get_public()[$post->status] }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>{{ explode(', ', $post->tags_id) }}</td>
                                        <td>{{ $post->created_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row" style="min-height: 35px;">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="input-group {{ $errors->has('ids') ? 'has-error' : '' }}">
                                        <span class="input-group-btn">
                                            <button class="btn btn-danger btn-patch-delete" type="submit">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;&nbsp;{{ trans('common.delete') }}
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{ Form::close() }}

                        <div class="row">
                            <div class="col-xs-12 text-right">
                                {{ $posts->links() }}
                            </div>
                        </div>

                    @else
                        <div class="note note-danger">
                            <p>{{ trans('common.no_query_results') }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @include('admin.layouts.partials.modal_message')
    @include('admin.layouts.partials.modal_confirm')
    @include('admin.layouts.partials.form_multiple_checkbox')
@endsection

@section('page_scripts')
    @include('admin.layouts.partials.button_delete')
@endsection