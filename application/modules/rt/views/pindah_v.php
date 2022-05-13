<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Warga</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Data Warga</li>
            <li class="breadcrumb-item active">Warga Pindah</li>
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
                <!-- <button onclick="refresh()" class="btn btn-primary btn-sm btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-sync-alt"></i>
                  </span>
                  <span class="text">Refresh</span>
                </button> -->
              </div>
              <h4 class="card-title m-0 font-weight-bold text-primary">
                List Warga Pindah
              </h4>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="table_pindah" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>No Kartu Keluarga</th>
                      <th>Kepala Keluarga</th>
                      <th>Jumlah Keluarga</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>

                  <tbody class="text-center">
                  <tr>
                  <?php
                  $no = 1;
                  foreach($data as $d){
                    ?>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $d->no_kk ?></td>
                    <td><?php echo $d->kepala_keluarga ?></td>
                    <td><?php echo $d->jumlah_keluarga ?></td>
                    <td><a class="btn btn-xs btn-success" href="<?php echo base_url('rt')?>/warga/pindah_keluarga/<?php echo $d->id_kk?>"><i class="fa fa-search"></i> Lihat Keluarga</a></td>
                    <?php } ?>
                  </tr>
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
<!-- /.modal -->
<!-- End Bootstrap modal -->