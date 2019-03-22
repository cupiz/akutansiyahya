<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller
{

	function __construct() {
		parent::__construct();
	}
	//Main Function
	//Login and Logout
	function login() {
		$data['username']	= $this->input->post('username');
		$data['password']	= md5($this->input->post('password'));

		if (isset($data['username']) && isset($data['password'])) {
			$query = $this->db->select('*')->from('users')->where($data)->get();
			if ($query->num_rows() > 0) {
				$data['isLogin']	= 1;

				foreach($query->result() as $row) {
					$data['status']		= $row->status;
					$data['user_id']	= $row->id_karyawan;
					$data['username']	= $row->username;
				}

				$this->session->set_userdata($data);
				redirect(base_url(''));
			}
			else {
				$this->session->set_flashdata('status', '<p class="status alert alert-danger">Username atau password salah!</p>');
				redirect('dauth/login');
			}
		}
	}
	function logout() {
		$this->session->sess_destroy();
		redirect(base_url(''));
	}
	//End of Login

	//Dashboard
	//Function Passing Data Chart
	public function revenue($tahun, $bulan){
	  header('Content-Type: application/json');
	  $this->load->model('M_Report');
	  $data = $this->M_Report->dummy_revenue($tahun, $bulan);

		$data_json = array();
		$tahun = date("Y");

		foreach($data as $row) {
			$data_json[] = array(
					'label' => $row->kategori,
					'value' => $row->total
				);
	  }
	  echo json_encode($data_json, JSON_PRETTY_PRINT);
}

 public function expense($tahun, $bulan){
		header('Content-Type: application/json');
		$this->load->model('M_Report');
		$data = $this->M_Report->dummy_revenue2($tahun, $bulan);

		$data_json = array();
		$tahun = date("Y");

		foreach($data as $row) {
			$data_json[] = array(
					'label' => $row->kategori,
					'value' => $row->total
				);
		}
		echo json_encode($data_json, JSON_PRETTY_PRINT);
}
//End of Dashboard

//Revenue Function
 function insert_revenue(){
	 	$status = $this->M_System->getStatus();
		$data = array(
				'tanggal' 				=> $this->input->post('tanggal'),
				'jumlah' 					=> $this->input->post('jumlah'),
				'jenis_pemasukan' => $this->input->post('jenis_pemasukan'),
				'penerima' 				=> $this->input->post('penerima'),
				'deskripsi' 			=> $this->input->post('deskripsi')
				 );
		$data = $this->M_Income->insert('pemasukan', $data);
		redirect(base_url(($status == 1 ? "admin" : "bendahara"). "/pemasukan"));
}

 function update_revenue(){
	 $status = $this->M_System->getStatus();

		$id 				= $this->input->post(trim(strip_tags('id')));
		$tanggal		= $this->input->post(trim(strip_tags('tanggal')));
		$jumlah 		= $this->input->post(trim(strip_tags('jumlah')));
		$jenis 			= $this->input->post(trim(strip_tags('jenis_pemasukan')));
		$penerima 	= $this->input->post(trim(strip_tags('penerima')));
		$deskripsi 	= $this->input->post(trim(strip_tags('deskripsi')));

		$data = array(
		"tanggal" 				=> $tanggal,
		"jumlah" 					=> $jumlah,
		"jenis_pemasukan" => $jenis,
		"penerima" 				=> $penerima,
		"deskripsi" 			=> $deskripsi
		);

		$query = $this->M_Income->update($id, $data);
		redirect(base_url(($status == 1 ? "admin" : "bendahara"). "/pemasukan"));
		}

 function delete_revenue($id){
	 	$status = $this->M_System->getStatus();

		 $this->M_Income->delete('pemasukan', $id);
		 redirect(base_url(($status == 1 ? "admin" : "bendahara"). "/pemasukan"));
			 }

 function json_pemasukan($id){
		$datas = $this->M_Income->GetWhere('pemasukan', array('id' => $id));
		foreach($datas as $row) {
		$data = array(
			"id" 							=> $row->id,
			"tanggal" 				=> $row->tanggal,
			"jumlah" 					=> $row->jumlah,
			"jenis_pemasukan" => $row->jenis_pemasukan,
			"penerima" 				=> $row->penerima,
			"deskripsi" 			=> $row->deskripsi
		);
		}
		echo json_encode($data, JSON_PRETTY_PRINT);
}
function import_pemasukan(){
   $status = $this->M_System->getStatus();

	 $this->M_Import->import_pemasukan();
	 redirect(base_url(($status == 1 ? "admin" : "bendahara"). "/pemasukan"));

 }
//End of Revenue

//Expense Function
function insert_expense(){
		$status = $this->M_System->getStatus();
		$data = array(
				'tanggal' 				=> $this->input->post('tanggal'),
				'jumlah' 					=> $this->input->post('jumlah'),
				'jenis_beban' 		=> $this->input->post('jenis_beban'),
				'penerima' 				=> $this->input->post('penerima'),
				'deskripsi' 			=> $this->input->post('deskripsi')
				 );
		$data = $this->M_Expense->insert('beban', $data);
		redirect(base_url(($status == 1 ? "admin" : "bendahara"). "/pengeluaran"));
}

function update_expense(){
		  $status = $this->M_System->getStatus();

			$id 				= $this->input->post(trim(strip_tags('id_beban')));
			$tanggal		= $this->input->post(trim(strip_tags('tanggal')));
			$jumlah 		= $this->input->post(trim(strip_tags('jumlah')));
			$jenis 			= $this->input->post(trim(strip_tags('jenis_beban')));
			$penerima 	= $this->input->post(trim(strip_tags('penerima')));
			$deskripsi 	= $this->input->post(trim(strip_tags('deskripsi')));

			$data = array(
				"tanggal" 				=> $tanggal,
				"jumlah" 					=> $jumlah,
				"jenis_beban" 		=> $jenis,
				"penerima" 				=> $penerima,
				"deskripsi" 			=> $deskripsi
			);
			$query = $this->M_Expense->update($id, $data);
			redirect(base_url(($status == 1 ? "admin" : "bendahara"). "/pengeluaran"));
	}

function delete_expense($id){
		$status = $this->M_System->getStatus();

		$this->M_Expense->delete('beban', $id);
		redirect(base_url(($status == 1 ? "admin" : "bendahara"). "/pengeluaran"));
}

function json_pengeluaran($id){
		$datas = $this->M_Expense->GetWhere('beban', array('id_beban' => $id));
		foreach($datas as $row) {
			$data = array(
				"id" 							=> $row->id_beban,
				"tanggal" 				=> $row->tanggal,
				"jumlah" 					=> $row->jumlah,
				"jenis_beban" 		=> $row->jenis_beban,
				"penerima" 				=> $row->penerima,
				"deskripsi" 			=> $row->deskripsi
			);
		}
		echo json_encode($data, JSON_PRETTY_PRINT);
 }
 function import_pengeluaran(){
	 $status = $this->M_System->getStatus();

 	 $this->M_Import->import_pengeluaran();
 	 redirect(base_url(($status == 1 ? "admin" : "bendahara"). "/pengeluaran"));
  }

 //Report Function
 //profit

 //cashflow
function cashFlow(){
	$datas = $this->M_Flow->union2();
	$data = array('data' => $datas);
	$this->load->view('flow', $data);
	}

	//categories
	//user
	function insert_user(){
		 $data = array(
				 'username' 					=> $this->input->post('username'),
				 'password' 					=> md5($this->input->post('password')),
				 'id_karyawan' 				=> $this->input->post('id_karyawan'),
				 'status' 						=> $this->input->post('status')
				);
				$pw1		= $this->input->post('password');
				$pw2		= $this->input->post('password2');

				if (strcasecmp($pw1, $pw2) != 0) {
					$this->session->set_flashdata('notifikasi', '<p class="status alert alert-warning">Password tidak sama!</p>');
				} else {
					$this->M_Dummy->insert_user('users', $data);
					$this->session->set_flashdata('notifikasi', '<p class="status alert alert-success">Data Berhasil dimasukkan!</p>');
				}
				redirect('admin/user');
 }
	function user_hapus($username){
		$this->M_Dummy->hapus($username);
		redirect("admin/user");
		}

		function user_reset($username) {
		$this->M_Dummy->edit($username, array("password" => md5('jenderal')));
		redirect("admin/user");
	}

	//jenis
	//jenis pemasukan
	function insert_jenis_pemasukan(){
			$data = array(
					'nama_jenis' 				=> $this->input->post('jenis_pemasukan'));
			$data = $this->M_Income->insertJenisPemasukan('jenis_pemasukan', $data);
			redirect(base_url('Admin/kategori'));
	}

	function update_jenis_pemasukan($id){
				$id 				= $this->input->post(trim(strip_tags('id_jenis')));
				$jenis			= $this->input->post(trim(strip_tags('jenis_pemasukan')));
				$data = array(
					"nama_jenis" 				=> $jenis );
				$query = $this->M_Income->updateJenisPemasukan($id, $data);
				redirect(base_url('Admin/kategori'));
		}

	function delete_jenis_revenue($id){
			$this->M_Income->deleteJenisPemasukan('jenis_pemasukan', array("id_jenis" => $id));
			redirect(base_url('Admin/kategori'));
	}

	function json_jenis_pemasukan($id){
			$datas = $this->M_Income->GetWhereJenis('jenis_pemasukan', array('id_jenis' => $id));
			foreach($datas as $row) {
				$data = array(
					"id" 											=> $row->id_jenis,
					"jenis_pemasukan" 				=> $row->nama_jenis,
				);
			}
			echo json_encode($data, JSON_PRETTY_PRINT);
}

	//jenis pengeluaran
	function insert_jenis_pengeluaran(){
			$data = array(
					'nama_jenis' 				=> $this->input->post('jenis_pengeluaran'));
			$data = $this->M_Expense->insertJenisPengeluaran('jenis_beban', $data);
			redirect(base_url('Admin/kategori'));
	}

	function update_jenis_pengeluaran(){
				$id 				= $this->input->post(trim(strip_tags('id_jenisPengeluaran')));
				$jenis			= $this->input->post(trim(strip_tags('jenis_pengeluaran')));
				$data = array(
					"nama_jenis" 				=> $jenis );
				$query = $this->M_Expense->updateJenisPengeluaran($id, $data);
				redirect(base_url('Admin/kategori'));
		}

	function delete_jenis_expense($id){
			$this->M_Expense->deleteJenisPengeluaran('jenis_beban', array('id_jenis'=>$id));
			redirect(base_url('Admin/kategori'));
	}

	function json_jenis_pengeluaran($id){
			$datas = $this->M_Expense->GetWhereJenis('jenis_beban', array('id_jenis' => $id));
			foreach($datas as $row) {
				$data = array(
					"id" 											=> $row->id_jenis,
					"jenis_beban"			 				=> $row->nama_jenis,
				);
			}
			echo json_encode($data, JSON_PRETTY_PRINT);
}
	//Profile
	//update profil
	function update_profil(){
	$id 				= $this->input->post(trim(strip_tags('id')));
	$nama				= $this->input->post(trim(strip_tags('nama')));
	$alamat 		= $this->input->post(trim(strip_tags('alamat')));
	$email 			= $this->input->post(trim(strip_tags('email')));
	$nomor 			= $this->input->post(trim(strip_tags('nomor')));

	$data = array(
		"nama" 					=> $nama,
		"alamat" 					=> $alamat,
		"email" 					=> $email,
		"nomor" 					=> $nomor
	);
	$query = $this->M_Dummy->update($id, $data);
	redirect(base_url('Admin/profil'));
}

	function get_profil($id){
		$datas = $this->M_Dummy->GetWhere('karyawan', array('id' => $id));
		foreach($datas as $row) {
			$data = array(
				"id" 						=> $row->id,
				"nama" 					=> $row->nama,
				"alamat" 				=> $row->alamat,
				"email" 				=> $row->email,
				"nomor" 				=> $row->nomor,
			);
		}
		echo json_encode($data, JSON_PRETTY_PRINT);
 }

	//update password
	function ubah_password(){
		$username	= $this->session->userdata('username');
		$old_pass	= md5($this->input->post('old_pass'));
		$pw1		= $this->input->post('password');
		$pw2		= $this->input->post('password2');

		if (strcasecmp($pw1, $pw2) != 0) {
			$this->session->set_flashdata('notif', '<p class="status alert alert-warning">Password tidak sama!</p>');
		} else if (strcasecmp($old_pass, $this->M_Dummy->getPassword($username)) != 0) {
			$this->session->set_flashdata('notif', '<p class="status alert alert-danger">Password salah!</p>');
		} else {
			$this->M_Dummy->edit($username, array("password" => md5($pw1)));
			$this->session->set_flashdata('notif', '<p class="status alert alert-success">Password Berhasil dirubah!</p>');
		}
		redirect('admin/profil');
	}

	function json_calender($id){
		$cal = substr($id, 0, 1);
		$id = ltrim($id, $cal);

		$res = ($cal == 'A' ? $this->M_Income->getPemasukanId($id) : $this->M_Expense->getPengeluaranId($id));

		foreach ($res as $row) {
				$data = array(
					"jumlah" 						=> "Rp. " . number_format($row->jumlah),
					"jenis" 						=> $row->nama_jenis,
					"penerima" 					=> $row->penerima,
					"deskripsi" 				=> $row->deskripsi,
			);
			echo json_encode($data, JSON_PRETTY_PRINT);
		}
	}
}
