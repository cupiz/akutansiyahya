<?php
class Home extends CI_Controller{
	// function __construct(){
	// 	parent::__construct();
	// 	if ($this->session->userdata('isLogin') != 1) redirect(base_url('auth/login'));
	// 	if ($this->session->userdata('akses') != 1) redirect(base_url(''));
	//
	// 	$this->username = $this->session->userdata('username');
	// 	$this->user_id	= $this->session->userdata('user_id');
	// }
	public function index(){
		$data['title'] = "Beranda";

		$this->load->view('layout/header',$data);
		$this->load->view('layout/sidebar');
		$this->load->view('admin/adminHome');
		$this->load->view('dashboard');
		$this->load->view('layout/footer');
	}

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
public function calender(){
	$this->load->view('layout/header');
	$this->load->view('calender');
	$this->load->view('layout/footer');

}

public function json(){
	$data = $this->M_Flow->union2();
	$i=1;
	foreach ($data as $key) {
		$json[] = array(
		"id"			=> ($key->Type == 1 ? "A" : "B") . $key->id,
		"title" 	=> $key->deskripsi,
		"start"	  => $key->tanggal,
		"end" 	  =>	$key->tanggal,
		"color" 	=> ($key->Type == 2 ? "#ffa8b8" : "#bcffc4")
	);
	$i++;
}
	header('Content-Type: application/json');
	echo json_encode(array("events" => $json), JSON_PRETTY_PRINT);
}
}
