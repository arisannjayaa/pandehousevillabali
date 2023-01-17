<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminMetodePembayaran extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pandehvb_model');
	}

	public function index()
	{
		$data = [
			'title' => 'Metode Pembayaran',
			'heading' => 'Metode Pembayaran',
			'desc' => ''
		];
		$data['metodepembayaran'] =  $this->pandehvb_model->getMetodePembayaran();
		$this->load->view('layouts/header', $data);
		$this->load->view('metodepembayaran/index', $data);
		$this->load->view('layouts/footer');
	}
}

/* End of file KontakPersonController.php and path \application\controllers\KontakPerson\KontakPersonController.php */
