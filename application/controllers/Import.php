<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Import extends CI_Controller
{
 public function __construct()
 {
  parent::__construct();
  $this->load->model('M_Excel');
  $this->load->library('excel');
 }

 function index()
 {
   $data['title'] = "Import";
   $data['menu'] = 2;
   $data['username'] = $this->M_Dummy->getName($this->username);

   $this->M_System->view('excel.php', $data);
}

 function fetch()
 {
  $data = $this->M_Excel->select();
  $output = '
  <h3 align="center">Total Data - '.$data->num_rows().'</h3>
  <table class="table table-striped table-bordered">
   <tr>
    <th>Tanggal</th>
    <th>Jumlah</th>
    <th>Jenis Pemasukan</th>
    <th>Penerima</th>
    <th>Deskripsi</th>
   </tr>
  ';
  foreach($data->result() as $row)
  {
   $output .= '
   <tr>
    <td>'.$row->tanggal.'</td>
    <td>'.$row->jumlah.'</td>
    <td>'.$row->jenis_pemasukan.'</td>
    <td>'.$row->penerima.'</td>
    <td>'.$row->deskripsi.'</td>
   </tr>
   ';
  }
  $output .= '</table>';
  echo $output;
 }

 function import()
 {
  if(isset($_FILES["file"]["name"]))
  {
   $path = $_FILES["file"]["tmp_name"];
   $object = PHPExcel_IOFactory::load($path);
   foreach($object->getWorksheetIterator() as $worksheet)
   {
    $highestRow = $worksheet->getHighestRow();
    $highestColumn = $worksheet->getHighestColumn();
    for($row=2; $row<=$highestRow; $row++)
    {
     $tanggal = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
     $jumlah = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
     $jenis_penmasukan = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
     $penerima = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
     $deskripsi = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
     $data[] = array(
      'tanggal'         => date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($tanggal)),
      'jumlah'          => $jumlah,
      'jenis_pemasukan' => $jenis_penmasukan,
      'penerima'        => $penerima,
      'deskripsi'       => $deskripsi
     );
    }
   }
   $this->M_Excel->insert($data);
   echo 'Import Data Berhasil';
  }
 }
}

?>
