<!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Pemasukan dan Pengeluaran</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="bar-chart" style="height: 300px;"></div>
            </div>
          </div>
        </div>
      </div>
<div class="row">
          <div class="col-md-6">
            <!-- Data Pemasukan -->
            <div class="box box-primary">
              <div class="box-header">
                <h3 class="box-title">Data Pemasukan</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-times"></i></button>
              </div>
            </div>
              <div class="box-body chart-responsive">
                <div class="col-md-4">
                  <select name="dropdownbulan" id="dropdownbulan" class="form-control">
                    <?php for($i=1; $i<=12; $i++){
                      echo "<option value='".$i."'>".date("F", mktime(0, 0, 0, $i, 10))."</option>";
                    }
                    ?>
                  </select>
                </div>
                <div class="chart" id="pie-chart" style="height: 300px;"></div>
              </div>
            </div>
          </div>

          <!-- Data Pengeluaran -->
          <div class="col-md-6">
            <div class="box box-primary">
              <div class="box-header">
                <h3 class="box-title">Data Pengeluaran</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body chart-responsive">
                <div class="col-md-4">
                  <select name="dropdownbulan2" id="dropdownbulan2" class="form-control">
                    <?php for($i=1; $i<=12; $i++){
                      echo "<option value='".$i."'>".date("F", mktime(0, 0, 0, $i, 10))."</option>";
                    }
                    ?>
                  </select>
                </div>
                <div class="chart" id="pie-chart2" style="height: 300px;"></div>
              </div>
            </div>
          </div>
        </div>
</section>
</div>
