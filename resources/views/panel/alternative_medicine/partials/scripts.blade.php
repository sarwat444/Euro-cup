<script src="{{asset(config('constants.asset_path').'assets/panel/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset(config('constants.asset_path').'assets/panel/js/datatable/datatables/datatable.custom.js')}}"></script>
<script>

    window.data_url = '{{route('panel.alternative_medicine.all.data')}}';
    window.columns = [{
        data: 'DT_RowIndex', name: 'DT_RowIndex'
    },

        {
            data: 'user',
            title: '{{__('user')}}',
        },

        {
            data: 'doctor',
            title: '{{__('doctor')}}',
        },

        {
            title: '{{__('status')}}',
            data: function (row) {
                var status = {
                    'pending': {
                        'title': '{{__('pending')}}',
                        'class': 'badge bg-dark',
                    },

                    'completed': {
                        'title': '{{__('completed')}}',
                        'class': 'badge bg-success',
                    },
                    'cancelled': {
                        'title': '{{__('cancelled')}}',
                        'class': 'badge bg-danger',
                    }
                };
                return '<span class="label font-weight-bold label-lg ' + status[row.status].class + ' label-inline">' + status[row.status].title + '</span>';
            }
        },

        {
            title: '{{__('payment_status')}}',
            data: function (row) {
                var payment_status = {
                    'pending': {
                        'title': '{{__('pending')}}',
                        'class': 'badge bg-dark',
                    },

                    'paid': {
                        'title': '{{__('paid')}}',
                        'class': 'badge bg-success',
                    },
                    'cancelled': {
                        'title': '{{__('cancelled')}}',
                        'class': 'badge bg-danger',
                    }
                };
                return '<span class="label font-weight-bold label-lg ' + payment_status[row.payment_status].class + ' label-inline">' + payment_status[row.payment_status].title + '</span>';
            }
        },

        {
            data: 'payment_amount',
            title: '{{__('payment_amount')}}',
        },

    ];
    window.search = "{{__('search')}}";
    window.rows = "{{__('rows')}}";
    window.all = "{{__('all')}}";
    window.excel = "{{__('excel')}}";
    window.pageLength = "{{__('pageLength')}}";

</script>
