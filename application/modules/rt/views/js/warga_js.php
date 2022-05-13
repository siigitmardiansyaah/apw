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

    function add() {
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('New Data Penduduk'); // Set Title to Bootstrap modal title
    }

    function edit(id) {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('rt/warga/ajax_edit/') ?>" + id,
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
                $('.modal-title').text('Edit Data Warga'); // Set title to Bootstrap modal title

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

    $('#form').submit(function(e) {
        //alert("Form submitted!");
        e.preventDefault();

        id_kk = $('[name="id_kk"]').val();
        nik = $('[name="nik"]').val();
        nama = $('[name="nama"]').val();
        tmpt_lahir = $('[name="tmpt_lahir"]').val();
        tgl_lahir = $('[name="tgl_lahir"]').val();
        alamat = $('[name="alamat"]').val();
        no_rt = $('[name="no_rt"]').val();
        no_telepon = $('[name="no_telepon"]').val();
        jk = $('[name="jk"]').val();
        id_agama = $('[name="id_agama"]').val();
        pekerjaan = $('[name="pekerjaan"]').val();
        id_pendidikan = $('[name="id_pendidikan"]').val();
        status_perkawinan = $('[name="status_perkawinan"]').val();
        kewarganegaraan = $('[name="kewarganegaraan"]').val();
        status_hidup = $('[name="status_hidup"]').val();
        status_keluarga = $('[name="status_keluarga"]').val();
        if(id_kk == "")
        {
            alert('Kepala Keluarga belum di dipilih');
            return false; 
        }else if (nik == "") {
            alert('NIK belum di isi');
            return false;
        }else if (nama == "") {
            alert('Nama belum di isi');
            return false;
        }else if (tmpt_lahir == "") {
            alert('Tempat Lahir belum di isi');
            return false;
        }else if (tgl_lahir == "") {
            alert('Tanggal Lahir di isi');
            return false;
        }else if (status_keluarga == "") {
            alert('Status dalam keluarga belum di dipilih');
            return false;
        }else if (jk == "") {
            alert('Jenis Kelamin belum dipilih');
            return false;
        }else if (no_telepon == "") {
            alert('No Telepon belum di isi');
            return false;
        }else if (alamat == "") {
            alert('Alamat belum di isi');
            return false;
        }else if (id_agama == "") {
            alert('Agama belum dipilih');
            return false;
        }else if (pekerjaan == "") {
            alert('Pekerjaan belum di pilih');
            return false;
        }else if (id_pendidikan == "") {
            alert('Pendidikan belum dipilih');
            return false;
        }else if (no_rt == "") {
            alert('No RT belum di pilih');
            return false;
        }else if (status_perkawinan == "") {
            alert('Status Perkawinan belum di pilih');
            return false;
        } else if (kewarganegaraan == "") {
            alert('Kewarganegaraan belum di pilih');
            return false;
        }else if (status_hidup == "") {
            alert('Status Hidup belum di pilih');
            return false;
        }else {
            $('#btnSave').text('saving...'); //change button text
            $('#btnSave').attr('disabled', true); //set button disable 
            var url;

            if (save_method == 'add') {
                url = "<?php echo site_url('rt/warga/ajax_add') ?>";
            } else {
                url = "<?php echo site_url('rt/warga/ajax_update') ?>";
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
                url: "<?php echo site_url('rt/warga/ajax_delete') ?>/" + id,
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
                "url": "<?php echo site_url('rt/warga/getPenduduk') ?>",
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