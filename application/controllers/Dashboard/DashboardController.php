<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = [
			'title' => 'Dashboard',
			'heading' => 'Dashboard',
			'desc' => ''
		];
		$this->load->view('layouts/header', $data);
		$this->load->view('dashboard/index', $data);
		$this->load->view('layouts/footer');
	}
}

/* End of file DashboardController.php and path \application\controllers\Dashboard\DashboardController.php */
