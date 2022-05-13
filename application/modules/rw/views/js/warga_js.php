<script>
//Date picker
$('#reservationdate').datetimepicker({
        format: 'L'
    });
</script>
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

    

    function edit(id) {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('rw/warga/ajax_edit/') ?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                //console.log('edit', data);
                $('[name="id"]').val(data.id);
                $('[name="id_kk"]').val(data.id_kk);
                $('[name="nik"]').val(data.nik);
                $('[name="nama"]').val(data.nama);
                $('[name="tmpt_lahir"]').val(data.tmpt_lahir);
                $('[name="tgl_lahir"]').val(data.tgl_lahir);
                $('[name="alamat"]').val(data.alamat);
                $('[name="no_rt"]').val(data.no_rt);
                $('[name="no_telepon"]').val(data.no_telepon);
                $('[name="jk"]').val(data.jk);
                $('[name="id_agama"]').val(data.id_agama);
                $('[name="pekerjaan"]').val(data.pekerjaan);
                $('[name="id_pendidikan"]').val(data.id_pendidikan);
                $('[name="status_perkawinan"]').val(data.status_perkawinan);
                $('[name="kewarganegaraan"]').val(data.kewarganegaraan);
                $('[name="status_hidup"]').val(data.status_hidup);
                $('[name="status_keluarga"]').val(data.status_dalam_keluarga);
                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Data Warga'); // Set title to Bootstrap modal title

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

   



    
    var table;
    $(document).ready(function() {
        table = $('#table_warga').DataTable({
            responsive: true,
            //dom: 'Bfrtip',
            "searching": true,
            //"lengthChange": false,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            "select": true,
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('rw/warga/getPenduduk') ?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [-1], //last column
                "orderable": false, //set not orderable
            }, ],

        });
        //Date picker
        $('#reservationdate').datetimepicker({
                format: 'L'
            });
    });
</script>
<!-- JS KK -->