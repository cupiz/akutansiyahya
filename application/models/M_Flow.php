<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Flow extends CI_Model{

  public function union($id){
    $this->db->select("*");
    $this->db->from("pemasukan");
    $query1 = $this->db->get_compiled_select(); //reset the query like get()

    $this->db->select("*");
    $this->db->from("beban");
    $query2 = $this->db->get_compiled_select();

    $query = $this->db->query($query1." UNION ".$query2);
  }

  public function union2(){
    $res = $this->db->query("SELECT '1' as Type, id, tanggal, jumlah, jenis_pemasukan, penerima, deskripsi FROM pemasukan UNION SELECT '2', id_beban,tanggal, jumlah, jenis_beban, penerima, deskripsi FROM beban ORDER by tanggal DESC");
    return $res->result();
  }

  public function getJenisPemasukan($id){
		$res = $this->db->where('id_jenis', $id)->get("jenis_pemasukan")->row();
		return $res->nama_jenis;
	}

  public function getJenisPengeluaran($id){
		$res = $this->db->where('id_jenis', $id)->get("jenis_beban")->row();
		return $res->nama_jenis;
	}
}
