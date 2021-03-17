<body class="hold-transition login-page">
<div class="login-box">  
  
  <div class="card card-maroon">
    <div class="card-header">Pendaftaran</div>
    <div class="card-body login-card-body">

      <?= form_open('auth/register'); ?>
        <div class="input-group mb-2">
          <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" value="<?= set_value('nama'); ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>          
        </div>
        <?= form_error('nama','<b class="text-danger" style="padding-left: 8px;">','</b>');?>        
        <div class="input-group mb-2">
          <input type="email" class="form-control" placeholder="Email" name="email" value="<?= set_value('email'); ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>          
        </div>
        <?= form_error('email','<b class="text-danger" style="padding-left: 8px;">','</b>');?>
        <div class="input-group mb-2">
          <input type="password" class="form-control" placeholder="Password" name="pw">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>          
        </div>
        <?= form_error('pw','<b class="text-danger" style="padding-left: 8px;">','</b>');?>
        <div class="input-group mb-2">
          <input type="password" class="form-control" placeholder="Ulangi Password" name="pw2">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?= form_error('pw2','<b class="text-danger" style="padding-left: 8px;">','</b>');?>
        <div class="row">
          <!-- /.col -->
          <div class="col-4 offset-md-4">
            <button type="submit" class="btn btn-sm bg-maroon btn-block">Daftar</button>
          </div>
          <!-- /.col -->
        </div>
      <?= form_close(); ?>


      <p class="mt-2 mb-0 text-center">
        <a href="<?= base_url('auth'); ?>" class="text-center">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

