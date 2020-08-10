<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Json extends CI_Controller {
	 function __construct(){
		parent::__construct();
		$this->load->model('JsonModel');
	}

	public function index()
	{
		$this->load->view('json');
	}

	public function json_list()
	{
		$data=$this->JsonModel->json_list_model();
		echo json_encode($data);
	}

	public function json_simpan()
	{
		$data=$this->JsonModel->json_simpan_model();
		echo json_encode($data);
	}

	public function json_delete()
	{
		$id = $this->uri->segment(3);
		$data=$this->JsonModel->json_delete_model($id);
		echo json_encode($data);
	}
}

?>
