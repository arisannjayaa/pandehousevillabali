<?php
defined('BASEPATH') or exit('No direct script access allowed');

class VillaContactPerson extends CI_Controller
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
		$data['contactperson'] =  $this->pandehvb_model->getContactPerson();
		$this->load->view('VillaContactPerson', $data);
	}
	
}

/* End of file PemesananController.php and path \application\controllers\Pemesanan\PemesananController.php */
