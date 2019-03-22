<?php
defined('BASEPATH') OR exit ('No direct script access allowed!');

class dAuth extends CI_Controller
{
	function __construct() {
		parent::__construct();
	}

	function login() {
		if ($this->session->userdata('isLogin') == 1)
			redirect(base_url(''));
			$this->load->view('login.php');
	}

	function logout() {
		redirect('main/logout');
	}
}
