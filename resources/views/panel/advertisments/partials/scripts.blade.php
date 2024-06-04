<script
    src="{{ asset(config('constants.asset_path') . 'assets/panel/js/datatable/datatables/jquery.dataTables.min.js') }}">
</script>
<script src="{{ asset(config('constants.asset_path') . 'assets/panel/js/datatable/datatables/datatable.custom.js') }}">
</script>
<script>
    window.data_url = '{{ route('panel.advertisments.all.data') }}';
    window.columns = [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
        },
        {
            data: 'title',
            title: '{{ __('title') }}',
            searchable: true,
            orderable: true
        },
        {
            data: 'image',
            title: '{{ __('Image') }}',
        },

        {
            data: 'action',
            title: '{{ __('action') }}',
            orderable: false
        }
    ];
    window.search = "{{ __('search') }}";
    window.rows = "{{ __('rows') }}";
    window.all = "{{ __('all') }}";
    window.excel = "{{ __('excel') }}";
    window.pageLength = "{{ __('pageLength') }}";
</script>