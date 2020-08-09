<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cendana extends CI_Controller {
	 function __construct(){
		parent::__construct();
		$this->load->model('CendanaModel');
	}

	public function input_list()
	{
		$data=$this->CendanaModel->input_list_model();
		echo json_encode($data);
	}

	public function input_simpan()
	{
		$data=$this->CendanaModel->input_simpan_model();
		echo json_encode($data);
	}

	public function input_delete()
	{
		$id = $this->uri->segment(3);
		$data=$this->CendanaModel->input_delete_model($id);
		echo json_encode($data);
	}
}

?>
