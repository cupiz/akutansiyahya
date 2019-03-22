<section class="content">
            <div class="row">
              <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Pengaturan User</h3>
                  </div>
      <div class="box-body">
      <table id="expensetable" class="table table-bordered table-hover custometable">
        <thead>
          <tr role="row">
            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Tanggal: activate to sort column descending">#</th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Jumlah: activate to sort column ascending">username</th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Jenis Pemasukan: activate to sort column ascending">Pemilik</th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Sumber: activate to sort column ascending">status</th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Keterangan: activate to sort column ascending">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $karyawan = array();

          if ($user != NULL) {
            $i = 1;
            foreach ($user as $row) {
              if ($row->status == 1)
                $status = "<span class='label label-success'>Admin</span>";
              else if ($row->status == 2)
                $status = "<span class='label label-primary'>Bendahara</span>";
              else if ($row->status == 3)
                $status = "<span class='label label label-warning'>Pengguna</span>";
              else
                $status = "NULL";

              if ($this->session->userdata('user_id') == $row->id_karyawan)
                $str = "";
              else
                $str = "<a class='label label-warning tblResetUser' user-id='" . $row->username . "' data-target='#Reset-Password' data-toggle='modal'>Reset Password</a>
                        <a href='#' class='label label-danger btnDeleteUser' data-target='#user_hapus' data-toggle='modal' data-id='" . $row->username . "'>Hapus</a>";
              printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $i, $row->username, $row->nama, $status, $str);
              array_push($karyawan, $row->id);

              $i++;
            }
          }
          else
            printf("<tr><td colspan='5'>Tidak ada data</td></tr>");
        ?>
      </tbody>
      </table>
      <div class="box-footer">
        <div class="col-sm-1">
          <a data-toggle="modal" data-target="#add_data_Modal" class="btn btn-primary pull-right edit"><span class="fa fa-plus"></span> Tambah User</a>
        </div>
     </div>
    </div>


  <!-- Tambah data -->
  <div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Data User</h4>
        </div>
        <div class="modal-body">
          <form method="post" id="form_tambah_user" action="<?php echo base_url('main/insert_user'); ?>">
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Username" required="required">
            </div>
            <div class="form-group" id="pw1">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="required">
            </div>
            <div class="form-group" id="pw2">
              <label for="password2">Konfirmasi Password</label>
              <input type="password" class="form-control" id="password2" name="password2" placeholder="Konfirmasi Password" required="required">
              <span class="help-block"></span>
            </div>
            <div class="form-group">
              <label for="id_karyawan">Karyawan</label>
              <select name="id_karyawan" class="form-control">
                  <option value="-1" selected="selected" disabled="disabled">-- Pilih Karyawan --</option>
                <?php
                foreach ($karyawans as $row)
                    if (!in_array($row->id, $karyawan))
                      printf("<option value='%d'>%s</option>", $row->id, $row->nama);
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="Status">Hak Akses</label>
              <select name="status" class="form-control">
                <option value="1">Administrator</option>
                <option value="2">Bendahara</option>
                <option value="3">Pengguna</option>
              </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary pull-left"><span class="fa fa-save"></span> Simpan</button>
          </form>
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Reset Password -->
  <div class="modal fade" id="Reset-Password" role="dialog">
    <form method="post">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            <h4 class="modal-title" id="myAddLabel">Peringatan!</h4>
          </div>
          <div class="modal-body">
            <div class="box-body">
              <div align="center">
                <h4>Anda Yakin Ingin Mereset Ini?</h4>
              </div>
            </div>
            <div align="center">
              <a href="" class="btn btn-danger btnresetnmodal">Ya</a>
              <button class="btn btn-default" data-dismiss="modal">Tidak</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

<!-- hapus user -->
<div class="modal fade" id="user_hapus" role="dialog">
  <form method="post" action="<?php echo base_url('main/user_hapus');?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
          <h4 class="modal-title" id="myAddLabel">Peringatan!</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div align="center">
              <h4>Anda Yakin Ingin Mereset Ini?</h4>
            </div>
          </div>
          <div align="center">
            <a href="" class="btn btn-danger btnDeleteUsermodal">Ya</a>
            <button class="btn btn-default" data-dismiss="modal">Tidak</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
</section>
</div>
</body>
