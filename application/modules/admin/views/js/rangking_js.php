<!-- JS KK -->
<script type="text/javascript">
    var save_method; //for save method string
    var table;


    function reload_table() {
        table.ajax.reload(null, false); //reload datatable ajax 
    }

    function refresh() {
        reload_table(); //reload datatable ajax 
    }

    $(document).ready(function() {
        $('#table_pindah').DataTable();
        $('#table_pindah_keluarga').DataTable();
    });
</script>
<!-- JS KK -->