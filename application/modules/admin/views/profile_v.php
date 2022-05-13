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

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
              <?php  
                    if (empty($this->session->userdata('gambar'))) {
                      $foto = "avatar5.png";
                    } else {
                      $foto = $this->session->userdata('gambar');
                    }
                  ?>
                <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url() ?>upload/<?php echo $foto ?>" alt="User profile picture">
              </div>
              <br/>
              <strong><i class="fas fa-user mr-1"></i> Username </strong>

              <p class="text-muted text-center">
                <?php echo $this->session->userdata('username');?>
              </p>

              <hr>

              <strong><i class="fas fa-users mr-1"></i> Nama</strong>

              <p class="text-muted text-center"><?php echo $this->session->userdata('nama');?></p>

              

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- About Me Box -->

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
              <form action="<?php echo base_url('admin') ?>/profile/update" method="post" enctype="multipart/form-data">
              <?php
                  foreach ($user as $u) :
                    if (empty($u['gambar'])) {
                      $foto = "avatar5.png";
                    } else {
                      $foto = $u['gambar'];
                    }
                  ?>
                <div class="form-group row">
                  <label for="inputName" class="col-sm-2 col-form-label">Username <span style="color:red"> *</span></label>
                  <div class="col-sm-10">
                  <input type="hidden" value="<?php echo $u['id']; ?>" class="form-control" id="id" name="id" placeholder="Masukkan Nama" name="id">
                    <input type="text" value="<?php echo $u['username']?>" required class="form-control" name="username" id="username" placeholder="Masukkan Username">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Nama <span style="color:red"> *</span></label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $u['nama']?>" required class="form-control" name="nama" id="nama" placeholder="Masukkan Nama">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputName2" class="col-sm-2 col-form-label">Password <span style="color:red"> *</span></label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Tidak Perlu diisi jika tidak ingin mengganti password">
                  </div>
                </div>
                <div class="form-group row" id="photo-preview">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-10">
                          <img src="<?php echo base_url('upload') ?>/<?php echo $foto ?>" class="img-responsive" width="240" height="320">
                          <input type="checkbox" name="remove_photo" value="<?php echo $u['gambar'] ?>"> Remove foto when saving
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