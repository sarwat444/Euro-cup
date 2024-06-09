<script src="{{asset(config('constants.asset_path').'assets/panel/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset(config('constants.asset_path').'assets/panel/js/datatable/datatables/datatable.custom.js')}}"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<!-- JSZip for Excel export -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
<!-- DataTables Buttons HTML5 export JS -->
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>

<script>
    window.data_url = '{{route('panel.users.all.data')}}';
    window.columns = [
        { data: 'DT_RowIndex', name: 'DT_RowIndex' },
        { data: 'first_name', title: '{{__('First Name')}}', searchable: true, orderable: true },
        { data: 'last_name', title: '{{__('Last Name')}}', searchable: true, orderable: true },
        { data: 'mobile', title: '{{__('Phone')}}', searchable: true, orderable: true },
        { data: 'email', title: '{{__('email')}}', searchable: true, orderable: true },
        { data: 'pharmacy_name', title: '{{__('Pharmacy Name')}}', searchable: true, orderable: true },
        { data: 'government', title: '{{__('Government')}}', searchable: true, orderable: true },
        { data: 'gender', title: '{{__('gender')}}', searchable: true, orderable: true },
        { data: 'file', title: '{{__('File')}}', searchable: true, orderable: true },
        { data: 'created at', title: '{{__('created at')}}', searchable: true, orderable: true }
    ];
    window.search = "{{__('search')}}";
    window.rows = "{{__('rows')}}";
    window.all = "{{__('all')}}";
    window.excel = "{{__('excel')}}";
    window.pageLength = "{{__('pageLength')}}";

    $(document).ready(function() {
        $('#example').DataTable({
            processing: true,
            serverSide: true,
            ajax: window.data_url,
            columns: window.columns,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    text: window.excel,
                    titleAttr: window.excel
                }
            ],
            language: {
                search: window.search,
                lengthMenu: window.rows + " _MENU_ " + window.all,
                pageLength: window.pageLength
            }
        });
    });
</script>

