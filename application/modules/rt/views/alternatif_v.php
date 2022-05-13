<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Sistem Pendukung Keputusan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">SPK </li>
            <li class="breadcrumb-item active">Alternatif</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->

      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="card">
            <div class="card-header">
              <div class="float-right">
                <button onclick="add()" class="btn btn-info btn-sm btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                  </span>
                  <span class="text">Tambah Data</span>
                </button>
                <button onclick="refresh()" class="btn btn-primary btn-sm btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-sync-alt"></i>
                  </span>
                  <span class="text">Refresh</span>
                </button>
              </div>
              <h4 class="card-title m-0 font-weight-bold text-primary">
                List Alternatif
              </h4>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="table_alternatif" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>Kode Alternatif</th>
                      <th>Nama</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>

                  <tbody class="text-center">
                  </tbody>
                </table>
              </div>
            </div><!-- /.card-body -->
          </div>

          <!-- /.card -->

          <!-- Modal -->
          
          <!-- Modal -->
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->

        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- Bootstrap modal -->
<div id="modal_form" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
			<form id="form">
            <div class="modal-body">
                    <input type="hidden" value="" name="id" />
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kode Alternatif</label>
                                    <input name="kd_alternatif" id="kd_alternatif" placeholder="Kode Alternatif" class="form-control" type="text">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Penduduk</label>
                                <select name="id_penduduk" id="id_penduduk" class="form-control">
                                    <option value="">Pilih Penduduk</option>
                                    <?php foreach($warga as $k){ ?>
                                    <option value="<?php echo $k['id']?>"><?php echo $k['nama']?></option>
                                    <?php } ?>
                                    </select>                                           <span class="help-block"></span>
                                </div>
                            </div>
                           
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="btnSave" class="btn btn-primary">
                <i class="fas fa-paper-plane"></i>                             Save
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">
                <i class="fas fa-times"></i>                    Close
                </button>
            </div>
			</form>
        </div>

    </div>
</div>
<!-- /.modal -->
<!-- End Bootstrap modal -->