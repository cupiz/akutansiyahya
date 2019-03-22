<!-- <?php
class Pemasukan extends CI_Controller{
	public function index(){
		$this->load->model('M_Income');
		$data = $this->M_Income->GetPemasukan('pemasukan');
		$dd 	= $this->M_Income->getJenisPemasukan();
		$data = array('data' => $data, 'dd' => $dd);

		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('dataIncome', $data);
		$this->load->view('layout/footer');
	}

		public function add(){
		    $this->load->view('form_add');
		}
		public function insert(){
		    $this->load->model('M_Income');
		    $data = array(
		        'tanggal' 				=> $this->input->post('tanggal'),
		        'jumlah' 					=> $this->input->post('jumlah'),
		        'jenis_pemasukan' => $this->input->post('jenis_pemasukan'),
						'penerima' 				=> $this->input->post('penerima'),
						'deskripsi' 			=> $this->input->post('deskripsi')
		         );
		    $data = $this->M_Income->insert('pemasukan', $data);
		    redirect(base_url('Pemasukan'));
		}

		public function delete($id){
    $this->load->model('M_Income');
    $this->M_Income->delete('pemasukan', $id);
    redirect(base_url('pemasukan'));
}

public function update(){
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
	redirect(base_url('Pemasukan'));
}

public function json_pemasukan($id){
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
public function edit(){
	$id = $this->uri->segment(3);
	$data['masuk']=$this->M_Income->edit($id);
	$this->load->view('form_edit',$data);
function dropdown(){

}
}
} 
