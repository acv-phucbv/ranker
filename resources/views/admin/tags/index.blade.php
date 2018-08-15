@extends('admin.dashboard')
@section('plugin_styles')
    <link href="{{ asset('assets/css/datatable/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/datatable/table.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th class="check-column">
                                        <input type="checkbox" id="group-checkable" value="1" data-item=".checkboxes">
                                    </th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Categories</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <td>
                                        <input type="checkbox" class="checkboxes checkbox-id-{{ $post->id }}" name="posts[]" value="{{ $post->id }}">
                                    </td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->author->profile->fullname }}</td>
                                    <td>{{ $post->category->name }}</td>
                                    <td>{{ tag }}</td>
                                    <td>{{ comments }}</td>
                                    <td>{{ $post->created_at }}</td>
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
