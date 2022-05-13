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
            <li class="breadcrumb-item active">Sample</li>
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
                <button type="button" class="btn btn-success btn-sm btn-icon-split" data-toggle="modal" data-target=".bd-example-modal-lg">
                <span class="icon text-white-50">
                    <i class="fas fa-edit"></i>
                  </span>
                  <span class="text">Petunjuk Pengisian</span> 
                  </button>
              </div>
              <h4 class="card-title m-0 font-weight-bold text-primary">
                List Sample
              </h4>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="table_sample" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>Nama</th>
                      <th>Faktor</th>
                      <th>Value</th>
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
                                    <label>Penduduk <span style="color:red"> *</span></label>
                                    <select name="id_penduduk" id="id_penduduk" class="form-control" required>
                                    <option value="">Pilih Penduduk</option>
                                    <?php foreach($warga as $k){ ?>
                                    <option value="<?php echo $k['id_alternatif']?>"><?php echo $k['nama']?></option>
                                    <?php } ?>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                <label>Faktor <span style="color:red"> *</span></label>
                                <select name="id_faktor" id="id_faktor" class="form-control" required>
                                    <option value="">Pilih Faktor</option>
                                    <?php foreach($kriteria as $k){ ?>
                                    <option value="<?php echo $k['id_faktor']?>"><?php echo $k['aspek']?>_<?php echo $k['faktor']?></option>
                                    <?php } ?>
                                    </select>                                    
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                <label>Target Nilai <span style="color:red"> *</span></label>
                                <select name="value" id="value" class="form-control" required>
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

<!-- Modal Petunjuk Pengisian -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Petunjuk Pengisian Nilai Sample</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
					
						<h5 class="card-title">
						Pemberian Nilai Berdasarkan Tiap Kriteria
						</h5>
            <br/>
            <br/>
						<p class="card-text">
						Untuk tiap kriteria memiliki point penilaian yang berbeda yang telah ditentukan berdasarkan hasil diskusi dengan ketua RW / RT setempat. dalam menentukan point penilaian ini menggunakan skala ordinal yaitu 1 s/d 5.
						</p>
						<p class="card-text">
						Maka disini akan dijelaskan point penilaian tiap kriteria yang telah di dapatkan seperti berikut ini :
						</p>
						<ol><strong>ASPEK WARGA</strong>
							<li>Umur</li>
              <div class="table-responsive">
                <table class="table table-bordered" id="table_sample" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-center">
                      <th>Keterangan</th>
                      <th>Nilai</th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                  <tr>
                  <td>Umur >= 60</td>
                  <td>5</td>
                  </tr>
                  <tr>
                  <td>Umur >= 50 - <= 59 </td>
                  <td>4</td>
                  </tr>
                  <tr>
                  <td>Umur >= 30 - <= 49 </td>
                  <td>3</td>
                  </tr>
                  <tr>
                  <td>Umur >= 25 - <= 48 </td>
                  <td>2</td>
                  </tr>
                  <tr>
                  <td>Umur <= 24 </td>
                  <td>1</td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <br/>
							<li>Asal Penduduk</li>
              <div class="table-responsive">
                <table class="table table-bordered" id="table_sample" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-center">
                      <th>Keterangan</th>
                      <th>Nilai</th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                  <tr>
                  <td>Asli</td>
                  <td>5</td>
                  </tr>
                  <tr>
                  <td>Perantau</td>
                  <td>3</td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <br/>
							<li>Rumah</li>
              <div class="table-responsive">
                <table class="table table-bordered" id="table_sample" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-center">
                      <th>Keterangan</th>
                      <th>Nilai</th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                  <tr>
                  <td>Kontrakan</td>
                  <td>5</td>
                  </tr>
                  <tr>
                  <td>Pribadi</td>
                  <td>3</td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <br/>
							<li>Tanggungan</li>
              <div class="table-responsive">
                <table class="table table-bordered" id="table_sample" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-center">
                      <th>Keterangan</th>
                      <th>Nilai</th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                  <tr>
                  <td>Keluarga</td>
                  <td>5</td>
                  </tr>
                  <tr>
                  <td>Sendiri</td>
                  <td>3</td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <br/>
              <li>Kelengkapan Dokumen</li>
              <div class="table-responsive">
                <table class="table table-bordered" id="table_sample" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-center">
                      <th>Keterangan</th>
                      <th>Nilai</th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                  <tr>
                  <td>Lengkap (Memiliki KTP & KK)</td>
                  <td>5</td>
                  </tr>
                  <tr>
                  <td>Memiliki KK</td>
                  <td>4</td>
                  </tr>
                  <tr>
                  <td>Memiliki KTP</td>
                  <td>3</td>
                  </tr>
                  <tr>
                  <td>FC KTP / KK</td>
                  <td>2</td>
                  </tr>
                  <tr>
                  <td>Tidak Memiliki KTP / KK</td>
                  <td>1</td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <br/>					
						</ol>
            <br/>
             <ol><strong>Ekonomi</strong>
             <li>Pekerjaan</li>
             <div class="table-responsive">
                <table class="table table-bordered" id="table_sample" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-center">
                      <th>Keterangan</th>
                      <th>Nilai</th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                  <tr>
                  <td>Gelandangan, Pengemis, Kuli Bangunan, Petani dan Kuli</td>
                  <td>5</td>
                  </tr>
                  <tr>
                  <td>Korban PHK / Penggangguran </td>
                  <td>4</td>
                  </tr>
                  <tr>
                  <td>Wiraswasta</td>
                  <td>3</td>
                  </tr>
                  <tr>
                  <td>Karyawan Swasta / Pabrik</td>
                  <td>2</td>
                  </tr>
                  <tr>
                  <td>ASN / PNS</td>
                  <td>1</td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <br/>
              <li>Penghasilan</li>
              <div class="table-responsive">
                <table class="table table-bordered" id="table_sample" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-center">
                      <th>Keterangan</th>
                      <th>Nilai</th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                  <tr>
                  <td><= 1.000.000</td>
                  <td>5</td>
                  </tr>
                  <tr>
                  <td>> 1.000.000 - <= 3.000.000</td>
                  <td>4</td>
                  </tr>
                  <tr>
                  <td>> 3.000.000 - <= 5.000.000</td>
                  <td>3</td>
                  </tr>
                  <tr>
                  <td>> 5.000.000 - <= 10.000.000</td>
                  <td>2</td>
                  </tr>
                  <tr>
                  <td>> 10.000.000</td>
                  <td>1</td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <br/>
             </ol>                        
				
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
  </div>
</div>
</div>
<!-- Modal Petunjuk Pengisian -->
<!-- End Bootstrap modal -->