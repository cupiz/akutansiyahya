<?php
class Expense extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('M_Expense');
	}
	public function index(){
	$this->load->view('layout/header');
	$this->load->view('layout/sidebar');
	$this->load->model('M_Expense');
	$data = $this->M_Expense->GetPengeluaran('beban');
	$data = array('data' => $data);
	$this->load->view('dataExpense', $data);
	$this->load->view('layout/footer');
		}

		// public function add(){
		//     $this->load->view('form_add');
		// }
		public function insert(){
		    $this->load->model('M_Expense');
		    $data = array(
		        'tanggal' 				=> $this->input->post('tanggal'),     //date("Y-m-d H:i:s"),
		        'jumlah' 					=> $this->input->post('jumlah'),
		        'jenis_beban' 		=> $this->input->post('jenis_beban'),
						'penerima' 				=> $this->input->post('penerima'),
						'deskripsi' 			=> $this->input->post('deskripsi')
		         );
		    $data = $this->M_Expense->insert('beban', $data);
		    redirect(base_url('Expense'));
		}
		public function addProcess(){
			$this->form_validation->set_rules('tanggal','Tanggal', 'trim|required' );
			$this->form_validation->set_rules('jumlah' ,'Jumlah', 'trim|required' );
			$this->form_validation->set_rules('jenis_beban','Jenis Beban', 'trim|required' );
			$this->form_validation->set_rules('penerima','Penerima', 'trim|required' );
			$this->form_validation->set_rules('deskripsi','Deskripsi', 'trim|required' );

			$data = $this->input->post();
			if($this->form_validation->run() == TRUE){
				$result = $this->M_Expense->insert($data);
				echo json_encode($data);
			}
		}
	 public function delete($id){
    $id = array('id_beban' => $id);
    $this->load->model('M_Expense');
    $this->M_Expense->Delete('beban', $id);
    redirect(base_url(),'refresh');
}

	public function edit(){
		$id = $this->uri->segment(3);
		$data['masuk']=$this->M_Expense->edit($id);
		$this->load->view('form_edit',$data);
}
	public function update(){
		$id 				= $this->input->post(trim(strip_tags('id_beban')));
		$tanggal		= $this->input->post(trim(strip_tags('tanggal')));
		$jumlah 		= $this->input->post(trim(strip_tags('jumlah')));
		$jenis 			= $this->input->post(trim(strip_tags('jenis_beban')));
		$penerima 	= $this->input->post(trim(strip_tags('penerima')));
		$deskripsi 	= $this->input->post(trim(strip_tags('deskripsi')));

		$data = array(
			"id_beban" 				=> $id,
			"tanggal" 				=> $tanggal,
			"jumlah" 					=> $jumlah,
			"jenis_beban" 		=> $jenis,
			"penerima" 				=> $penerima,
			"deskripsi" 			=> $deskripsi
	);
	$query = $this->M_Expense->update($id, $data);
	redirect(base_url('Expense'));
}
 public function json_pengeluaran($id){
		$datas = $this->M_Expense->GetWhere('beban', array('id_beban' => $id));
		foreach($datas as $row) {
			$data = array(
				"id_beban" 				=> $row->id,
				"tanggal" 				=> $row->tanggal,
				"jumlah" 					=> $row->jumlah,
				"jenis_beban" 		=> $row->jenis_pemasukan,
				"penerima" 				=> $row->penerima,
				"deskripsi" 			=> $row->deskripsi
			);
		}
		echo json_encode($data, JSON_PRETTY_PRINT);
	}
}
