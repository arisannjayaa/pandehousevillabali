<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RegisterController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('auth/register');
	}
}

/* End of file RegisterController.php and path \application\controllers\Auth\RegisterController.php */
