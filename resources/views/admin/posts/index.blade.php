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
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Salary</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        {{--<input type="checkbox" class="checkboxes checkbox-id-{{ $staff->id }}" name="posts[]" value="1">--}}
                                        <input type="checkbox" class="checkboxes checkbox-id-1" name="posts[]" value="1">
                                    </td>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>$320,800</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkboxes checkbox-id-2" name="posts[]" value="2">
                                    </td>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkboxes checkbox-id-2" name="posts[]" value="2">
                                    </td>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkboxes checkbox-id-2" name="posts[]" value="2">
                                    </td>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkboxes checkbox-id-2" name="posts[]" value="2">
                                    </td>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkboxes checkbox-id-2" name="posts[]" value="2">
                                    </td>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkboxes checkbox-id-2" name="posts[]" value="2">
                                    </td>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkboxes checkbox-id-2" name="posts[]" value="2">
                                    </td>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkboxes checkbox-id-2" name="posts[]" value="2">
                                    </td>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkboxes checkbox-id-2" name="posts[]" value="2">
                                    </td>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkboxes checkbox-id-2" name="posts[]" value="2">
                                    </td>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkboxes checkbox-id-2" name="posts[]" value="2">
                                    </td>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkboxes checkbox-id-2" name="posts[]" value="2">
                                    </td>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkboxes checkbox-id-2" name="posts[]" value="2">
                                    </td>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkboxes checkbox-id-2" name="posts[]" value="2">
                                    </td>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkboxes checkbox-id-2" name="posts[]" value="2">
                                    </td>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkboxes checkbox-id-2" name="posts[]" value="2">
                                    </td>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkboxes checkbox-id-2" name="posts[]" value="2">
                                    </td>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkboxes checkbox-id-2" name="posts[]" value="2">
                                    </td>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkboxes checkbox-id-2" name="posts[]" value="2">
                                    </td>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkboxes checkbox-id-2" name="posts[]" value="2">
                                    </td>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkboxes checkbox-id-2" name="posts[]" value="2">
                                    </td>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkboxes checkbox-id-2" name="posts[]" value="2">
                                    </td>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkboxes checkbox-id-2" name="posts[]" value="2">
                                    </td>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkboxes checkbox-id-2" name="posts[]" value="2">
                                    </td>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkboxes checkbox-id-2" name="posts[]" value="2">
                                    </td>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkboxes checkbox-id-2" name="posts[]" value="2">
                                    </td>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkboxes checkbox-id-2" name="posts[]" value="2">
                                    </td>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkboxes checkbox-id-2" name="posts[]" value="2">
                                    </td>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>$170,750</td>
                                </tr>
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
