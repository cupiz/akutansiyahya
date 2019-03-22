<body>
    <section class="content">
  <div class="row">
        <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Jenis Pemasukan</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget=""><i class=""></i></button>
                </div>
            </div>
               <div class="box-body">
                 <table class="table table-striped">
                   <thead>
                     <th>#</th>
                     <th>Jenis Pemasukan</th>
                   </thead>
                   <tbody>
                      <?php
                      $i = 1;
                      foreach ($dd as $row) {   ?>
                        <tr>
                          <td><?php echo $i; ?> </td>
                          <td><?php echo $row['nama_jenis']; ?></td>
                          <td class="text-center">
                          <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-toggle-position="left" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                  <li class=""><a href="" data-id="<?php echo $row['id_jenis']; ?>" data-toggle="modal" data-target="#update-Crevenue" class="btneditjenispemasukan"></i>Ubah</li>
                                  <li class=""><a href="" data-id="<?php echo $row['id_jenis']; ?>" data-toggle="modal" data-target="#delete-Crevenue" class="btndeljenispemasukan"></i>Hapus</li>
                                </ul>
                         </div>
                        </td>
                        </tr>
                  <?php $i++; } ?>
                </tbody>
              </table>
              <div class="row">
              <div class="col-sm-2 ">
                <button class="form-control btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah-Crevenue"><i class="glyphicon glyphicon-plus-sign"></i>Tambah Data</button></a>
              </div>
            </div>
            </div>
          </div>
        </div>

          <!-- Latest Incomes List-->
    <div class="col-md-6">
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Jenis Pengeluaran</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget=""><i class=""></i></button>
            </div>
        </div>
          <div class="box-body">
            <table class="table table-striped">
              <thead>
                <th>#</th>
                <th>Jenis Pengeluaran</th>
              </thead>
              <tbody>
                   <?php foreach ($dd2 as $row) {   ?>
                     <tr>
                     <td><?php echo $row['id_jenis']; ?> </td>
                     <td><?php echo $row['nama_jenis']; ?></td>
                     <td class="text-center">
                     <div class="btn-group">
                       <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-toggle-position="left" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></button>
                           <ul class="dropdown-menu dropdown-menu-right">
                             <li><a href="#" data-id="<?php echo $row['id_jenis']; ?>" data-toggle="modal" data-target="#update-Cexpense" class="btneditjenispengeluaran">Ubah</a></li>
                             <li><a href="#" data-id="<?php echo $row['id_jenis']; ?>" data-toggle="modal" data-target="#delete-Cexpense" class="btndeljenispengeluaran">Hapus</a></li>
                           </ul>
                    </div>
                   </td>
                   </tr>
             <?php } ?>
           </tbody>
         </table>
         <div class="row">
         <div class="col-sm-2 ">
           <button class="form-control btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah-Cexpense"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button></a>
         </div>
          </div>
      </div>
    </div>
</div>

 <!-- insert modal Crevenue -->
 <div id="tambah-Crevenue" class="modal fade" role="dialog">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Tambah Jenis Pemasukan</h4>
       </div>
       <form method="post" action="<?php echo base_url('main/insert_jenis_pemasukan')?>">
         <div class="modal-body" id="Modal_Add">
           <div class="form-group">
               <label class="control-label" for="jenis_pemasukan">Jenis Pemasukan</label>
               <input type="text" name="jenis_pemasukan" class="form-control" id="jenis_pemasukan" required="required">
           </div>
         </div>
         <div class="modal-footer">
           <input type="submit" class="btn btn-success" id="btn_save" name="tambah" value="Simpan">
         </div>
       </form>
     </div>
   </div>
 </div>

 <!-- update modal Crevenue -->
 <div id="update-Crevenue" class="modal fade" role="dialog">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Update Jenis Pemasukan</h4>
       </div>
       <form method="post" action="<?php echo base_url('main/update_jenis_pemasukan');?>" id="form_update_Crevenue">
         <div class="modal-body" id="Modal_Add">
           <div class="form-group">
               <label class="control-label" for="nama">Jenis Pemasukan</label>
               <input type="hidden" name="id_jenis" id="id_jenis">
               <input type="text" name="jenis_pemasukan" id="jenis_pemasukan" class="form-control"  required="required">
           </div>
         <div class="modal-footer">
           <input type="submit" class="btn btn-success" id="btn_save" name="update" value="Simpan">
         </div>
       </form>
     </div>
   </div>
 </div></div>

 <!-- delete modal Crevenue -->
 <div class="modal fade" id="delete-Crevenue" role="dialog">
   <form method="post" action="<?php echo base_url('main/delete_jenis_revenue')?>">
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
             <a href="" class="btn btn-danger btndeljenispemasukanmodal">Ya</a>
             <button class="btn btn-default" data-dismiss="modal">Tidak</button>
           </div>
         </div>
       </div>
     </div>
   </form>
 </div>

<!-- CExpense -->
 <!-- insert modal Cexpense  -->
 <div id="tambah-Cexpense" class="modal fade" role="dialog">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Tambah Jenis Pengeluaran</h4>
       </div>
       <form method="post" action="<?php echo base_url('main/insert_jenis_pengeluaran')?>">
         <div class="modal-body" id="Modal_Add">
           <div class="form-group">
               <label class="control-label" for="jenis_pengeluaran">Jenis Pengeluaran</label>
               <input type="text" name="jenis_pengeluaran" class="form-control" id="jenis_pengeluaran" required="required">
           </div>
         </div>
         <div class="modal-footer">
           <input type="submit" class="btn btn-success" id="btn_save" name="tambah" value="Simpan">
         </div>
       </form>
     </div>
   </div>
 </div>

 <!-- update modal Cexpense  -->
 <div id="update-Cexpense" class="modal fade" role="dialog">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Update Jenis Pengeluaran</h4>
       </div>
       <form method="post" action="<?php echo base_url('main/update_jenis_pengeluaran');?>" id="form_update_Cexpense">
         <div class="modal-body" id="Modal_Add">
           <div class="form-group">
               <label class="control-label" for="nama">Jenis Pengeluaran</label>
               <input type="hidden" name="id_jenisPengeluaran" id="id_jenisPengeluaran">
               <input type="text" name="jenis_pengeluaran" id="jenis_pengeluaran" class="form-control"  required="required">
           </div>
         <div class="modal-footer">
           <input type="submit" class="btn btn-success" id="btn_save" name="update" value="Simpan">
         </div>
       </form>
     </div>
   </div>
 </div></div>

 <!-- delete modal Cexpense  -->
 <div id="delete-Cexpense" class="modal fade" role="dialog">
   <form method="post" action="<?php echo base_url('main/delete_jenis_expense')?>">
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
             <a href="" class="btn btn-danger btndeljenispengeluaranmodal">Ya</a>
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
