<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
  function __construct(){
    parent::__construct();

    if($this->session->userdata('isLogin') != 1 ) redirect(base_url('login.php'));
    if($this->session->userdata('status') != 3 ) redirect(base_url(''));

    $this->username = $this->session->userdata('username');
    $this->user_id  = $this->session->userdata('user_id');
  }

  public function index(){
    $data['title'] = "User";
    $data['menu'] = 0;
    $data['username'] = $this->M_Dummy->getName($this->username);

    $this->M_System->view('user/user.php', $data);
  }

  public function profil(){
    $data['title'] = "Profil";
    $data['menu'] = 7;
    $data['username'] = $this->M_Dummy->getName($this->username);

    $data['data'] = $this->M_Dummy->getData($this->M_Dummy->getIdByUsername($this->username));

    $this->M_System->view('profil.php', $data);
  }
}
