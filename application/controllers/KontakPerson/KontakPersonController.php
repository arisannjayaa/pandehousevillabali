<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KontakPersonController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = [
			'title' => 'Kontak Person',
			'heading' => 'Kontak Person',
			'desc' => ''
		];
		$this->load->view('layouts/header', $data);
		$this->load->view('kontakperson/index', $data);
		$this->load->view('layouts/footer');
	}
}

/* End of file KontakPersonController.php and path \application\controllers\KontakPerson\KontakPersonController.php */
