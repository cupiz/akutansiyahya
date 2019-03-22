<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Dummy extends CI_Model{
  function get() {
  $query = $this->db->select('*')->from('users')->join('karyawan', 'users.id_karyawan=karyawan.id')->get();
  return $query->result();
 }

 function hapus($username){
   $this->db->where('username', $username);
   $this->db->delete('users');
 }

  function getIdByUsername($username) {
    $query = $this->db->select('*')->from('users')->where('username', $username)->get();
    $query = $query->row();
    return $query->id_karyawan;
  }

  function getFromUsername($username) {
    $id_karyawan 	= $this->getIdByUsername($username);
    $query 			  = $this->db->select('*')->from('karyawan')->where('id', $id_karyawan)->get();
    return $query->result();
  }

  function getName($username){
    $name = "NULL";
    $query = $this->getFromUsername($username);
    foreach ($query as $row)
      $name = $row->nama;
      return $name;
    }

  function getData($id) {
    $res = $this->db->select('*')->from('karyawan')->where('id',$id)->get();
    return $res->result_array();
    }

  function getPassword($username){
    $query = $this->db->select('*')->from('users')->where('username',$username)->get();
    $query = $query->row();
    return $query->password;
  }

  function edit($username, $data) {
		$this->db->where('username', $username);
		$this->db->update('users', $data);
	}

  public function GetWhere($table, $data){
      $res=$this->db->get_where($table, $data);
      return $res->result();
  }

  function update($id, $data)
	{
		$this->db->where("id", $id);
		$this->db->update("karyawan", $data);
	}
  function getKaryawan(){
    $query = $this->db->get('karyawan');
    return $query->result();
  }
  function insert_user($table, $data){
      $res = $this->db->insert($table, $data);
      return $res;
    }

 function delete1($table, $id){
   $this->db->where("username", $id);
   $this->db->delete($table);
      }
  function getStatus($status){
    $query = $this->db->select('*')->from('users')->where('status',$status)->get();
    $query = $query->row();
  }
  }
