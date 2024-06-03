<script src="{{asset(config('constants.asset_path').'assets/panel/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset(config('constants.asset_path').'assets/panel/js/datatable/datatables/datatable.custom.js')}}"></script>
<script>

    window.data_url = '{{route('panel.questions.all.data')}}';
    window.columns = [{
        data: 'DT_RowIndex', name: 'DT_RowIndex'
    },
        {
            data: 'user',
            title: '{{__('user')}}',
            searchable: true,
            orderable: true
        },{
            data: 'category',
            title: '{{__('category')}}',
            searchable: true,
            orderable: true
        },{
            data: 'details',
            title: '{{__('details')}}',
            searchable: true,
            orderable: true
        },{
            data: 'created at',
            title: '{{__('created at')}}',
            searchable: true,
            orderable: true
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
