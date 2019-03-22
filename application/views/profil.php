    <section class="content-header">
      <h1>Profil<small>Pengguna</small></h1>
    </section>
    <section class="content">
      <div class="box box-widget widget-user-2">
        <?php echo $this->session->userdata('notif'); ?>
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-yellow">
          <div class="widget-user-image">
            <img class="img-circle" src="<?php echo base_url('assets/dist/img/avatar.png'); ?>" alt="User Avatar">
          </div>
          <h3 class="widget-user-username"><?php echo $username; ?></h3>
          <h5 class="widget-user-desc">Laki-Laki</h5>
        </div>
        <div class="box-footer no-padding">
            <?php foreach ($data as $key) {?>
        <ul class="nav nav-stacked">
          <li><a>Nama <span class="pull-right"><?php echo $key['nama']; ?></span></a></li>
          <li><a>Alamat <span class="pull-right"><?php echo $key['alamat']; ?></span></a></li>
          <li><a>Email <span class="pull-right"><?php echo $key['email']; ?></span></a></li>
          <li><a>Nomor Telepon <span class="pull-right"><?php echo $key['nomor']; ?></span></a></li>
          <li><a href="#" data-toggle="modal" data-target="#update-profil" profil-id="<?php echo $key['id']; ?>" class="tblUbahProfil text-bold text-red pointer">Ubah Profil</a></li>
        </ul>
      <?php } ?>
      </div>
    </div>

      <div class="box box-widget widget-user-2">
        <div class="box-footer no-padding">
          <ul class="nav nav-stacked">
            <li><a>Username <span class="pull-right text-bold"><?php echo $this->session->userdata('username'); ?></span></a></li>
            <li><a>Password <span class="pull-right">****</span></a></li>
            <li><a href="#" data-toggle="modal" data-target="#ubah_password" karyawan-id="<?php echo $this->session->userdata('user_id'); ?>" class="tblUbahPassword text-bold text-red pointer">Ubah Password</a></li>
          </ul>
        </div>
      </div>
    </section>
  </div>

  <!-- Update Profil -->
  <div id="update-profil" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Profil</h4>
        </div>
        <form method="post" action="<?php echo base_url('main/update_profil');?>" id="form_update_profil">
          <div class="modal-body" id="Modal_Add">
            <div class="form-group">
                <label class="control-label" for="nama">Nama</label>
                <input type="hidden" name="id" id="id">
                <input type="text" name="nama" id="nama" class="form-control"  required="required">
            </div>
            <div class="form-group">
                <label class="control-label" for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" required="required"></textarea>
            </div>
            <div class="form-group">
            <label class="control-label" for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" required="required">
          </div>
          <div class="form-group">
            <label class="control-label" for="penerima">Nomor Telepon</label>
            <input type="text" name="nomor" id="nomor" class="form-control" required="required">
          </div>
        </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-success" id="btn_save" name="update" value="Simpan">
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Update password -->
  <div id="ubah_password" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ubah Password</h4>
        </div>
        <div class="modal-body">
          <form method="post" id="form_ubah_password" action="http://localhost/akutansi/Main/ubah_password">
            <div class="form-group">
              <label for="old_pass">Password Lama</label>
              <input type="password" class="form-control" id="old_pass" name="old_pass" placeholder="Password Lama" required="required">
            </div>
            <div class="form-group" id="pw1">
              <label for="password">Password Baru</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password Baru" required="required">
            </div>
            <div class="form-group" id="pw2">
              <label for="password2">Konfirmasi Password Baru</label>
              <input type="password" class="form-control" id="password2" name="password2" placeholder="Konfirmasi Password Baru" required="required">
              <span class="help-block"></span>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn <?php echo ($this->M_System->getStatus() == 1 ? 'btn-primary' : 'btn-danger'); ?> pull-left"><span class="fa fa-save"></span> Simpan</button>
          </form>
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
