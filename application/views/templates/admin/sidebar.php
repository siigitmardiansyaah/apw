<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo base_url('admin') ?>" class="brand-link">
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
        <a href="<?php echo base_url('admin') ?>/profile" class="d-block"><?php echo $this->session->userdata('username') ?></a>
      </div>
    </div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">Menu</li>
        <li class="nav-item">
          <a href="<?php echo base_url('admin') ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('admin') ?>/profile" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Profile
            </p>
          </a>
        </li>
          <!-- Menu Masster Data -->
        <li class="nav-item menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('admin')?>/kk" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kartu Keluarga</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin')?>/agama" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agama</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin')?>/pendidikan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pendidikan</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Menu Master Data -->
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
                <a href="<?php echo base_url('admin')?>/warga" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Warga Tetap</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin')?>/warga/warga_pindah" class="nav-link">
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
                <a href="<?php echo base_url('admin')?>/alternatif" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Alternatif</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin')?>/aspek" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Aspek</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin')?>/kriteria" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kriteria</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin')?>/bobot" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bobot</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin')?>/sample" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sample Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin')?>/rangking" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hasil Perangkingan</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Menu SPK -->
        <li class="nav-item">
          <a href="<?php echo base_url('admin') ?>/role" class="nav-link">
            <i class="nav-icon fas fa-award"></i>
            <p>
              Status Role
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('admin') ?>/users" class="nav-link">
            <i class="nav-icon fas fa-lock"></i>
            <p>
              Users
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