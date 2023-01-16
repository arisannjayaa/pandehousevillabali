<?php
defined('BASEPATH') or exit('No direct script access allowed');

class VillaDeskripsi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pandehvb_model');
	}

	public function index($id)
	{

		//$data->input->get('id')
		$data['id'] = $id;
		$data['ketersediaan'] =  $this->pandehvb_model->getSelectedKetersediaan($id);
		$data['villa'] =  $this->pandehvb_model->getSelectedVilla($id);
		$this->load->view('VillaDeskripsi', $data);
	}
	
}

/* End of file PemesananController.php and path \application\controllers\Pemesanan\PemesananController.php */
