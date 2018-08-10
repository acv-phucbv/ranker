@extends('admin.dashboard')
@section('plugin_styles')
    <link href="{{ asset('assets/css/datatable/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/datatable/table.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="content mt-3">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Users</h1>
            </div>
        </div>
    </div>
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
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Posts</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="checkboxes checkbox-id-{{ $user->id }}" name="users[]" value="{{ $user->id }}">
                                        </td>
                                        <td>{{ $user->profile->fullname }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ \App\Models\User::roles()[$user->role] }}</td>
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
