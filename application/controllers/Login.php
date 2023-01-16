<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
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
            $this->load->view('login');
        }
		
	}

    public function logout_akun(){
        session_destroy();
        $data_session = array(
            'alert_home' => 'Berhasil logout'
            );
 
        $this->session->set_userdata($data_session);
        redirect(base_url("VillaHome/index"));
    }

	function aksi_login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $input_akun = array(
            'username' => $username,  
            'password' => sha1($password)
            );
        $data = $this->pandehvb_model->cek_login($input_akun);
        foreach ($data->result_array() as $row) {
        $id_customer = $row['id_customer'];
       	$username_data = $row['username'];
       	$nama_data = $row['nama'];
       	$nomer_telepon_data = $row['nomer_telepon'];
    	}
        $cek = $this->pandehvb_model->cek_login($input_akun);

        if($cek->num_rows() > 0){
 
            $data_session = array(
                'id_customer' => $id_customer,
                'username' => $username_data,
                'nama' => $nama_data,
                'nomer_telepon' => $nomer_telepon_data,
                'alert_home' => 'Login Customer Sukses',
                'tipe_user' => 'customer'
                );
 
            $this->session->set_userdata($data_session);
            redirect(base_url("VillaHome/index"));
        }else{
            $data = $this->pandehvb_model->cek_login2($input_akun);
            foreach ($data->result_array() as $row) {
            $id_pemilik = $row['id_pemilik'];
            $username_data = $row['username'];
            $nama_data = $row['nama'];
            }
            $cek = $this->pandehvb_model->cek_login2($input_akun);
            if($cek->num_rows() > 0){
                 $data_session = array(
                    'id_pemilik' => $id_pemilik,
                    'username' => $username_data,
                    'nama' => $nama_data,
                    'alert_home' => 'Login Admin Sukses',
                    'tipe_user' => 'admin'
                    );
     
                $this->session->set_userdata($data_session);
                redirect(base_url("VillaHome"));

            }else{
                if (empty($username) || empty($password)) {
                    $data_session = array(
                        'alert_home' => 'Input Tidak Boleh Kosong'
                    );
                    $this->session->set_userdata($data_session);
                    redirect(base_url("VillaHome"));
                }else{
                    $data_session = array(
                    'alert_home' => 'Username / Password Salah'
                    );
                    $this->session->set_userdata($data_session);
                    redirect(base_url("VillaHome"));
                    

                }

            }


        }
    }
            
 
        


            
     
    
}



/* End of file HomeController.php and path \application\controllers\HomeController.php */
