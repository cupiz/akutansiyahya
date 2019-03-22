<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Import extends CI_Model
{
  function select()
  {
   $this->db->order_by('id', 'DESC');
   $query = $this->db->get('pemasukan');
   return $query;
  }

  function insert_pemasukan($data)
  {
   $this->db->insert_batch('pemasukan', $data);
  }
  function import_pemasukan(){
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
      $this->insert_pemasukan($data);
      echo 'Import Data Berhasil';
     }
    }

    function select_pengeluaran()
    {
     $this->db->order_by('id_beban', 'DESC');
     $query = $this->db->get('beban');
     return $query;
    }

    function insert_pengeluaran($data)
    {
     $this->db->insert_batch('beban', $data);
   }

    function import_pengeluaran(){
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
            $jenis_beban = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
            $penerima = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
            $deskripsi = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
            $data[] = array(
             'tanggal'         => date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($tanggal)),
             'jumlah'          => $jumlah,
             'jenis_beban'     => $jenis_beban,
             'penerima'        => $penerima,
             'deskripsi'       => $deskripsi
            );
        }
      }
        $this->insert_pengeluaran($data);
        echo 'Import Data Berhasil';
       }
      }
    }
    ?>
