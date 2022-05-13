<!-- JS aspek -->
<script type="text/javascript">
    var save_method; //for save method string
    var table;


    function reload_table() {
        table.ajax.reload(null, false); //reload datatable ajax 
    }

    function refresh() {
        reload_table(); //reload datatable ajax 
    }

    function add() {
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('New Data Bobot'); // Set Title to Bootstrap modal title
    }


    function edit(id) {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('rt/bobot/ajax_edit/') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                //console.log('edit', data);
                $('[name="id"]').val(data.selisih);
                $('[name="selisih"]').val(data.selisih);
                $('[name="bobot"]').val(data.bobot);
                $('[name="keterangan"]').val(data.keterangan);
                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Data Bobot'); // Set title to Bootstrap modal title

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

    $('#form').submit(function(e) {
        //alert("Form submitted!");
        e.preventDefault();

        selisih = $('[name="selisih"]').val();
        bobot = $('[name="bobot"]').val();
        keterangan = $('[name="keterangan"]').val();
        if (selisih == "") {
            alert('Selisih belum di isi');
            return false;
        } else if (bobot == "") {
            alert('Bobot belum di isi');
            return false;
        }else if (keterangan == "") {
            alert('Keterangan belum di isi');
            return false;
        }else {
            $('#btnSave').text('saving...'); //change button text
            $('#btnSave').attr('disabled', true); //set button disable 
            var url;

            if (save_method == 'add') {
                url = "<?php echo site_url('rt/bobot/ajax_add') ?>";
            } else {
                url = "<?php echo site_url('rt/bobot/ajax_update') ?>";
            }
            // ajax adding data to database
            $.ajax({
                url: url,
                type: "POST",
                data: $('#form').serialize(),
                dataType: "JSON",
                success: function(data) {
                    if (data.status) //if success close modal and reload ajax table
                    {
                        $('#modal_form').modal('hide');
                        reload_table();
                    }
                    $('#btnSave').text('save'); //change button text
                    $('#btnSave').attr('disabled', false); //set button enable 
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data');
                    $('#btnSave').text('save'); //change button text
                    $('#btnSave').attr('disabled', false); //set button enable 
                }
            });
        }
    });




    function delete_data(id) {
        //console.log(id);
        if (confirm('Are you sure delete this data?')) {
            // ajax delete data to database
            $.ajax({
                url: "<?php echo site_url('rt/bobot/ajax_delete') ?>/" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    //if success reload ajax table
                    $('#modal_form').modal('hide');
                    reload_table();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error deleting data');
                }
            });

        }
    }
    var table;
    $(document).ready(function() {
        table = $('#table_bobot').DataTable({
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
                "url": "<?php echo site_url('rt/bobot/getBobot') ?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [-1], //last column
                "orderable": false, //set not orderable
            }, ],

        });
    });
</script>
<!-- JS aspek  -->







