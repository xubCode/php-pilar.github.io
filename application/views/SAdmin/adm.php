<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kelola Administrator</h1>
          </div>          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">          
<!-- /.card -->
            <?= $this->session->flashdata('message'); ?>
            <?php if (empty($adm)) : ?>
              <div class="alert alert-danger">
                Belum ada data administrator saat ini.
              </div>
            <?php endif; ?>
            <button class="mb-2 btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#tambahAdm">
              Tambah Administrator
            </button>
            <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?php if(!empty($adm)): ?>Di bawah ini data Administrator <?php endif; ?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="perusahaan" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Status</th>                                
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1;foreach($adm as $row) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?php cetak($row['nama']); ?></td>
                    <td><?php cetak($row['email']); ?></td>
                    <?php if ($row['is_active'] == 1) : ?>
                      <td><span class="badge badge-pill badge-success">Aktif</span></td>
                    <?php endif; ?>                                        
                    <td align="center">
                      <button type="button" class="mt-2 btn btn-primary btn-sm" data-toggle="modal" data-target="#nonaktifkanUser<?= $row['id'];?>">
                        Nonaktifkan User?
                      </button>                      
                    </td>                  
                  </tr>              
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Status</th>                                
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->                        
            </div>
            <!-- /.card -->
             </div>
             <div class="row">
          <div class="col-12">          
<!-- /.card -->
           
            
            
            <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Aktivasi Administrator</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Status</th>                                
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1;foreach($adm_non_aktif as $row) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?php cetak($row['nama']); ?></td>
                    <td><?php cetak($row['email']); ?></td>
                    <?php if ($row['is_active'] == 0) : ?>
                      <td><span class="badge badge-pill badge-warning">Non Aktif</span></td>
                    <?php endif; ?>                                        
                    <td align="center">
                      <button type="button" class="mt-2 btn btn-primary btn-sm" data-toggle="modal" data-target="#aktifkanUser<?= $row['id'];?>">
                        Aktifkan User?
                      </button>                      
                    </td>                  
                  </tr>              
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Status</th>                                
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->                        
            </div>
            <!-- /.card -->
             </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- Modal Tambah ADM -->
  <div class="modal fade" id="tambahAdm" tabindex="-1" role="dialog" aria-labelledby="tambahAdm" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahAdm">Tambah Administrator</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?= form_open('add_adm', ['class' => 'form-horizontal']); ?>

             <div class="form-group row">
               <div class="col-sm-12">
                 <div class="alert alert-warning">
                   Sebelum simpan data silahkan Screenshoot form ini, dan kirim Screenshoot ini kepada administrator yang bersangkutan.
                 </div>
               </div>
               <label class="col-sm-3 col-form-label">Nama</label>
               <div class="col-sm-9">
                 <input type="text" class="form-control" name="nama" placeholder="Nama Administrator" required>
               </div>
             </div>              
             <div class="form-group row">
               <label class="col-sm-3 col-form-label">Email</label>
               <div class="col-sm-9">
                 <input type="email" class="form-control" name="email" placeholder="Email" required>
               </div>
             </div> 
             <div class="form-group row">
               <label class="col-sm-3 col-form-label">Password</label>
               <div class="col-sm-9">
                 <input type="text" class="form-control" name="pw" placeholder="Password" value="<?= random_string('alnum', 9); ?>" readonly required>
               </div>
             </div> 
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-danger">Ya</button>
        </div>
        <?= form_close(); ?>
      </div>
    </div>
  </div>
  
  <!-- Modal edit data perusahaan -->
  <?php 
    foreach ($adm as $magna) :
      
    
   ?>
  <!-- Modal Menonaktifkan User -->
  <div class="modal fade" id="nonaktifkanUser<?= $magna['id'];?>" tabindex="-1" role="dialog" aria-labelledby="nonaktifkanUser<?= $magna['id'];?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="nonaktifkanUser<?= $magna['id'];?>">Menonaktifkan User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?= form_open('kill_adm', ['class' => 'form-horizontal']); ?>
              Apakah Anda Yakin menonaktifkan user <?php cetak($magna['nama']); ?>?
                <input type="hidden" name="id" value="<?php cetak($magna['id']); ?>" required>                      
                <input type="hidden" name="nama" value="<?php cetak($magna['nama']); ?>" required>                      
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-danger">Ya</button>
        </div>
        <?= form_close(); ?>
      </div>
    </div>
  </div>

  
<?php endforeach; ?>

 <?php 
    foreach ($adm_non_aktif as $ars) :
      
    
   ?>
  <!-- Modal aktifkan User -->
  <div class="modal fade" id="aktifkanUser<?= $ars['id'];?>" tabindex="-1" role="dialog" aria-labelledby="aktifkanUser<?= $ars['id'];?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="aktifkanUser<?= $ars['id'];?>">Aktifkan User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?= form_open('heal_adm', ['class' => 'form-horizontal']); ?>
              Apakah Anda Yakin ingin mengaktifkan user <?php cetak($ars['nama']); ?>?
                <input type="hidden" name="id" value="<?php cetak($ars['id']); ?>">                      
                <input type="hidden" name="nama" value="<?php cetak($ars['nama']); ?>">                      
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-danger">Ya</button>
        </div>
        <?= form_close(); ?>
      </div>
    </div>
  </div>

  
<?php endforeach; ?>

  
  