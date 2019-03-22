<?php
Class Laporanpdf extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    //eksport pemasukan
    function pemasukan(){
        $w=35;
        $h=15;
        $pdf = new myPDF();
        $pdf->AddPage();
        // $pdf->Image('image/logo.png',10,10,20,20,'PNG');
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(190,7,'CV JENDERAL CORP PURWOKERTO',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'LAPORAN DATA PEMASUKAN KEUANGAN',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $x=$pdf->getx();
        $pdf->myCell($w,$h,$x,'Tanggal');
        $x=$pdf->getx();
        $pdf->myCell($w,$h,$x,'Jumlah');
        $x=$pdf->getx();
        $pdf->myCell($w,$h,$x,'Jenis Pemasukan');
        $x=$pdf->getx();
        $pdf->myCell($w,$h,$x,'Pengirim');
        $x=$pdf->getx();
        $pdf->myCell($w,$h,$x,'Deskripsi');
        $pdf->SetFont('Arial','',10);
        $pdf->Ln();

        $data = $this->db->select('*')->from('pemasukan')->join('jenis_pemasukan', 'pemasukan.jenis_pemasukan=jenis_pemasukan.id_jenis')->get();
        $data = $data->result();

        foreach ($data as $row){
             $x=$pdf->getx();
             $pdf->myCell($w,$h,$x,date("d-m-Y", strtotime($row->tanggal)));
             $x=$pdf->getx();
             $pdf->myCell($w,$h,$x,$row->jumlah);
             $x=$pdf->getx();
             $pdf->myCell($w,$h,$x,$row->nama_jenis);
             $x=$pdf->getx();
             $pdf->myCell($w,$h,$x,$row->penerima);
             $x=$pdf->getx();
             $pdf->myCell($w,$h,$x,$row->deskripsi);
             $pdf->Ln();
        }
        $pdf->Output();
    }

    function pengeluaran(){
          $w=35;
          $h=15;
          $pdf = new myPDF();
          $pdf->AddPage();
          // $pdf->Image('image/logo.png',10,10,20,20,'PNG');
          $pdf->SetFont('Arial','B',16);
          $pdf->Cell(190,7,'CV JENDERAL CORP PURWOKERTO',0,1,'C');
          $pdf->SetFont('Arial','B',12);
          $pdf->Cell(190,7,'LAPORAN DATA PENGELUARAN KEUANGAN',0,1,'C');
          // Memberikan space kebawah agar tidak terlalu rapat
          $pdf->Cell(10,7,'',0,1);
          $pdf->SetFont('Arial','B',10);
          $x=$pdf->getx();
          $pdf->myCell($w,$h,$x,'Tanggal');
          $x=$pdf->getx();
          $pdf->myCell($w,$h,$x,'Jumlah');
          $x=$pdf->getx();
          $pdf->myCell($w,$h,$x,'Jenis Pengeluaran');
          $x=$pdf->getx();
          $pdf->myCell($w,$h,$x,'Penerima');
          $x=$pdf->getx();
          $pdf->myCell($w,$h,$x,'Deskripsi');
          $pdf->SetFont('Arial','',10);
          $pdf->Ln();

          $data = $this->db->select('*')->from('beban')->join('jenis_beban', 'beban.jenis_beban=jenis_beban.id_jenis')->get();
          $data = $data->result();
          foreach ($data as $row){
               $x=$pdf->getx();
               $pdf->myCell($w,$h,$x,date("d-m-Y", strtotime($row->tanggal)));
               $x=$pdf->getx();
               $pdf->myCell($w,$h,$x,$row->jumlah);
               $x=$pdf->getx();
               $pdf->myCell($w,$h,$x,$row->nama_jenis);
               $x=$pdf->getx();
               $pdf->myCell($w,$h,$x,$row->penerima);
               $x=$pdf->getx();
               $pdf->myCell($w,$h,$x,$row->deskripsi);
               $pdf->Ln();
          }
          $pdf->Output();
      }

      function flow(){
        $w=35;
        $h=15;
        $pdf = new myPDF();
        $pdf->AddPage();
        // $pdf->Image('image/logo.png',10,10,20,20,'PNG');
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(190,7,'CV JENDERAL CORP PURWOKERTO',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'LAPORAN ARUS KEUANGAN',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $x=$pdf->getx();
        $pdf->myCell($w,$h,$x,'Tanggal');
        $x=$pdf->getx();
        $pdf->myCell($w,$h,$x,'Jumlah');
        $x=$pdf->getx();
        $pdf->myCell($w,$h,$x,'Jenis');
        $x=$pdf->getx();
        $pdf->myCell($w,$h,$x,'Penerima / Pengirim');
        $x=$pdf->getx();
        $pdf->myCell($w,$h,$x,'Deskripsi');
        $pdf->SetFont('Arial','',10);
        $pdf->Ln();

        $data = $this->db->query("SELECT '1' as Type, tanggal, jumlah, jenis_pemasukan, penerima, deskripsi FROM pemasukan UNION SELECT '2', tanggal, jumlah, jenis_beban, penerima, deskripsi FROM beban ORDER by tanggal DESC");
        $data = $data->result();
        foreach ($data as $row){
             $x=$pdf->getx();
             $pdf->myCell($w,$h,$x,date("d-m-Y", strtotime($row->tanggal)));
             $x=$pdf->getx();
             $pdf->myCell($w,$h,$x,$row->jumlah);
             $x=$pdf->getx();
             $pdf->myCell($w,$h,$x,$this->M_Flow->getJenisPengeluaran($row->jenis_pemasukan));
             $x=$pdf->getx();
             $pdf->myCell($w,$h,$x,$row->penerima);
             $x=$pdf->getx();
             $pdf->myCell($w,$h,$x,$row->deskripsi);
             $pdf->Ln();
        }
        $pdf->Output();
    }
      }
