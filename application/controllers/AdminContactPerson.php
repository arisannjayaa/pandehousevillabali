<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminContactPerson extends CI_Controller
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
				'title' => 'Contact Person',
				'heading' => 'Contact Person',
				'desc' => ''
			];
				$data['contactperson'] =  $this->pandehvb_model->getContactPerson();
				$this->load->view('layouts/header', $data);
				$this->load->view('contactperson/index', $data);
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
				'title' => 'Tambah Contact Person',
				'heading' => 'Tambah Contact Person',
				'desc' => ''
			];
			$this->load->view('layouts/header', $data);
			$this->load->view('contactperson/contactperson_tambah', $data);
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
                    'jenis_cp' => $this->input->post('jenis_cp'),
                    'isi_cp' => $this->input->post('isi_cp'),
                    'id_pemilik' => 1
                   

                );
                $this->db->insert('contact_person', $insert);

                $data_session = array(
                    'alert_home' => 'Tambah contact person berhasil'
                    );
     
                $this->session->set_userdata($data_session);
                redirect(base_url("AdminContactPerson"));
	}

	public function edit($id)
	{
		if ($this->session->userdata("tipe_user") == 'admin') {
			$data = [
				'title' => 'Edit Contact Person',
				'heading' => 'Edit Contact Person',
				'desc' => ''
			];
			$data['id'] = $id;
			$data['kontak'] =  $this->pandehvb_model->getSelectedContactPerson($id);
			$this->load->view('layouts/header', $data);
			$this->load->view('contactperson/contactperson_edit', $data);
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
                    'jenis_cp' => $this->input->post('jenis_cp'),
                    'isi_cp' => $this->input->post('isi_cp'),
                    'id_pemilik' => 1
                   

                );
				$this->db->where('id_contact_person', $this->input->post('id_contact_person'));
                $this->db->update('contact_person', $insert);

                $data_session = array(
                    'alert_home' => 'Edit contact person berhasil'
                    );
     
                $this->session->set_userdata($data_session);
                redirect(base_url("AdminContactPerson"));
	}

	public function aksi_delete($id)
	{
		$this->db->where('id_contact_person', $id);
    	$result = $this->db->delete('contact_person');
		$data_session = array(
            'alert_home' => 'Hapus sukses'
            );
 
        $this->session->set_userdata($data_session);
        redirect(base_url("AdminContactPerson"));
		
	}
}

/* End of file KontakPersonController.php and path \application\controllers\KontakPerson\KontakPersonController.php */
