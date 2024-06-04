<script>
    $(document).on('change', '.active_status', function () {

        let url = "{{route('panel.votes.changeStatus',':id')}}";
        url = url.replace(':id', this.id);
        $.ajax({
            url: url,
            method: 'GET',
            data: {},
            success: function (response) {

            },
            error: function (response) {

            }
        });
    });
</script>
