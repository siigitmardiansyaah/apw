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
                <!-- <button onclick="add()" class="btn btn-info btn-sm btn-icon-split">
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
                </button> -->
              </div>
              <h4 class="card-title m-0 font-weight-bold text-primary">
                List Warga
              </h4>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="table_pindah_keluarga" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>NIK</th>
                      <th>Nama</th>
                      <th>Tempat, Tanggal Lahir</th>
                      <th>Alamat</th>
                      <th>Jenis Kelamin</th>
                      <th>Pekerjaan</th>
                      <th>Pendidikan</th>
                      <th>Agama</th>
                      <th>Status Perkawinan</th>
                      <th>Kewarganegaraan</th>
                      <th>Status Dalam Keluarga</th>
                    </tr>
                  </thead>

                  <tbody class="text-center">
                  <tr>
                  <?php
                  $no = 1;
                  foreach($data as $d){
                    ?>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $d->nik ?></td>
                    <td><?php echo $d->nama ?></td>
                    <td><?php echo $d->tmpt_lahir .' , '.date('d M Y', strtotime($d->tgl_lahir)) ?> </td>
                    <td><?php echo $d->alamat?></td>
                    <td><?php echo $d->jk?></td>
                    <td><?php echo $d->pekerjaan?></td>
                    <td><?php echo $d->nama_pendidikan?></td>
                    <td><?php echo $d->agama?></td>
                    <td><?php if($d->status_perkawinan == 1)
                    {
                      echo 'Belum Kawin';
                    }else if($d->status_perkawinan == 2)
                    {
                      echo 'Kawin';
                    }else if($d->status_perkawinan == 3)
                    {
                      echo 'Cerai Hidup';
                    } else if($d->status_perkawinan == 4)
                    {
                      echo 'Cerai Mati';
                    }?></td>
                    <td><?php echo $d->kewarganegaraan?></td>
                    <td><?php echo $d->status_dalam_keluarga?></td>
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