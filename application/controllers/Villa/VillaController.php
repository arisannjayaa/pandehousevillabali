<?php
defined('BASEPATH') or exit('No direct script access allowed');

class VillaController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Villa_model');
	}

	public function index()
	{
		$data = [
			'title' => 'Data Villa',
			'heading' => 'Data Villa',
			'desc' => '',
			'villa' => $this->Villa_model->select_all()
		];
		$this->load->view('layouts/header', $data);
		$this->load->view('villa/data_villa', $data);
		$this->load->view('layouts/footer');
	}

	public function create()
	{
		$data = [
			'title' => 'Tambah Data Villa',
			'heading' => 'Tambah Data Villa',
			'desc' => '',
		];

		$this->load->view('layouts/header', $data);
		$this->load->view('villa/add', $data);
		$this->load->view('layouts/footer');
	}
}

/* End of file VillaController.php and path \application\controllers\Villa\VillaController.php */
