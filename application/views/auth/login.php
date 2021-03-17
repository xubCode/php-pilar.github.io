<body class="hold-transition login-page">
<div class="login-box">
  <?= $this->session->flashdata('message'); ?>
  <!-- /.login-logo -->
  <div class="card card-maroon">
    <div class="card-header">Login</div>
    <div class="card-body login-card-body">

      <?= form_open('auth'); ?>
        <div class="input-group mb-3">
          <input type="email" autofocus class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>          
        </div>
        <?= form_error('email','<b class="text-danger" style="padding-left: 8px;">','</b>');?>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="pw">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>          
        </div>
        <?= form_error('pw','<b class="text-danger" style="padding-left: 8px;">','</b>');?>
        <div class="row">
          <!-- /.col -->
          <div class="col-4 offset-md-4">
            <button type="submit" class="btn bg-maroon btn-sm btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      <?= form_close(); ?>


      <!-- <p class="mb-0 text-center">
        <a href="#">Lupa Password?</a>
      </p> -->
      <p class="mb-0 text-center">
        <a href="<?= base_url('auth/register'); ?>" class="text-center">Register anggota baru</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

