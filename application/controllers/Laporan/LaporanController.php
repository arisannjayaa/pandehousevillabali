<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LaporanController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = [
			'title' => 'Laporan',
			'heading' => 'Laporan',
			'desc' => ''
		];
		$this->load->view('layouts/header', $data);
		$this->load->view('laporan/index', $data);
		$this->load->view('layouts/footer');
	}
}

/* End of file LaporanController.php and path \application\controllers\Laporan\LaporanController.php */
