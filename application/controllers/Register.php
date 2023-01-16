<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pandehvb_model');
		
	}

	public function index()
	{
        if ($this->session->userdata("tipe_user") == 'customer' || $this->session->userdata("tipe_user") == 'admin') {
            $data_session = array(
                'alert_home' => 'Harus logout terlebih dahulu'
                );
 
            $this->session->set_userdata($data_session);
            redirect(base_url("VillaHome/index"));
        }else{
            $this->load->view('register');
        }
		
	}

	function aksi_register(){
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $no_telp = $this->input->post('no_telp');
        $input_akun = array(
            'username' => $username
            );
        $cek = $this->pandehvb_model->cek_register($input_akun);
        $cek2 = $this->pandehvb_model->cek_register2($input_akun);

        if($cek->num_rows() > 0 || $cek2->num_rows() > 0){
 
            $data_session = array(
                'alert_home' => 'Username sudah terpakai'
                );
            $this->session->set_userdata($data_session);
            redirect(base_url("VillaHome"));
        }else{
            if (empty($username) || empty($password) || empty($nama) || empty($no_telp)) {
                $data_session = array(
                    'alert_home' => 'Input Tidak Boleh Kosong'
                );
                $this->session->set_userdata($data_session);
                redirect(base_url("VillaHome"));
            }else{
                $input_akun2 = array(
                    'nama' => $nama,
                    'username' => $username,
                    'password' => sha1($password),
                    'nomer_telepon' => $no_telp
                );
                $this->db->insert('customer', $input_akun2);

                $data_session = array(
                    'alert_home' => 'Registrasi berhasil'
                    );
                $this->session->set_userdata($data_session);
                redirect(base_url("VillaHome"));
                
            }
                
            
        }
    }
            
     
    
}



/* End of file HomeController.php and path \application\controllers\HomeController.php */
