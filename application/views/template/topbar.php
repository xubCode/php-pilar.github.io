<body class="hold-transition sidebar-mini layout-navbar-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>    
    </ul>
    <!-- Right navbar links -->
    <?php if ($this->session->userdata('role_id') == 1) : ?>
    <ul class="navbar-nav ml-auto">
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">
            <?php 
                if (!empty($jumlah_adm_non_aktif)) {
                  echo $jumlah_adm_non_aktif;
                } else {
                  echo "-";
                }
             ?>              
          </span>
        </a>
      </li>
      
    </ul>
  <?php endif; ?>
  </nav>
  <!-- /.navbar -->


              