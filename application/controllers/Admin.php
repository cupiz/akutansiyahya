<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
  function __construct(){
    parent::__construct();

    if($this->session->userdata('isLogin') != 1 ) redirect(base_url('login.php'));
    if($this->session->userdata('status') != 1 ) redirect(base_url(''));

    $this->username = $this->session->userdata('username');
    $this->user_id  = $this->session->userdata('user_id');
  }

  public function index(){
    $data['title'] = "Admin";
    $data['menu'] = 0;
    $data['username'] = $this->M_Dummy->getName($this->username);

    $this->M_System->view('admin/adminHome.php', $data);
  }
  public function pemasukan(){
    $data['title'] = "Pemasukan";
    $data['menu'] = 1;
    $data['username'] = $this->M_Dummy->getName($this->username);

    $data['data'] = $this->M_Income->GetPemasukan();
    $data['dd'] 	= $this->M_Income->getJenisPemasukan();

    $this->M_System->view('admin/dataIncome.php', $data);
  }

 public function pengeluaran(){
   $data['title'] = "Pemasukan";
   $data['menu'] = 2;
   $data['username'] = $this->M_Dummy->getName($this->username);

   $data['data'] = $this->M_Expense->GetPengeluaran();
   $data['dd'] 	= $this->M_Expense->getJenisPengeluaran();

   $this->M_System->view('admin/dataExpense.php', $data);
}

 public function profit(){
   $data['title'] = "Profit";
   $data['menu'] = 3;
   $data['username'] = $this->M_Dummy->getName($this->username);

   $this->M_System->view('profit',$data);
}
public function print_profit(){
    $data['title'] = "Profit";
    $data['menu'] = 3;
    $data['username'] = $this->M_Dummy->getName($this->username);

    $this->M_System->view('print_profit',$data);
  }
 public function flow(){
   $data['title'] = "Arus Kas";
   $data['menu'] = 4;
   $data['username'] = $this->M_Dummy->getName($this->username);
   $data['dataa'] = $this->M_Flow->union2();

   $this->M_System->view('flow', $data);
}
 function calender(){
   $data['title'] = "Kalender View";
   $data['menu'] = 4;
   $data['username'] = $this->M_Dummy->getName($this->username);

   $this->M_System->view('calender', $data);
}
 public function user(){
   $args = func_get_args();

   $data['title'] = "User";
   $data['menu'] = 5;
   $data['username'] = $this->M_Dummy->getName($this->username);
   $data['user'] = $this->M_Dummy->get();
   $data['karyawans'] = $this->M_Dummy->getKaryawan();

	if (!$args) {
		$this->M_System->view('admin/user.php', $data);
		}
  else if ($args[0] == "hapus" && $args[1]) {
		redirect('/main/user_hapus/' . $args[1]);
		}
	else {
		redirect("/admin/user");
		}
}

 public function kategori(){
   $data['title'] = "Kategori";
   $data['menu'] = 6;
   $data['username'] = $this->M_Dummy->getName($this->username);

   $data['dd'] 	= $this->M_Income->getJenisPemasukan();
   $data['dd2'] 	= $this->M_Expense->getJenisPengeluaran();
   $this->M_System->view('kategori.php', $data);
}

 public function profil(){
   $data['title'] = "Profil";
   $data['menu'] = 7;
   $data['username'] = $this->M_Dummy->getName($this->username);

   $data['data'] = $this->M_Dummy->getData($this->M_Dummy->getIdByUsername($this->username));

   $this->M_System->view('profil.php', $data);
 }
}
