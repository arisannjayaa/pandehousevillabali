<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProfilController extends CI_Controller
{
	private $id_user;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Profil_model');
		$this->id_user = $this->session->userdata('id_user');
	}

	public function index()
	{
		$data = [
			'title' => 'Profil',
			'heading' => 'Profil',
			'desc' => '',
			'profil' => $this->Profil_model->select_id($this->id_user),
		];
		$this->load->view('layouts/header', $data);
		$this->load->view('profil/index', $data);
		$this->load->view('layouts/footer');
	}

	public function update_profil()
	{
	}

	public function update_sandi()
	{
	}
}

/* End of file ProfilController.php and path \application\controllers\Profil\ProfilController.php */
