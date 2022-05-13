<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Dashboard </li>
            <li class="breadcrumb-item active">Berita</li>
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
                <a href="<?php echo base_url('rw')?>/berita/tambah_berita" class="btn btn-info btn-sm btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                  </span>
                  <span class="text">Tambah Data</span>
                </a>
                <button onclick="refresh()" class="btn btn-primary btn-sm btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-sync-alt"></i>
                  </span>
                  <span class="text">Refresh</span>
                </button>
              </div>
              <h4 class="card-title m-0 font-weight-bold text-primary">
                List Berita
              </h4>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="table_pengumuman" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>Judul</th>
                      <th>Isi</th>
                      <th>Tanggal</th>
                      <th>Pembuat</th>
                      <th>Publish</th>
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
<!-- /.modal -->
<!-- End Bootstrap modal -->