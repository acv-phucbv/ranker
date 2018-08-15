@extends('admin.dashboard')
@section('plugin_styles')
    <link href="{{ asset('assets/css/datatable/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/datatable/table.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="content mt-3" style="max-width: 700px">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form method="post" action="{{ route('admin.tags.store') }}" class="form-horizontal"  enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-header">
                                <strong>Edit Tag</strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="has-success form-group">
                                    <label for="name" class=" form-control-label">Name</label>
                                    <input type="text" id="name" class="form-control" name="name" value="{{ $tag->name }}" required>
                                </div>
                                <div class="has-warning form-group">
                                    <label for="description" class=" form-control-label">Description</label>
                                    <textarea type="text" id="description" class="form-control" name="description" cols="4">{{ $tag->description}}</textarea>
                                </div>
                                <div class="layout-message">@include('admin.partials.messages')</div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Update
                                </button>
                                <button type="reset" class="btn btn-warning btn-sm">
                                    <i class="fa fa-refresh"></i> Cancel
                                </button>
                                <a class="delete-item" href="{{ route('admin.tags.destroy', $tag->id) }}"
                                    data-method="delete" data-token="{{ csrf_token() }}" data-confirm="Are you sure delete?">
                                    <button type="button" class="btn btn-danger btn-sm">
                                        <i class="fa fa-ban"></i> Delete
                                    </button>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div>
@endsection
@section('page_plugin_scripts')
    <script src="{{ asset('assets/js/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/data-table/datatables-init.js') }}"></script>
@endsection

@section('inline_scripts')
    @include('admin.partials.button_delete')
@endsection