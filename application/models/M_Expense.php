<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Expense extends CI_Model{
	public function GetPengeluaran(){
		$res = $this->db->select('*')->from('beban')->join('jenis_beban', 'beban.jenis_beban=jenis_beban.id_jenis')->get();
		return $res->result_array();
	}

	public function GetPengeluaranId($id){
		$res = $this->db->select('*')->from('beban')->join('jenis_beban', 'beban.jenis_beban=jenis_beban.id_jenis')->where("id_beban", $id)->get();
		return $res->result();
	}

  public function insert($table, $data){
    $res = $this->db->insert($table, $data);
    return $res;
  }

	public function update($id, $data)
	{
		$this->db->where("id_beban", $id);
		$this->db->update("beban", $data);
	}

  public function delete1($table, $where){
    $res = $this->db->delete($table, $where);
    return $res;
  }
	public function delete($table, $id){
		$this->db->where("id_beban", $id);
		$this->db->delete($table);
	}

	public function GetWhere($table, $data){
      $res=$this->db->get_where($table, $data);
      return $res->result();
  }
	public function edit($id)
	{
		$this->db->select('*');
		$this->db->from('beban');
		$this->db->where('id',$id);
		$query =$this->db->get();
		return $query->result();
	}
 public function insert2($data){
   $sql = "INSERT INTO beban VALUES('','".$data['tanggal']."','".$data['jumlah']."','".$data['jenis_beban']."','".$data['penerima']."','".$data['deskripsi']."' ) ";
   $this->db->query($sql);
 }
 public function getJenisPengeluaran(){
	 $res = $this->db->get("jenis_beban");
	 return $res->result_array();
 }
 public function insertJenisPengeluaran($table, $data){
	 $res = $this->db->insert($table, $data);
	 return $res;
 }

 public function updateJenisPengeluaran($id, $data)
 {
	 $this->db->where("id_jenis", $id);
	 $this->db->update("jenis_beban", $data);
 }

 public function deleteJenisPengeluaran($table, $where){
	 $res = $this->db->delete($table, $where);
	 return $res;
 }

 public function GetWhereJenis($table, $data){
			 $res=$this->db->get_where($table, $data);
			 return $res->result();
	 }
}
