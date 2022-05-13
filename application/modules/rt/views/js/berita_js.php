

<script type="text/javascript">

var save_method; //for save method string
var table;
var base_url = '<?php echo base_url();?>';
function reload_table() {
        table.ajax.reload(null, false); //reload datatable ajax 
    }
	
	function refresh() {
        reload_table(); //reload datatable ajax 
    }
   
$(document).ready(function() {
    //datatables
    table = $('#table_pengumuman').DataTable({
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
                "url": "<?php echo site_url('rt/berita/getBerita') ?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [-1], //last column
                "orderable": false, //set not orderable
            }, ],
            
        });
        $('#isi').summernote()
});

function reload_table() {
        table.ajax.reload(null, false); //reload datatable ajax 
    }
	
	function refresh() {
        reload_table(); //reload datatable ajax 
    }




function delete_person(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('rt/berita/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}



</script>
