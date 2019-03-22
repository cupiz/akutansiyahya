<body>
    <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Laporan Arus Kas</h3>
                  <div class="col-xsm-1 pull-right">
                    <a href="<?php echo base_url('admin/calender'); ?>"><button class="form-control btn btn-default btn-sm" data-toggle="modal" data-target=><i class="glyphicon glyphicon glyphicon-calendar"></i></button></a>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box">
                  <div class="box-header">
                    <div class="col-sm-1">
                      <a href="<?php echo base_url('laporanpdf/flow'); ?>"><button class="form-control btn btn-default btn-sm" data-toggle="modal" data-target=""><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Eksport Data</button></a>
                    </div>
             </div>
    <div class="box-body">
    <table id="expensetable" class="table table-bordered table-hover custometable">
      <thead>
        <tr role="row">
          <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nomor: activate to sort column descending">#</th>
          <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Tanggal: activate to sort column descending">Tanggal</th>
          <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Jumlah: activate to sort column ascending">Jumlah</th>
          <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Jenis Pemasukan: activate to sort column ascending">Jenis</th>
          <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Sumber: activate to sort column ascending">Penerima/Pengirim</th>
          <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Keterangan: activate to sort column ascending">Keterangan</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 1;
        $pemasukan = 0;
        $pengeluaran = 0;
  foreach ($dataa as $key) {

  if($key->Type==1){
    $pemasukan += $key->jumlah;
    echo "<tr bgColor='#bcffc4'>";
  }
  else{
    $pengeluaran += $key->jumlah;
    echo "<tr bgColor='#ffa8b8'>";
  }
        ?>
            <td><?php echo $i; ?> </td>
            <td><?php echo date("d-m-Y", strtotime($key->tanggal)); ?></td>
            <td><?php echo $key->jumlah; ?></td>
            <?php if($key->Type==1) {?>
            <td><?php echo $this->M_Flow->getJenisPemasukan($key->jenis_pemasukan); ?></td>
          <?php } else {

          ?>
          <td><?php echo $this->M_Flow->getJenisPengeluaran($key->jenis_pemasukan); ?></td>
        <?php } ?>
            <td><?php echo $key->penerima; ?></td>
            <td><?php echo $key->deskripsi; ?></td>
        </tr>
      <?php $i++;} ?>
      <tbody>
    </table>
  </div>
       </div>
</section>
</div>
</body>
