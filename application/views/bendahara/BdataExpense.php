<body>
    <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Pengeluaran</h3>
                </div>
                <!-- /.box-header -->
                <div class="box">
                    <div class="box-header">
                      <div class="col-sm-1">
                        <button class="form-control btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah-pengeluaran"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button></a>
                      </div>
                      <div class="col-sm-1">
                        <a href="<?php echo base_url('laporanpdf/pengeluaran'); ?>"><button class="form-control btn btn-default btn-sm" data-toggle="modal" data-target=""><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Eksport Data</button></a>
                      </div>
                      <div class="col-sm-1">
                        <button class="form-control btn btn-default btn-sm" data-toggle="modal" data-target="#import-file"><i class="glyphicon glyphicon glyphicon-floppy-open"></i>Import Data</button>
                      </div>
                    </div>

                <div class="box-body">
                  <table id="expensetable" class="table table-bordered table-hover custometable">
                    <thead>
                      <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nomor: activate to sort column descending">#</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Tanggal: activate to sort column descending">Tanggal</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Jumlah: activate to sort column ascending">Jumlah</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Jenis Pemasukan: activate to sort column ascending">Jenis Pengeluaran</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Sumber: activate to sort column ascending">Penerima</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Keterangan: activate to sort column ascending">Keterangan</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Aksi: activate to sort column ascending">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $i=1;
                        foreach ($data as $key)  {
                        ?>
                      <tr>
                          <td><?php echo $i ?></td>
                          <td><?php echo date("d-m-Y", strtotime($key['tanggal'])); ?></td>
                          <td><?php echo "Rp. " . number_format($key['jumlah'], 3); ?></td>
                          <td><?php echo $key['nama_jenis']; ?></td>
                          <td><?php echo $key['penerima']; ?></td>
                          <td><?php echo $key['deskripsi']; ?></td>
                          <td>
                            <button class="btn btn-warning btneditpengeluaran" data-id="<?php echo $key['id_beban']; ?>" data-toggle="modal" data-target="#update-pengeluaran"><i class="glyphicon glyphicon-pencil"></i>Ubah</button>
                            <button class="btn btn-danger btndelpengeluaran" data-id="<?php echo $key['id_beban']; ?>" data-toggle="modal" data-target="#delete-pengeluaran"><i class="glyphicon glyphicon-remove"></i>Hapus</button>
                          </td>
                      </tr>
                    <?php $i++;} ?>
                    <tbody>
                  </table>
                </div>

                  <!-- Modal Start -->
                  <!-- Modal Insert -->
          <div id="tambah-pengeluaran" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Tambah Data Pengeluaran</h4>
                </div>
                <form method="post" action="<?php echo base_url('main/insert_expense')?>">
                  <div class="modal-body" id="Modal_Add">
                    <div class="form-group">
                        <label class="control-label" for="date">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="date" required="required">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="amount">Jumlah</label>
                        <input type="text" name="jumlah" class="form-control" id="amount" required="required">
                    </div>
                    <div class="form-group">
                    <label class="control-label" for="jenis_pengeluaran">Jenis Pengeluaran</label>
                    <select name="jenis_beban" class="form-control">
                            <option label="Jenis Pengeluaran" disabled="" selected="select">Jenis Pengeluaran</option>
                                  <?php
                                         foreach ($dd as $key) {
                                   ?>
                            <option value="<?php echo $key['id_jenis']; ?>">
                              <?php echo $key['nama_jenis']; ?>
                            </option>
                                <?php } ?>
                    </select>
                  </div>
                    <div class="form-group">
                      <label class="control-label" for="penerima">Penerima</label>
                      <input type="text" name="penerima" class="form-control" id="penerima" required="required">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="date">Deskripsi</label>
                        <textarea type="date" name="deskripsi" class="form-control" id="deskripsi" required="required"></textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="submit" class="btn btn-success" id="btn_save" name="tambah" value="Simpan">
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- Update Modal -->
          <div id="update-pengeluaran" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Update Data Pengeluaran</h4>
                </div>
                <form method="post" action="<?php echo base_url('Main/update_expense')?>">
                  <div class="modal-body" id="Modal_Add">
                    <div class="form-group">
                        <label class="control-label" for="date">Tanggal</label>
                        <input type="hidden" name="id_beban" id="id_beban">
                        <input type="date" name="tanggal" id="tanggal" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="amount">Jumlah</label>
                        <input type="text" name="jumlah" id="jumlah" class="form-control" required="required">
                    </div>
                    <select name="jenis_beban" class="form-control" id="jenis_beban">
                            <option label="Jenis Pengeluaran"></option>
                                  <?php
                                         foreach ($dd as $key) {
                                   ?>
                            <option value="<?php echo $key['id_jenis']; ?>">
                              <?php echo $key['nama_jenis']; ?>
                            </option>
                                <?php } ?>
                    </select>
                    <div class="form-group">
                      <label class="control-label" for="penerima">Penerima</label>
                      <input type="text" name="penerima" id="penerima" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="date">Deskripsi</label>
                        <textarea type="date" name="deskripsi" id="deskripsi" class="form-control" required="required"></textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="submit" class="btn btn-success" id="btn_save" name="update" value="Simpan">
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- Modal Delete -->
        <div class="modal fade" id="delete-pengeluaran" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true" >
          <form method="post" action="<?php echo base_url('main/delete_expense')?>">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                  <h4 class="modal-title" id="myAddLabel">Peringatan!</h4>
                </div>
                <div class="modal-body">
                  <div class="box-body">
                    <div align="center">
                      <h4>Anda Yakin Ingin Menghapus Ini?</h4>
                    </div>
                  </div>
                  <div align="center">
                    <a href="" class="btn btn-danger btndelpengeluaranmodal">Ya</a>
                    <button class="btn btn-default" data-dismiss="modal">Tidak</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>

        <!-- Modal Import -->
        <div id="import-file" class="modal fade" role="dialog">
           <div class="modal-dialog">
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title">Import Data Pengeluaran</h4>
               </div>
               <form method="post" action="<?php echo base_url('main/import_pengeluaran') ?>" enctype="multipart/form-data">
                 <div class="modal-body">
                   <div class="form-group">
                       <label class="control-label" for="file">Pilih file</label>
                       <input type="file" name="file" id="file" required accept=".xls, .xlsx" required/>
                   </div>
                 </div>
                 <div class="modal-footer">
                   <input type="submit" class="btn btn-success" id="btn_upload" name="import" value="Simpan">
                 </div>
               </form>
             </div>
           </div>
          </div>
      </section>
  </div>
</body>
