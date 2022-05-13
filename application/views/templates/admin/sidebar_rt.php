<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo base_url('rt') ?>" class="brand-link">
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
        <a href="<?php echo base_url('rt') ?>/profile" class="d-block"><?php echo $this->session->userdata('nama') ?></a>
      </div>
    </div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">Menu</li>
        <li class="nav-item">
          <a href="<?php echo base_url('rt') ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('rt') ?>/profile" class="nav-link">
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
                <a href="<?php echo base_url('rt')?>/kk" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Kepala Keluarga</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('rt')?>/warga" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Warga Tetap</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('rt')?>/warga/warga_pindah" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Warga Pindah</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Menu Warga -->
          <!-- Menu SPK -->
          <li class="nav-item menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                SPK
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('rt')?>/alternatif" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Alternatif</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('rt')?>/aspek" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Aspek</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('rt')?>/kriteria" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kriteria</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('rt')?>/bobot" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bobot</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('rt')?>/sample" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sample Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('rt')?>/rangking" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hasil Perangkingan</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Menu SPK -->
        <li class="nav-item">
          <a href="<?php echo base_url('rt') ?>/berita" class="nav-link">
            <i class="nav-icon fas fa-bell"></i>
            <p>
              Pengumuman
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('rt') ?>/timeline" class="nav-link">
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