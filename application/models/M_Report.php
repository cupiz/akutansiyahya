<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Report extends CI_Model{
  public function groupby(){
    /*
    $res = $this->db->query("SELECT '1' as Type, MONTH(tanggal) as bulan ,YEAR(tanggal) as tahun, SUM(jumlah) as total FROM pemasukan GROUP BY MONTH(tanggal), YEAR(tanggal) UNION
    SELECT '2', MONTH(tanggal) as bulan ,YEAR(tanggal) as tahun, SUM(jumlah) FROM beban GROUP BY MONTH(tanggal), YEAR(tanggal)");
    */

    $res = $this->db->query("SELECT MONTH(tanggal) as bulan ,YEAR(tanggal) as tahun, SUM(jumlah) as total from pemasukan group by MONTH(tanggal), YEAR(tanggal)");
    return $res->result();
  }

  function getPemasukan($tahun, $bulan) {
    $res = $this->db->query("SELECT SUM(jumlah) as total_pemasukan FROM pemasukan WHERE tanggal LIKE '" . $tahun . "-" . $bulan . "-%'");
    return $res->row();
  }

  function getPengeluaran($tahun, $bulan) {
    $res = $this->db->query("SELECT SUM(jumlah) as total_pengeluaran FROM beban WHERE tanggal LIKE '" . $tahun . "-" . $bulan . "-%'");
    return $res->row();
  }

  function dummy_revenue($tahun, $bulan){
    $res = $this->db->query("SELECT nama_jenis AS kategori, SUM(jumlah) AS total FROM pemasukan JOIN jenis_pemasukan ON pemasukan.jenis_pemasukan=jenis_pemasukan.id_jenis WHERE tanggal LIKE '" . $tahun . "-" . $bulan . "-%' GROUP BY jenis_pemasukan");
    return $res->result();
}

  function dummy_revenue2($tahun, $bulan){
    $res = $this->db->query("SELECT nama_jenis AS kategori, SUM(jumlah) AS total FROM beban JOIN jenis_beban ON beban.jenis_beban=jenis_beban.id_jenis WHERE tanggal LIKE '" . $tahun . "-" . $bulan . "-%' GROUP BY jenis_beban");
    return $res->result();
}

function select()
{
 $this->db->order_by('id', 'DESC');
 $query = $this->db->get('pemasukan');
 return $query;
}

function insert($data)
{
 $this->db->insert_batch('pemasukan', $data);
}
}
