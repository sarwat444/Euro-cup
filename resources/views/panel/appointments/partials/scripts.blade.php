<script src="{{asset(config('constants.asset_path').'assets/panel/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset(config('constants.asset_path').'assets/panel/js/datatable/datatables/datatable.custom.js')}}"></script>
<script>

    window.data_url = '{{route('panel.appointments.all.data')}}';
    window.columns = [{
        data: 'DT_RowIndex', name: 'DT_RowIndex'
    },
        {
            data: 'patient',
            title: '{{__('patient')}}',
            searchable: true,
            orderable: true
        },{
            data: 'doctor',
            title: '{{__('doctor')}}',
            searchable: true,
            orderable: true
        },{
            data: 'specialize',
            title: '{{__('specialize')}}',
            searchable: true,
            orderable: true
        },{
            data: 'urgent',
            title: '{{__('urgent')}}',
            searchable: true,
            orderable: true
        },{
            data: 'created at',
            title: '{{__('created at')}}',
            searchable: true,
            orderable: true
        },{
            data: 'appointment_status',
            title: '{{__('appointment_status')}}',
            searchable: true,
            orderable: true
        },
        {
         //   data: 'is_published',
            title: '{{__('create_meeting')}}',
            selector: false,
            data: function (data) {

                return '<button id="create_meeting" type="button" class="btn btn-primary switch-btn" data-id="' + data.id + '">' +
                        'Create Meeting </button>' ;
            },
        },{
            data: 'active',
            title: '{{__('Cancel')}}',
            orderable: false
        },{
            data: 'action',
            title: '{{__('action')}}',
            orderable: false
        }];
    window.search = "{{__('search')}}";
    window.rows = "{{__('rows')}}";
    window.all = "{{__('all')}}";
    window.excel = "{{__('excel')}}";
    window.pageLength = "{{__('pageLength')}}";

</script>


<script>

    $(document).on('click', '#create_meeting', function () {

        var item_id = $(this).data('id');
        var csrfToken = "{{ csrf_token() }}";
        $.ajax({
            url: "{{route('panel.appointments.meeting.create')}}?id=" + item_id,
            method: "post",
            data: {id: item_id ,  _token: csrfToken},
            success: function (e) {
                if (e.status) {
                   /* Swal.fire({
                        title: '{{__('message_done')}}',
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    })*/
                    alert('Done Suceefully');
                }
            }
        });

    });

</script>
