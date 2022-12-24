<?php
defined('BASEPATH') or exit('No direct script access allowed');

class VillaController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function datavilla()
	{
		$data = [
			'title' => 'Data Villa',
			'heading' => 'Data Villa',
			'desc' => ''
		];
		$this->load->view('layouts/header', $data);
		$this->load->view('villa/data_villa', $data);
		$this->load->view('layouts/footer');
	}

	public function ketersediaan()
	{
		$data = [
			'title' => 'Ketersediaan Villa',
			'heading' => 'Ketersediaan Villa',
			'desc' => ''
		];
		$this->load->view('layouts/header', $data);
		$this->load->view('villa/ketersediaan', $data);
		$this->load->view('layouts/footer');
	}
}

/* End of file VillaController.php and path \application\controllers\Villa\VillaController.php */
