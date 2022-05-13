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
            <li class="breadcrumb-item">Berita</li>
            <li class="breadcrumb-item active">Berita</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <section class="content">
  <div class="container-fluid">
      <div class="card shadow mb-4">
            <div class="card-header py-3">
            <div class="float-right"> 
            <a href="<?php echo base_url('admin')?>/berita" class="btn btn-info btn-sm btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-arrow-left"></i>
                    </span>
                    <span class="text">Kembali</span>
                  </a>                                                      
            </div>
              <h4 class="m-0 font-weight-bold text-primary">Edit Berita</h4>
            </div>
            <div class="card-body">
            <?php echo $this->session->flashdata('pesan'); ?>
            <?php foreach($user as $u){ ?>
            <form action="<?php echo base_url('admin')?>/berita/ajax_update" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Judul <span style="color:red"> *</span></label>
                            <div class="col-md-12">
                            <input type="hidden" name="id" value="<?php echo $u->id_berita ?>">
                                <input name="judul" id="judul" value="<?php echo $u->judul ?>" placeholder="Judul Berita" class="form-control" type="text" required>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Isi Berita <span style="color:red"> *</span></label>
                            <div class="col-md-12">
                                <textarea id="isi" name="isi" placeholder="Isi Berita" class="form-control" rows="10" required><?php echo $u->isi ?></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group" id="photo-preview">
                            <label class="control-label col-md-3">Photo <span style="color:red"> *</span></label>
                            <div class="col-md-12">
                            <img src="<?php echo base_url('upload')?>/berita/<?php echo $u->gambar?>" class="img-responsive" width="240" height="320" required>
                                <input type="checkbox" name="remove_photo" value="<?php echo $u->gambar?>"/> Remove foto when saving                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" id="label-photo">Upload Photo <span style="color:red"> *</span> </label>
                            <div class="col-md-12">
                                <input name="photo" type="file" required>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="control-label col-md-3">Publish <span style="color:red"> *</span></label>
                        <select class="form-control" required name="publish" id="publish">
                        <option value="">Pilih Status</option>
                        <?php
                        if($u->publish == 'Yes'){
                          echo'<option value="Yes" selected="selected">Yes</option>';
                          echo'<option value="No">No</option>';

                        }?>
                        <?php
                        if($u->publish == 'No'){
                          echo'<option value="No" selected="selected">No</option>';
                          echo'<option value="Yes">Yes</option>';
                        }?>
                        </select>
                        <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                                <button type="submit" value="Simpan" class="btn btn-success btn-block">Simpan</button>
                        </div>
                    </div>
                </form>
                <?php }?>
            </div>
          </div>
        </div>

  </section>
  
</div>