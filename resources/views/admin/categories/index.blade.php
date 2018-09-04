@php
    $pageInfo = [
        'title' => trans('admin.categories'),
        'breadcrumbs' => [
            ['text' => trans("admin.categories")]
        ]
    ]
@endphp

@extends('admin.layouts.dashboard', $pageInfo)
@section('admin.posts', 'active open')
@section('admin.categories.index', 'active open')

@section('content')
    <div class="row">
        <div class="col-xs-6 col-sm-4">
            <div class="portlet light bordered">
                <form method="post" action="{{ route('admin.categories.store') }}" class="form-horizontal"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body card-block">
                        <div class="has-success form-group">
                            <label for="name" class=" form-control-label">{{ trans('common.name') }}</label>
                            <input type="text" id="name" class="form-control" name="name" required>
                        </div>
                        <div class="has-warning form-group">
                            <label for="description" class=" form-control-label">{{ trans('common.description') }}</label>
                            <textarea type="text" id="description" class="form-control" name="description" cols="4"></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> {{ trans('common.add_new') }}
                        </button>
                        <button type="reset" class="btn btn-warning btn-sm">
                            <i class="fa fa-refresh"></i> {{ trans('common.cancel') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-xs-6 col-sm-8">
            <div class="portlet light bordered">
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-sm-offset-6">
                                {!! Form::open(['method' => 'GET', 'route' => 'admin.categories.index']) !!}
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
                    {{ Form::open(['route' => ['admin.categories.batch_destroy'], 'method' => 'delete', 'id' => 'form-patch']) }}

                    @if (! $categories->isEmpty())
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
                                    <th>{{ trans('common.name') }}</th>
                                    <th>{{ trans('common.slug') }}</th>
                                    <th>{{ trans('common.description') }}</th>
                                    <th>Count</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td class="text-center">
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                <input type="checkbox" class="checkboxes checkbox-id-{{ $category->id }}" name="ids[]" value="{{ $category->id }}">
                                                <span></span>
                                            </label>
                                        </td>
                                        <td><a href="{{ route('admin.categories.edit', $category->id) }}">{{ $category->name }}</a></td>
                                        <td>{{ $category->slug }}</td>
                                        <td>{{ $category->description }}</td>
                                        <td>{{ 1 }}</td>
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
                                {{ $categories->links() }}
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