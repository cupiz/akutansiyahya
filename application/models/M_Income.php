<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Income extends CI_Model{
	public function GetPemasukan(){
		$res = $this->db->select('*')->from('pemasukan')->join('jenis_pemasukan', 'pemasukan.jenis_pemasukan=jenis_pemasukan.id_jenis')->get();
    return $res->result_array();
	}

	public function GetPemasukanId($id){
		$res = $this->db->select('*')->from('pemasukan')->join('jenis_pemasukan', 'pemasukan.jenis_pemasukan=jenis_pemasukan.id_jenis')->where("id", $id)->get();
    return $res->result();
	}

  public function insert($table, $data){
    $res = $this->db->insert($table, $data);
    return $res;
  }

	public function update($id, $data)
	{
		$this->db->where("id", $id);
		$this->db->update("pemasukan", $data);
	}

  public function delete1($table, $where){
    $res = $this->db->delete($table, $where);
    return $res;
  }

	public function delete($table, $id){
		$this->db->where("id", $id);
		$this->db->delete($table);
  }

  public function GetWhere($table, $data){
      $res=$this->db->get_where($table, $data);
      return $res->result();
  }
	public function edit($id)
	{
		$this->db->select('*');
		$this->db->from('pemasukan');
		$this->db->where('id',$id);
		$query =$this->db->get();
		return $query->result();
	}
	public function getJenisPemasukan(){
		$res = $this->db->get("jenis_pemasukan");
		return $res->result_array();
	}
	public function insertJenisPemasukan($table, $data){
    $res = $this->db->insert($table, $data);
    return $res;
  }

	public function updateJenisPemasukan($id, $data)
	{
		$this->db->where("id_jenis", $id);
		$this->db->update("jenis_pemasukan", $data);
	}

  public function deleteJenisPemasukan($table, $where){
    $res = $this->db->delete($table, $where);
    return $res;
  }

	public function GetWhereJenis($table, $data){
	      $res=$this->db->get_where($table, $data);
	      return $res->result();
	  }
}
