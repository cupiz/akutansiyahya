<body>
  <section>
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Kalender Arus Kas</h3>
              <div class="col-xsm-1 pull-right">
                <a href="<?php echo base_url('admin/flow'); ?>"><button class="form-control btn btn-default btn-sm" data-toggle="modal" data-target=><i class="glyphicon glyphicon glyphicon-list"></i></button></a>
              </div>
            </div>
            <div class="box-body">
              <div id="calendar"></div>
            </div>
          </div>
        </div>
      </div>


      <div id="flowModal" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
              <h4 id="flowmodalTittle" class="modal-title"></h4>
            </div>
            <div id="flowModalBody" class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <p class="text-bold">Deskripsi</p>
                  <div class="row">
                    <div class="col-md-3">
                      <p>Jumlah</p>
                      <p>Jenis</p>
                      <p>Pengirim/Penerima</p>
                      <p>Deskripsi</p>
                    </div>
                    <div class="col-md-9">
                      <p>: <span id="flowtModaljumlah"></span></p>
                      <p>: <span id="flowtModaljenis"></span></p>
                      <p>: <span id="flowtModalpengirim"></span></p>
                      <p>: <span id="flowtModaldeskripsi"></span></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
    </section>
</div>
</body>
