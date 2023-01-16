<?php
defined('BASEPATH') or exit('No direct script access allowed');

class VillaDeskripsiController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pandehvb_model');
	}

	public function index($id)
	{

		//$data->input->get('id')
		$data['villa'] =  $this->pandehvb_model->getDetailVilla($id);
		$this->load->view('VillaDeskripsi/VillaDeskripsi', $data);
	}
	public function odex($id)
	{

		//$data->input->get('id')
		$data['villa'] =  $this->pandehvb_model->getDetailVilla($id);
		$this->load->view('VillaDeskripsi', $data);
	}
}

/* End of file PemesananController.php and path \application\controllers\Pemesanan\PemesananController.php */
