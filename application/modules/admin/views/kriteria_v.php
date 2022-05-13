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
            <li class="breadcrumb-item">SPK</li>
            <li class="breadcrumb-item active">Kriteria</li>
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
                List Kriteria
              </h4>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="table_kriteria" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>Aspek</th>
                      <th>Kriteria</th>
                      <th>Target Nilai</th>
                      <th>Type</th>
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Aspek <span style="color:red"> *</span></label>
                                    <select name="id_aspek" id="id_aspek" class="form-control" required>
                                    <option value="">Pilih Aspek</option>
                                    <?php foreach($aspek as $k){ ?>
                                    <option value="<?php echo $k['id_aspek']?>"><?php echo $k['aspek']?></option>
                                    <?php } ?>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                <label>Kriteria <span style="color:red"> *</span></label>
                                    <input name="faktor" id="faktor" placeholder="Nama Kriteria" class="form-control" type="text" required>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                <label>Target Nilai <span style="color:red"> *</span></label>
                                <select name="target" id="target" class="form-control" required>
                                    <option value="">Pilih Target Nilai Kriteria</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    </select>                                    
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                <label>Type Kriteria <span style="color:red"> *</span></label>
                                    <select name="type" id="type" class="form-control" required>
                                    <option value="">Pilih Type Kriteria</option>
                                    <option value="core">Core</option>
                                    <option value="secondary">Secondary</option>
                                    </select>
                                    <span class="help-block"></span>
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