<script src="{{asset(config('constants.asset_path').'assets/panel/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset(config('constants.asset_path').'assets/panel/js/datatable/datatables/datatable.custom.js')}}"></script>
<script>

    window.data_url = '{{route('panel.contact_us.all.data')}}';
    window.columns = [{
        data: 'DT_RowIndex', name: 'DT_RowIndex'
    },

        {
            data: 'mobile',
            title: '{{__('mobile')}}',
        },{
            data: 'email',
            title: '{{__('email')}}',
        },{
            data: 'subject',
            title: '{{__('subject')}}',
        },{
            data: 'message',
            title: '{{__('message')}}',
        },{
            data: 'created at',
            title: '{{__('created at')}}',
        }
    ];
    window.search = "{{__('search')}}";
    window.rows = "{{__('rows')}}";
    window.all = "{{__('all')}}";
    window.excel = "{{__('excel')}}";
    window.pageLength = "{{__('pageLength')}}";

</script>
