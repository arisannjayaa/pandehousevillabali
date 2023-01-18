<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminMetodePembayaran extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pandehvb_model');
	}

	public function index()
	{
		if ($this->session->userdata("tipe_user") == 'admin') {
			$data = [
				'title' => 'Metode Pembayaran',
				'heading' => 'Metode Pembayaran',
				'desc' => ''
			];
			$data['metodepembayaran'] =  $this->pandehvb_model->getMetodePembayaran();
			$this->load->view('layouts/header', $data);
			$this->load->view('metodepembayaran/index', $data);
			$this->load->view('layouts/footer');
			$this->session->unset_userdata('alert_home');
		}else{
			$data_session = array(
                'alert_home' => 'Harus login sebagai admin terlebih dahulu'
                );
 
            $this->session->set_userdata($data_session);
            redirect(base_url("VillaHome/index"));
		}
			
	}

	public function tambah()
	{
		if ($this->session->userdata("tipe_user") == 'admin') {
			$data = [
				'title' => 'Tambah Metode Pembayaran',
				'heading' => 'Tambah Metode Pembayaran',
				'desc' => ''
			];
			$this->load->view('layouts/header', $data);
			$this->load->view('metodepembayaran/metodepembayaran_tambah', $data);
			$this->load->view('layouts/footer');
		}else{
			$data_session = array(
                'alert_home' => 'Harus login sebagai admin terlebih dahulu'
                );
 
            $this->session->set_userdata($data_session);
            redirect(base_url("VillaHome/index"));
		}
			
	}

	public function aksi_tambah()
	{
		$insert = array(
                    'jenis_pembayaran' => $this->input->post('jenis_pembayaran'),
                    'isi' => $this->input->post('isi'),
                    'id_pemilik' => 1
                   

                );
                $this->db->insert('metode_pembayaran', $insert);

                $data_session = array(
                    'alert_home' => 'Tambah metode pembayaran berhasil'
                    );
     
                $this->session->set_userdata($data_session);
                redirect(base_url("AdminMetodePembayaran"));
	}

	public function edit($id)
	{
		if ($this->session->userdata("tipe_user") == 'admin') {
			$data = [
				'title' => 'Edit Metode Pembayaran',
				'heading' => 'Edit Metode Pembayaran',
				'desc' => ''
			];
			$data['id'] = $id;
			$data['pembayaran'] =  $this->pandehvb_model->getSelectedMetodePembayaran($id);
			$this->load->view('layouts/header', $data);
			$this->load->view('metodepembayaran/metodepembayaran_edit', $data);
			$this->load->view('layouts/footer');
		}else{
			$data_session = array(
                'alert_home' => 'Harus login sebagai admin terlebih dahulu'
                );
 
            $this->session->set_userdata($data_session);
            redirect(base_url("VillaHome/index"));
		}
			
	}

	public function aksi_edit()
	{
		$insert = array(
                    'jenis_pembayaran' => $this->input->post('jenis_pembayaran'),
                    'isi' => $this->input->post('isi')
                   

                );
				$this->db->where('id_metode_pembayaran', $this->input->post('id_metode_pembayaran'));
                $this->db->update('metode_pembayaran', $insert);

                $data_session = array(
                    'alert_home' => 'Edit metode pembayaran berhasil'
                    );
     
                $this->session->set_userdata($data_session);
                redirect(base_url("AdminMetodePembayaran"));
	}

	public function aksi_delete($id)
	{
		$this->db->where('id_metode_pembayaran', $id);
    	$result = $this->db->delete('metode_pembayaran');
		$data_session = array(
            'alert_home' => 'Hapus sukses'
            );
 
        $this->session->set_userdata($data_session);
        redirect(base_url("AdminMetodePembayaran"));
		
	}
}

/* End of file KontakPersonController.php and path \application\controllers\KontakPerson\KontakPersonController.php */
