<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminDashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ($this->session->userdata("tipe_user") == 'admin') {
			$data = [
				'title' => 'Dashboard',
				'heading' => 'Dashboard',
				'desc' => ''
			];
			$this->load->view('layouts/header', $data);
			$this->load->view('dashboard/index', $data);
			$this->load->view('layouts/footer');
		}else{
			$data_session = array(
                'alert_home' => 'Harus login sebagai admin terlebih dahulu'
                );
 
            $this->session->set_userdata($data_session);
            redirect(base_url("VillaHome/index"));
		}
			
	}
}

/* End of file DashboardController.php and path \application\controllers\Dashboard\DashboardController.php */
