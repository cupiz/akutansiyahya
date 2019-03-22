<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller
{
  function __construct() {
    parent::__construct();
  }
	function index()
	{
		if ($this->session->userdata('isLogin') != 1)
			redirect(base_url('dAuth/login'));
		else
		{
			$username 	= $this->session->userdata('username');
		 	$status     = $this->session->userdata('status');

		if ($status == 1)
			redirect(base_url('Admin'));
		else if ($status == 2)
	 		redirect(base_url('Bendahara'));
    else if ($status == 3)
      redirect(base_url('User'));
	 	else
			echo "Gagal!!";
	}
	}
}
