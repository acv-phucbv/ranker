@extends('admin.dashboard')
@section('plugin_styles')
    <link href="{{ asset('assets/css/datatable/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/datatable/table.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-xs-6 col-sm-4">
                    <div class="card">
                        <form method="post" action="{{ route('admin.tags.store') }}" class="form-horizontal"  enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-header">
                                <strong>Add New Tag</strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="has-success form-group">
                                    <label for="name" class=" form-control-label">Name</label>
                                    <input type="text" id="name" class="form-control" name="name" required>
                                </div>
                                <div class="has-warning form-group">
                                    <label for="description" class=" form-control-label">Description</label>
                                    <textarea type="text" id="description" class="form-control" name="description" cols="4"></textarea>
                                </div>
                                <div class="layout-message">@include('admin.partials.messages')</div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Add New Tag
                                </button>
                                <button type="reset" class="btn btn-warning btn-sm">
                                    <i class="fa fa-refresh"></i> Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-xs-6 col-sm-8">
                    <div class="card">
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th class="check-column">
                                        <input type="checkbox" id="group-checkable" value="1" data-item=".checkboxes">
                                    </th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Slug</th>
                                    <th>Count</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tags as $tag)
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="checkboxes checkbox-id-{{ $tag->id }}" name="users[]" value="{{ $tag->id }}">
                                        </td>
                                        <td><a href="{{ route('admin.tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
                                        <td>{{ $tag->description }}</td>
                                        <td>{{ $tag->slug }}</td>
                                        <td>{{ 1 }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div>
    @include('admin.partials.form_multiple_checkbox')
@endsection
@section('page_plugin_scripts')
    <script src="{{ asset('assets/js/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/data-table/datatables-init.js') }}"></script>
@endsection