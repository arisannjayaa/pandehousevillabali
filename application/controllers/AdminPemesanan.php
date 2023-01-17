<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminPemesanan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pandehvb_model');
	}

	public function index()
	{
		
		$data = [
			'title' => 'Pemesanan',
			'heading' => 'Pemesanan',
			'desc' => ''
		];
		$data['transaksi'] = $this->pandehvb_model->getTransaksi();
		$this->load->view('layouts/header', $data);
		$this->load->view('pemesanan/index', $data);
		$this->load->view('layouts/footer');
		$this->session->unset_userdata('alert_home');
	}

	public function konfirmasiTransaksi($id)
	{
		$this->pandehvb_model->konfirmasiTransaksi($id);
		$data_session = array(
            'alert_home' => 'Konfirmasi pesanan sukses'
            );
 
        $this->session->set_userdata($data_session);
        redirect(base_url("AdminPemesanan"));
		
	}

	public function batalkanTransaksi($id)
	{
		$this->pandehvb_model->batalkanTransaksi($id);
		$data_session = array(
            'alert_home' => 'Batalkan pesanan sukses'
            );
 
        $this->session->set_userdata($data_session);
        redirect(base_url("AdminPemesanan"));
		
	}
}

/* End of file PemesananController.php and path \application\controllers\Pemesanan\PemesananController.php */
