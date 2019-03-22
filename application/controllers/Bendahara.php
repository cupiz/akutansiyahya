<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bendahara extends CI_Controller{
  function __construct(){
    parent::__construct();

    if($this->session->userdata('isLogin') != 1 ) redirect(base_url('login.php'));
    if($this->session->userdata('status') != 2 ) redirect(base_url(''));

    $this->username = $this->session->userdata('username');
    $this->user_id  = $this->session->userdata('user_id');
  }

  public function index(){
    $data['title'] = "Bendahara";
    $data['menu'] = 0;
    $data['username'] = $this->M_Dummy->getName($this->username);

    $this->M_System->view('bendahara/bendaharaHome.php', $data);
  }

  public function pemasukan(){
    $data['title'] = "Pemasukan";
    $data['menu'] = 1;
    $data['username'] = $this->M_Dummy->getName($this->username);

    $data['data'] = $this->M_Income->GetPemasukan();
    $data['dd'] 	= $this->M_Income->getJenisPemasukan();

    $this->M_System->view('bendahara/BdataIncome.php', $data);
  }

 public function pengeluaran(){
   $data['title'] = "Pemasukan";
   $data['menu'] = 2;
   $data['username'] = $this->M_Dummy->getName($this->username);

   $data['data'] = $this->M_Expense->GetPengeluaran();
   $data['dd'] 	= $this->M_Expense->getJenisPengeluaran();

   $this->M_System->view('bendahara/BdataExpense.php', $data);
}

  function profil(){
    $data['title'] = "Profil";
    $data['menu'] = 7;
    $data['username'] = $this->M_Dummy->getName($this->username);

    $data['data'] = $this->M_Dummy->getData($this->M_Dummy->getIdByUsername($this->username));

    $this->M_System->view('profil.php', $data);
  }
}
