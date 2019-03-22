<?php
class Flow extends CI_Controller{
  public function index(){
    $this->load->model('M_Flow');
    $datas = $this->M_Flow->union2();
    $data = array('data' => $datas);
    $this->load->view('flow', $data);
  }
}
