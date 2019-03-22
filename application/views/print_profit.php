
  <body>
        <!-- Main content -->
    <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Profit</h3>
                </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="bar-chart-profit" style="height: 300px;"></div>
            </div>
          </div>
        </div>

<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Laba Rugi (bulan)</h3>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <thead>
                  <th>Kategori</th>
                  <?php for($i=1; $i<=12; $i++) {
                    echo "<th>" . date("F", mktime(0, 0, 0, $i, 10)) . "</th>";
                  } ?>
                </thead>
                <tbody>
                  <tr>
                    <td>Pemasukan</td>
                    <?php
                    $tahun = date("Y");
                    for($i=1; $i<=12; $i++) {
                      $pemasukan = $this->M_Report->getPemasukan($tahun, str_pad($i, 2, '0', STR_PAD_LEFT))->total_pemasukan;
                      echo "<td>Rp. " . ($pemasukan ? $pemasukan : 0) . "</td>";
                    } ?>
                  </tr>
                  <tr>
                    <td>Pengeluaran</td>
                    <?php
                    $tahun = date("Y");
                    for($i=1; $i<=12; $i++) {
                      $pengeluaran = $this->M_Report->getPengeluaran($tahun, str_pad($i, 2, '0', STR_PAD_LEFT))->total_pengeluaran;
                      echo "<td>Rp. " . ($pengeluaran ? $pengeluaran : 0) . "</td>";
                    } ?>
                  </tr>
                  <tr>
                    <td bgColor="#a6a7ad">Laba Rugi</td>
                    <?php
                    $tahun = date("Y");
                    for($i=1; $i<=12; $i++) {
                      echo "<td bgColor='#a6a7ad'>Rp. " . ($this->M_Report->getPemasukan($tahun, str_pad($i, 2, '0', STR_PAD_LEFT))->total_pemasukan - $this->M_Report->getPengeluaran($tahun, str_pad($i, 2, '0', STR_PAD_LEFT))->total_pengeluaran) . "</td>";
                    } ?>
                  </tr>
                </tbody>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
</section>
</div>
</body>
