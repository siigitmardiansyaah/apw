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
            <li class="breadcrumb-item active">Timeline Berita</li>
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
              <h4 class="card-title m-0 font-weight-bold text-primary">
                Timeline Berita
              </h4>
            </div><!-- /.card-header -->
            <div class="card-body">
            <?php 
            if ($model['siswa'] == null)
            {
              echo 'Tidak Ada Berita / Pengumuman';
            }?>
            
            <?php
                foreach($model['siswa'] as $d) : ?>
                
              <div class="timeline timeline-inverse">
                <!-- timeline time label -->
               
                <div class="time-label">
                  <span class="bg-info">
                    <?php echo date('d M Y',strtotime($d->tanggal))?>
                  </span>
                </div>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <div>
                  <i class="fas fa-envelope bg-primary"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="far fa-clock"></i> <?php echo date('h:i',strtotime($d->tanggal))?></span>

                    <h3 class="timeline-header"><a href="#"><?php echo $d->nama ?></a> <?php
                    if($d->role == 'RW')
                    {
                      echo "<strong>Ketua $d->role</strong>";
                    }else{
                      echo "<strong>Ketua $d->role - $d->no_rt</strong>";
                    }
                    ?>
                    </h3>

                    <div class="timeline-body">
                      <?php echo $d->isi?>
                    </div>
                    <div class="timeline-footer">
                      <form class="form-horizontal" method="POST" action="<?php echo base_url()?>rw/timeline/add_komen">
                        <div class="input-group input-group-sm mb-0">
                          <input hidden name="id_berita" value="<?php echo $d->id_berita ?>">
                          <input class="form-control form-control-sm" name="komen" id="komen" placeholder="Response">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">Send</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- END timeline item -->
                <!-- timeline item -->
               
                <!-- END timeline item -->
                <!-- timeline item -->
                <?php
                foreach($komen as $da) : 
                if($da->id_pengumuman == $d->id_berita) :
                ?>
                <div>
                  <i class="fas fa-comments bg-warning"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="far fa-clock"></i> <?php echo date('d M Y h:i',strtotime($da->tanggal_komen))?></span>

                    <h3 class="timeline-header"><a href="#"><?php echo $da->nama ?></a> commented on your post</h3>

                    <div class="timeline-body">
                      <?php echo $da->komentar ?>
                    </div>
                    <div class="timeline-footer">
                    <?php
                    if($da->id_warga == $this->session->userdata('id')): ?>
                      <a href="<?php echo base_url()?>rw/timeline/hapus_komen/<?php echo $da->id_komen?>" class="btn btn-danger btn-flat btn-sm">Delete comment</a>
                      <?php endif?>
                    </div>
                  </div>
                </div>
                <?php
                endif; 
              endforeach; ?>
                <!-- END timeline item -->
                <!-- timeline time label -->
                
                <div>
                  <i class="far fa-clock bg-gray"></i>
                </div>
              </div>
              <?php endforeach; ?>
              <div class="row">
        <div class="col">
            <!--Tampilkan pagination-->
            <?php  // Tampilkan link-link paginationnya  
            echo $model['pagination'];  ?>       
             </div>
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