<?php
defined('BASEPATH') or exit('No direct script access allowed');

class VillaHome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pandehvb_model');
	}

	public function index()
	{
		$this->pandehvb_model->autoCreateKetersediaan();
		$this->pandehvb_model->autoCancelPemesanan();
		$data['villa'] =  $this->pandehvb_model->getAllVilla();
		$this->load->view('VillaHome', $data);
		$this->session->unset_userdata('alert_home');
	}

}

/* End of file HomeController.php and path \application\controllers\HomeController.php */
