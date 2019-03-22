<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_System extends CI_Model{
  function view($layout, $data){
    	$this->load->view('layout/header.php', $data);
    	$this->load->view('layout/sidebar.php', $data);

      if ($layout != NULL){
        $this->load->view($layout,$data);
        $this->load->view('layout/footer.php');
      }
  }

  function getStatus(){
    return $this->session->userdata('status');
  }
}
