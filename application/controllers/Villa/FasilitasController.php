<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FasilitasController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = [
			'title' => 'Fasilitas Villa',
			'heading' => 'Fasilitas Villa',
			'desc' => ''
		];
		$this->load->view('layouts/header', $data);
		$this->load->view('villa/fasilitas', $data);
		$this->load->view('layouts/footer');
	}
}

/* End of file FasilitasController.php and path \application\controllers\Villa\FasilitasController.php */
