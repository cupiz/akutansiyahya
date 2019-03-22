<?php
class M_Excel extends CI_Model
{
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
