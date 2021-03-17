<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-danger elevation-4" style="height: 1000px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link elevation-4">
      <img src="<?= base_url('asset/img/index.jpeg'); ?>"
           alt=""
           class="brand-image img-circle ml-5">
           <span class="brand-text font-weight-light">PILAR</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('asset/img/default.jpeg'); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            <?= $this->session->userdata('nama'); ?>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <?php if ($this->session->userdata('id_role') == 3) : ?>
          <li class="nav-item has-treeview">
            <a href="<?= base_url('pemagang'); ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>          
          </li>
        <?php endif; ?>
        <?php $role = $this->session->userdata('id_role');
            if ( $role == 1 || $role == 2) :?>
          <li class="nav-item has-treeview">
            <a href="<?= base_url('SAdmin'); ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>          
          </li>
        <?php endif; ?>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-database"></i>
              <p>
                <?php $role = $this->session->userdata('id_role');
                  if ( $role == 1 || $role == 2) :?>
                    Master Data
                <?php else : ?>
                    Data Pribadi
                <?php endif; ?>
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <?php $role = $this->session->userdata('id_role');
                    if ($role == 3) : ?>
                      <li class="nav-item">
                        <a href="<?= base_url('biodata'); ?>" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Biodata</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="<?= base_url('Dokumen'); ?>" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Dokumen</p>
                        </a>
                      </li>           
                <?php else : ?>                                         
                      <?php if ($this->session->userdata('id_role') == 1) : ?>
                        <li class="nav-item">
                          <a href="<?= base_url('administrator'); ?>" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Administrator</p>
                          </a>
                        </li>
                      <?php endif; ?>
                <?php endif; ?>
            </ul>
          </li>
          <!-- <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php if($this->session->userdata('id_role') == 3) : ?>
                <li class="nav-item">
                  <a href="<?php if($this->session->userdata('id')) { $id_user = $this->session->userdata('id'); 
                  echo base_url('biodata/cetak/') . $id_user; }?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Cetak Biodata</p>
                  </a>
                </li>  
                <li class="nav-item">
                  <a href="<?= base_url('dokumen/report_menu'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dokumen</p>
                  </a>
                </li> 
              <?php else : ?>
                <li class="nav-item">
                  <a href="<?= base_url('report/newComers'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                      <p>New Comers</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('report/exJapan'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ex Japan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('report/perusahaan'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Perusahaan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('report/penempatan'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Penempatan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('report/dokumen'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dokumen</p>
                  </a>
                </li>
              <?php endif; ?>                                     
            </ul>
          </li> -->
          
          <li class="nav-item has-treeview">
            <a href="<?= base_url('auth/logout/' . $this->session->userdata('id')); ?>" class="nav-link active">
              <p>
                Logout?
                <i class="fas fa-power-off right"></i>                
              </p>
            </a>
          </li>          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>