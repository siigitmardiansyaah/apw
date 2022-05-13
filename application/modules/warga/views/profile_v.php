<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Profile</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Profile</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-3">
          <!-- /.card -->

          <!-- About Me Box -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">About Me</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php
              foreach ($user as $u) {
                if ($u->foto == null) {
                  $foto = 'user4-128x128.jpg';
                } else {
                  $foto = $u->foto;
                }
              ?>
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url() ?>upload/<?php echo $foto ?>" alt="User profile picture">
                  </div>

                  <h3 class="profile-username text-center"><?php echo $u->nama ?></h3>

                  <p class="text-muted text-center"><?php echo $u->pekerjaan ?></p>


                </div>
                <hr>

                <strong><i class="fas fa-book mr-1"></i> Pendidikan</strong>

                <p class="text-muted">
                  <?php echo $u->nama_pendidikan ?>
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                <p class="text-muted"><?php echo $u->alamat ?></p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Tempat, Tanggal Lahir</strong>

                <p class="text-muted">
                  <?php echo $u->tmpt_lahir ?> , <?php echo $u->tgl_lahir ?>
                </p>

                <hr>

                <strong><i class="fas fa-phone mr-1"></i> No Telepon</strong>

                <p class="text-muted"><?php echo $u->no_telepon ?></p>
              <?php
              }
              ?>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-body">
            <?php
            if($this->session->flashdata('pesan')){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?php echo $this->session->flashdata('pesan');?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php
            }
            ?>
              <form action="<?php echo base_url('warga') ?>/profile/update" method="post" enctype="multipart/form-data">
              <?php
                  foreach ($user as $u) :
                    if (empty($u->foto)) {
                      $foto = "avatar5.png";
                    } else {
                      $foto = $u->foto;
                    }
                  ?>
                <div class="form-group row">
                  <label for="inputName" class="col-sm-2 col-form-label">NIK</label>
                  <div class="col-sm-10">
                  <input type="hidden" value="<?php echo $u->id; ?>" class="form-control" id="id" name="id" placeholder="Masukkan Nama" name="id">
                    <input type="text" value="<?php echo $u->nik?>" required class="form-control" name="nik" id="nik" placeholder="Masukkan NIK">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $u->nama?>" required class="form-control" name="nama" id="nama" placeholder="Masukkan Nama">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Tempat Lahir</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $u->tmpt_lahir?>" required class="form-control" name="tmpt_lahir" id="tmpt_lahir" placeholder="Masukkan Nama">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="date" value="<?php echo $u->tgl_lahir?>" required class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Masukkan Nama">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-2 col-form-label">No RT</label>
                  <div class="col-sm-10">
                  <input type="number" value="<?php echo $u->no_rt?>" required class="form-control" name="no_rt" id="no_rt" placeholder="Masukkan No RT">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-2 col-form-label">No Telepon</label>
                  <div class="col-sm-10">
                  <input type="text" value="<?php echo $u->no_telepon?>" required class="form-control" name="no_telepon" id="no_telepon" placeholder="Masukkan No Telepon">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <textarea required class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat"><?php echo $u->alamat ?></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="jk" required id="jk">
                    <option value="Lelaki" <?php if($u->jk == 'Lelaki'):
                        ?>
                        selected<?php endif; ?>>Lelaki</option>
                                    <option value="Perempuan" <?php if($u->jk == 'Perempuan'):
                        ?>
                        selected<?php endif; ?> >Perempuan</option>
                  </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Agama</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="id_agama" required id="id_agama">
                    <?php
                    foreach($agama as $a) : 
                    ?>
                        <option value="<?php echo $a['id_agama'];?>" 
                        <?php if($a['id_agama'] == $u->id_agama):
                        ?>
                        selected<?php endif; ?>
                        > <?php echo $a['agama']; ?></option>
                    <?php endforeach; ?>
                  </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Pekerjaan</label>
                  <div class="col-sm-10">
                  <input type="text" value="<?php echo $u->pekerjaan?>" required class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Masukkan Pekerjaan">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Pendidikan</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="id_pendidikan" required id="id_pendidikan">
                    <?php
                    foreach($pendidikan as $a) : 
                    ?>
                        <option value="<?php echo $a['id_pendidikan'];?>" 
                        <?php if($a['id_pendidikan'] == $u->id_pendidikan):
                        ?>
                        selected<?php endif; ?>
                        > <?php echo $a['nama_pendidikan']; ?></option>
                    <?php endforeach; ?>
                  </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Status Perkawinan</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="status_perkawinan" required id="status_perkawinan">
                    <option value="1" <?php if($u->id_pendidikan == '1'):
                        ?>
                        selected<?php endif; ?>>Belum Menikah</option>
                                    <option value="2" <?php if($u->id_pendidikan == '2'):
                        ?>
                        selected<?php endif; ?> >Menikah</option>
                                    <option value="3" <?php if($u->id_pendidikan == '3'):
                        ?>
                        selected<?php endif; ?>>Cerai Hidup</option>
                                    <option value="4" <?php if($u->id_pendidikan == '4'):
                        ?>
                        selected<?php endif; ?>>Cerai Mati</option>
                  </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Kewarganegaraan</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="kewarganegaraan" required id="kewarganegaraan">
                    <option value="Indonesia" <?php if($u->kewarganegaraan == 'Indonesia'):
                        ?>
                        selected<?php endif; ?>>Indonesia</option>
                                    <option value="Asing" <?php if($u->kewarganegaraan == 'Asing'):
                        ?>
                        selected<?php endif; ?> >Asing</option>
                  </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Status Kehidupan</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="status_hidup" required id="status_hidup">
                    <option value="Hidup" <?php if($u->status_hidup == 'Hidup'):
                        ?>
                        selected<?php endif; ?>>Hidup</option>
                                    <option value="Meninggal" <?php if($u->status_hidup == 'Meninggal'):
                        ?>
                        selected<?php endif; ?> >Meninggal</option>
                  </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Status Dalam Keluarga</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="status_dalam_keluarga" required id="status_dalam_keluarga">
                    <option value="Ayah/Suami" <?php if($u->status_dalam_keluarga == 'Ayah/Suami'):
                        ?>
                        selected<?php endif; ?>>Ayah/Suami</option>
                                    <option value="Ibu/Istri" <?php if($u->status_dalam_keluarga == 'Ibu/Istri'):
                        ?>
                        selected<?php endif; ?> >Ibu/Istri</option>
                                    <option value="Anak" <?php if($u->status_dalam_keluarga == 'Anak'):
                        ?>
                        selected<?php endif; ?> >Anak</option>
                  </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputName2" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Tidak Perlu diisi jika tidak ingin mengganti password">
                  </div>
                </div>
                <div class="form-group row" id="photo-preview">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-10">
                          <img src="<?php echo base_url('upload') ?>/<?php echo $foto ?>" class="img-responsive" width="240" height="320">
                          <input type="checkbox" name="remove_photo" value="<?php echo $u->foto ?>"> Remove foto when saving
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Upload Foto</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" id="photo" name="photo">
                        </div>
                      </div>

                <div class="form-group row">
                  <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-danger">Submit</button>
                  </div>
                </div>
              </form>
              <?php
                  endforeach;
                  ?>
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div><!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</section>



</div>