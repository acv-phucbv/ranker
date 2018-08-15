@section('inline_scripts')
<script type="text/javascript">
    $(".delete-row").click(function(e){
        e.preventDefault();
        var route = $(this).data('route');
        var row = $(this).parents('tr');
        bootbox.confirm({
            title : '{{ trans('common.confirm') }}',
            message : "{{ $message ?? trans('common.delete_row_confirm') }}",
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
            callback : function (result) {
                if(result){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    });
                    $.ajax({
                        url: route,
                        type: 'DELETE', // replaced from put
                        dataType: "JSON",
                        success: function (response)
                        {
                            if(response.success != ''){
                                $('.layout-message').html('<div class="alert alert-success">\n' +
                                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
                                    '<span aria-hidden="true">&times;</span>\n' +
                                    '</button>\n' +
                                    response.success +
                                    '</div>');
                                row.slideUp('slow', function(){ row.remove(); });
                            }else if(response.error != ''){
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
