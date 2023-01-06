<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KetersediaanController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
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

/* End of file KetersediaanController.php and path \application\controllers\Villa\KetersediaanController.php */
