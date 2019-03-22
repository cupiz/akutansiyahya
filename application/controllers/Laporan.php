<?php
class Laporan extends CI_Controller{
public function index(){
  $this->load->view('profit');
}

public function json(){
  header('Content-Type: application/json');

  $this->load->model('M_Report');
  $data_json = array();
  $tahun = date("Y");

  for($i = 1; $i <= 12; $i++) {
    $data_json[] = array(
        'tahun' => $tahun,
        'bulan' => date("F", mktime(0, 0, 0, $i, 10)),
        'total_pemasukan' => $this->M_Report->getPemasukan($tahun, str_pad($i, 2, '0', STR_PAD_LEFT))->total_pemasukan,
        'total_pengeluaran' => $this->M_Report->getPengeluaran($tahun, str_pad($i, 2, '0', STR_PAD_LEFT))->total_pengeluaran
      );
  }


  echo json_encode($data_json, JSON_PRETTY_PRINT);
}

public function profit(){
  header('Content-Type: application/json');

  $this->load->model('M_Report');
  $data_json = array();
  $tahun = date("Y");

  for($i = 1; $i <= 12; $i++) {
    $data_json[] = array(
        'tahun' => $tahun,
        'bulan' => date("F", mktime(0, 0, 0, $i, 10)),
        'profit' => $this->M_Report->getPemasukan($tahun, str_pad($i, 2, '0', STR_PAD_LEFT))->total_pemasukan - $this->M_Report->getPengeluaran($tahun, str_pad($i, 2, '0', STR_PAD_LEFT))->total_pengeluaran
      );
  }


  echo json_encode($data_json, JSON_PRETTY_PRINT);

}

public function dummy($tahun, $bulan) {
  $this->load->model('M_Report');
  $data = $this->M_Report->getPengeluaran($tahun, $bulan);
  echo $data->total_pengeluaran;
}
}
