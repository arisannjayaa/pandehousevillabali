<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pandehvb_model');
		
	}

	public function index()
	{
        $data['profil'] =  $this->pandehvb_model->getSelectedProfil();
		$this->load->view('profil', $data);
        $this->session->unset_userdata('alert_home');
        
	}

    public function EditProfil()
    {
        $data['profil'] =  $this->pandehvb_model->getSelectedProfil();
        $this->load->view('profil2', $data);
        $this->session->unset_userdata('alert_home');

    }


	public function aksi_edit_profil()
    {
        if ($this->session->userdata("tipe_user") == 'customer') {
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $no_telp = $this->input->post('no_telp');
            if (empty($username) || empty($password) || empty($no_telp) || empty($nama)) {
                $data_session = array(
                    'alert_home' => 'Data tidak boleh kosong'
                );
                $this->session->set_userdata($data_session);
                redirect(base_url("Profil/EditProfil"));
            }else{
                $edit = array(
                    'nama' => $nama,
                    'username' => $username,  
                    'password' => sha1($password),
                    'nomer_telepon' => $no_telp
                );
                $this->db->where('id_customer', $this->session->userdata("id_customer"));
                $this->db->update('customer', $edit);
                $data_session = array(
                    'alert_home' => 'Edit sukses'
                );
                $this->session->set_userdata($data_session);
                redirect(base_url("Profil"));
            }
        }elseif ($this->session->userdata("tipe_user") == 'admin') {
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            if (empty($username) || empty($password) || empty($nama)) {
                $data_session = array(
                    'alert_home' => 'Data tidak boleh kosong'
                );
                $this->session->set_userdata($data_session);
                redirect(base_url("Profil/EditProfil"));
            }else{
                $edit = array(
                    'nama' => $nama,
                    'username' => $username,  
                    'password' => sha1($password),
                    'nomer_telepon' => $no_telp
                );
                $this->db->where('id_pemilik', $this->session->userdata("id_pemilik"));
                $this->db->update('pemilik', $edit);
                $data_session = array(
                    'alert_home' => 'Edit sukses'
                );
                $this->session->set_userdata($data_session);
                redirect(base_url("Profil"));

            }

        }


        
    }
     
    
}



/* End of file HomeController.php and path \application\controllers\HomeController.php */
