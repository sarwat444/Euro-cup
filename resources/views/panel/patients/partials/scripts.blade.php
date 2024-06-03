<script src="{{asset(config('constants.asset_path').'assets/panel/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset(config('constants.asset_path').'assets/panel/js/datatable/datatables/datatable.custom.js')}}"></script>
<script>

    window.data_url = '{{route('panel.patients.all.data')}}';
    window.columns = [
        {
            data: 'DT_RowIndex', name: 'DT_RowIndex'
        },{
            data: 'name',
            title: '{{__('name')}}',
            searchable: true,
            orderable: true
        },{
            data: 'email',
            title: '{{__('email')}}',
            searchable: true,
            orderable: true
        },{
            data: 'gender',
            title: '{{__('gender')}}',
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
        }
    ];
    window.search = "{{__('search')}}";
    window.rows = "{{__('rows')}}";
    window.all = "{{__('all')}}";
    window.excel = "{{__('excel')}}";
    window.pageLength = "{{__('pageLength')}}";

</script>
