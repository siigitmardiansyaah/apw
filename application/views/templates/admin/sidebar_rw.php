<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo base_url('rw') ?>" class="brand-link">
    <img src="<?php echo base_url() ?>assets/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">A.P.W</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo base_url() ?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="<?php echo base_url('rw') ?>/profile" class="d-block"><?php echo $this->session->userdata('nama') ?></a>
      </div>
    </div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">Menu</li>
        <li class="nav-item">
          <a href="<?php echo base_url('rw') ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('rw') ?>/profile" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Profile
            </p>
          </a>
        </li>
          <!-- Menu Warga -->
          <li class="nav-item menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Warga
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('rw')?>/kk" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kepala Keluarga</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('rw')?>/warga" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Warga Tetap</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('rw')?>/warga/warga_pindah" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Warga Pindah</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Menu Warga -->
        <li class="nav-item">
          <a href="<?php echo base_url('rw') ?>/role" class="nav-link">
            <i class="nav-icon fas fa-award"></i>
            <p>
              Status Role
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('rw') ?>/berita" class="nav-link">
            <i class="nav-icon fas fa-bell"></i>
            <p>
              Pengumuman
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('rw') ?>/rangking" class="nav-link">
            <i class="nav-icon fas fa-cogs"></i>
            <p>
              Hasil Perhitungan Penerima Dana Bantuan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('rw') ?>/timeline" class="nav-link">
            <i class="nav-icon fas fa-newspaper"></i>
            <p>
              Timeline Berita
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?php echo base_url() ?>login/logout" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>