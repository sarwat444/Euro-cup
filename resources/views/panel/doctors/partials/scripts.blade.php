<script src="{{asset(config('constants.asset_path').'assets/panel/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset(config('constants.asset_path').'assets/panel/js/datatable/datatables/datatable.custom.js')}}"></script>
<script>

    window.data_url = '{{route('panel.doctors.all.data')}}';
    window.columns = [
        {
            data: 'DT_RowIndex', name: 'DT_RowIndex'
        }
        ,{
            data: 'image',
            title: '{{__('image')}}',
            searchable: true,
            orderable: true
        },{
            data: 'name',
            title: '{{__('name')}}',
            searchable: true,
            orderable: true
        },{
            data: 'specialize',
            title: '{{__('specialize')}}',
            searchable: true,
            orderable: true
        },{
            data: 'min price',
            title: '{{__('min price')}}',
            searchable: true,
            orderable: true
        },{
            data: 'max price',
            title: '{{__('max price')}}',
            searchable: true,
            orderable: true
        },{
            data: 'gender',
            title: '{{__('gender')}}',
            searchable: true,
            orderable: true
        },
        {
        data: 'active',
            title: '{{__('active')}}',
            orderable: false
        },
        {
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
