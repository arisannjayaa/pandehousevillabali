<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PemesananController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = [
			'title' => 'Pemesanan',
			'heading' => 'Pemesanan',
			'desc' => ''
		];
		$this->load->view('layouts/header', $data);
		$this->load->view('pemesanan/index', $data);
		$this->load->view('layouts/footer');
	}
}

/* End of file PemesananController.php and path \application\controllers\Pemesanan\PemesananController.php */
