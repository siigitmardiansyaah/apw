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
            <li class="breadcrumb-item active">Warga Tetap</li>
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
                List Warga
              </h4>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="table_warga" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>No Kartu Keluarga</th>
                      <th>NIK</th>
                      <th>Nama</th>
                      <th>Tempat, Tanggal Lahir</th>
                      <th>Alamat</th>
                      <th>RT</th>
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
<div id="modal_form" class="modal fade bd-example-modal-lg" role="dialog">
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
                                    <label>No Kartu Keluarga</label>
                                    <select name="id_kk" id="id_kk" class="form-control">
                                    <option value="">Pilih Kartu Keluarga</option>
                                    <?php foreach($kk as $k){ ?>
                                    <option value="<?php echo $k['id_kk']?>"><?php echo $k['no_kk']?>_<?php echo $k['kepala_keluarga']?></option>
                                    <?php } ?>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input name="nik" id="nik" placeholder="NIK" class="form-control" type="numeric">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input name="nama" id="nama" placeholder="Nama" class="form-control" type="text">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input name="tmpt_lahir" id="tmpt_lahir" placeholder="Tempat" class="form-control" type="text">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                      <input type="text" name="tgl_lahir" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                      <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control" placeholder="Alamat"></textarea>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>RT</label>
                                    <input type="number" name="no_rt" id="no_rt" class="form-control" placeholder="RT">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>No Telepon</label>
                                    <input type="text" name="no_telepon" id="no_telepon" class="form-control" placeholder="No Telepon">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="jk" id="jk" class="form-control">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Lelaki">Laki - Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                    </select>                                    
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Agama</label>
                                    <select name="id_agama" id="id_agama" class="form-control">
                                    <option value="">Pilih Agama</option>
                                    <?php foreach($agama as $a){ ?>
                                    <option value="<?php echo $a['id_agama']?>"><?php echo $a['agama']?></option>
                                    <?php } ?>
                                    </select>                                    
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Pekerjaaan</label>
                                    <input name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" class="form-control" type="text">                             
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Pendidikan</label>
                                    <select name="id_pendidikan" id="id_pendidikan" class="form-control">
                                    <option value="">Pilih Pendidikan</option>
                                    <?php foreach($pendidikan as $pen){ ?>
                                    <option value="<?php echo $pen['id_pendidikan']?>"><?php echo $pen['nama_pendidikan']?></option>
                                    <?php } ?>
                                    </select>                                    
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Status Perkawinan</label>
                                    <select name="status_perkawinan" id="status_perkawinan" class="form-control">
                                    <option value="">Pilih Status Perkawinan</option>
                                    <option value="1">Belum Menikah</option>
                                    <option value="2">Menikah</option>
                                    <option value="3">Cerai Hidup</option>
                                    <option value="4">Cerai Mati</option>
                                    </select>                                    
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Kewarganegaraan</label>
                                    <select name="kewarganegaraan" id="kewarganegaraan" class="form-control">
                                    <option value="">Pilih Status Kewarganegaraan</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Asing">Asing</option>
                                    </select>                                    
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Status Kehidupan</label>
                                    <select name="status_hidup" id="status_hidup" class="form-control">
                                    <option value="">Pilih Status</option>
                                    <option value="Hidup">Hidup</option>
                                    <option value="Meninggal">Meninggal</option>
                                    </select>                                    
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Status Dalam Keluarga</label>
                                    <select name="status_keluarga" id="status_keluarga" class="form-control">
                                    <option value="">Pilih Status</option>
                                    <option value="Ayah/Suami">Ayah / Suami</option>
                                    <option value="Ibu/Istri">Ibu / Istri</option>
                                    <option value="Anak">Anak</option>
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