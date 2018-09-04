@section('page_scripts')
    <script type="text/javascript">
        $(".duplicate-row").click(function (e) {
            e.preventDefault();
            var route = $(this).data('route');
            var row = $(this).parents('tr');
            bootbox.confirm({
                title: '{{ trans('common.confirm') }}',
                message: "{{ $message ?? trans('common.duplicate_row_confirm') }}",
                buttons: {
                    cancel: {
                        label: '<i class="fa fa-times"></i> {{ trans('common.close') }}',
                        className: 'dark btn-outline'
                    },
                    confirm: {
                        label: '<i class="fa fa-check"></i> {{ trans('common.i_agree') }}',
                        className: 'red btn-outline'
                    }
                },
                callback: function (result) {
                    if (result) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        });
                        $.ajax({
                            url: route,
                            type: 'POST', // replaced from put
                            dataType: "JSON",
                            success: function (response) {
                                if (response.success) {
                                    location.reload();
                                } else if (response.error) {
                                    $('.layout-message').append('<div class="alert alert-danger">\n' +
                                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
                                        '<span aria-hidden="true">&times;</span>\n' +
                                        '</button>\n' +
                                        response.error +
                                        '</div>');
                                }
                            }
                        });
                    }
                }

            });
        });
    </script>
    @parent
@endsection
