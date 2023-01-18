<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminVilla extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pandehvb_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('upload');
	}


	//VILLA ---------------------------------------------------------------------------------------------------------------------------

	public function datavilla()
	{
		if ($this->session->userdata("tipe_user") == 'admin') {
			$data = [
				'title' => 'Data Villa',
				'heading' => 'Data Villa',
				'desc' => ''
			];
			$data['villa'] =  $this->pandehvb_model->getAllVilla();
			$this->load->view('layouts/header', $data);
			$this->load->view('villa/data_villa', $data);
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

	public function datavilla_tambah()
	{
		if ($this->session->userdata("tipe_user") == 'admin') {
			$data = [
				'title' => 'Tambah Villa',
				'heading' => 'Tambah Villa',
				'desc' => ''
			];
			$this->load->view('layouts/header', $data);
			$this->load->view('villa/data_villa_tambah', $data);
			$this->load->view('layouts/footer');
		}else{
			$data_session = array(
                'alert_home' => 'Harus login sebagai admin terlebih dahulu'
                );
 
            $this->session->set_userdata($data_session);
            redirect(base_url("VillaHome/index"));
		}
			
	}

	public function aksi_tambahvilla()
	{
		if ($_FILES["filegambar"]["error"] == 0) {
            //tempat gambar beserta nama filenya disimpan
            $nama = $_FILES['filegambar']['name'];
            $tempdir = './uploads/sampul/'; 
        
            $target_path = $tempdir . $nama;

            //ekstensi file yang diperbolehkan
            $ekstensi_diperbolehkan = array('png', 'jpg');


            //mengambil ekstensi
            $x = explode('.', $nama);
            $ekstensi = strtolower(end($x));

            if(in_array($ekstensi, $ekstensi_diperbolehkan) === false){ 
                $data_session = array(
                    'alert_home' => 'File harus PNG / JPG'
                    );
     
                $this->session->set_userdata($data_session);
                redirect(base_url("AdminVilla/datavilla"));
            }else{
                move_uploaded_file($_FILES['filegambar']['tmp_name'], $target_path);
                //echo 'Simpan data berhasil';

                $insert = array(
                    'nama' => $this->input->post('nama'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'harga' => $this->input->post('harga'),
                    'status_villa' => 'aktif',
                    'sampul' => $nama

                );
                $this->db->insert('villa', $insert);

                $data_session = array(
                    'alert_home' => 'Tambah villa berhasil'
                    );
     
                $this->session->set_userdata($data_session);
                redirect(base_url("AdminVilla/datavilla"));
            }

        }else {
            $data_session = array(
                    'alert_home' => 'Upload gagal, gambar kosong'
                    );
     
                $this->session->set_userdata($data_session);
                redirect(base_url("AdminVilla/datavilla"));
        }
    }

    public function datavilla_edit($id)
	{
		if ($this->session->userdata("tipe_user") == 'admin') {
			$data = [
				'title' => 'Edit Villa',
				'heading' => 'Edit Villa',
				'desc' => ''
			];
			$data['id'] = $id;
			$data['villa'] =  $this->pandehvb_model->getSelectedVilla($id);
			$this->load->view('layouts/header', $data);
			$this->load->view('villa/data_villa_edit', $data);
			$this->load->view('layouts/footer');
		}else{
			$data_session = array(
                'alert_home' => 'Harus login sebagai admin terlebih dahulu'
                );
 
            $this->session->set_userdata($data_session);
            redirect(base_url("VillaHome/index"));
		}
			
	}

	public function aksi_editvilla()
	{
		if ($_FILES["filegambar"]["error"] == 0) {
            //tempat gambar beserta nama filenya disimpan
            $nama = $_FILES['filegambar']['name'];
            $tempdir = './uploads/sampul/'; 
        
            $target_path = $tempdir . $nama;

            //ekstensi file yang diperbolehkan
            $ekstensi_diperbolehkan = array('png', 'jpg');


            //mengambil ekstensi
            $x = explode('.', $nama);
            $ekstensi = strtolower(end($x));

            if(in_array($ekstensi, $ekstensi_diperbolehkan) === false){ 
                $data_session = array(
                    'alert_home' => 'File harus PNG / JPG'
                    );
     
                $this->session->set_userdata($data_session);
                redirect(base_url("AdminVilla/datavilla"));
            }else{
                move_uploaded_file($_FILES['filegambar']['tmp_name'], $target_path);
                //echo 'Simpan data berhasil';

                $insert = array(
                    'nama' => $this->input->post('nama'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'harga' => $this->input->post('harga'),
                    'status_villa' => 'aktif',
                    'sampul' => $nama

                );
                $this->db->where('id_villa', $this->input->post('id_villa'));
                $this->db->update('villa', $insert);

                $data_session = array(
                    'alert_home' => 'Update villa berhasil'
                    );
     
                $this->session->set_userdata($data_session);
                redirect(base_url("AdminVilla/datavilla"));
            }

        }else {
            $data_session = array(
                    'alert_home' => 'Upload gagal, gambar kosong'
                    );
     
                $this->session->set_userdata($data_session);
                redirect(base_url("AdminVilla/datavilla"));
        }
    }

    //KETERSEDIAAN ---------------------------------------------------------------------------------------------------------------------------

	public function ketersediaan()
	{
		if ($this->session->userdata("tipe_user") == 'admin') {
			$data = [
				'title' => 'Ketersediaan Villa',
				'heading' => 'Ketersediaan Villa',
				'desc' => ''
			];
			$data['villa'] =  $this->pandehvb_model->getAllVilla();
			$this->load->view('layouts/header', $data);
			$this->load->view('villa/ketersediaan', $data);
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

	public function detail_ketersediaan($id)
	{
		if ($this->session->userdata("tipe_user") == 'admin') {
			$data = [
				'title' => 'Ketersediaan Villa',
				'heading' => 'Ketersediaan Villa',
				'desc' => ''
			];
			$data['id'] = $id;
			$data['ketersediaan'] =  $this->pandehvb_model->getSelectedKetersediaan($id);
			$this->load->view('layouts/header', $data);
			$this->load->view('villa/ketersediaan2', $data);
			$this->load->view('layouts/footer');
		}else{
			$data_session = array(
                'alert_home' => 'Harus login sebagai admin terlebih dahulu'
                );
 
            $this->session->set_userdata($data_session);
            redirect(base_url("VillaHome/index"));
		}
			
	}

	public function UbahKetersediaanKeTersedia($id)
	{
		$insert = array(
                    'status' => 'Tersedia'

        );
        $this->db->where('id_ketersediaan', $id);
        $this->db->update('ketersediaan', $insert);
		$data_session = array(
            'alert_home' => 'Perubahan sukses'
            );
 
        $this->session->set_userdata($data_session);
        redirect(base_url("AdminVilla/ketersediaan"));
		
	}

	public function UbahKetersediaanKeKosong($id)
	{
		$insert = array(
                    'status' => 'Kosong'

        );
        $this->db->where('id_ketersediaan', $id);
        $this->db->update('ketersediaan', $insert);
		$data_session = array(
            'alert_home' => 'Perubahan sukses'
            );
 
        $this->session->set_userdata($data_session);
        redirect(base_url("AdminVilla/ketersediaan"));
		
	}

	//FASILITAS -----------------------------------------------------------------------------------------------------------------------

	public function fasilitas()
	{
		if ($this->session->userdata("tipe_user") == 'admin') {
			$data = [
				'title' => 'Fasilitas Villa',
				'heading' => 'Fasilitas Villa',
				'desc' => ''
			];
			$data['villa'] =  $this->pandehvb_model->getAllVilla();
			$this->load->view('layouts/header', $data);
			$this->load->view('villa/fasilitas', $data);
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

	public function detail_fasilitas($id)
	{
		if ($this->session->userdata("tipe_user") == 'admin') {
			$data = [
				'title' => 'Fasilitas Villa',
				'heading' => 'Fasilitas Villa',
				'desc' => ''
			];
			$data['id'] = $id;
			$data['fasilitas'] =  $this->pandehvb_model->getSelectedFasilitas($id);
			$this->load->view('layouts/header', $data);
			$this->load->view('villa/fasilitas2', $data);
			$this->load->view('layouts/footer');
		}else{
			$data_session = array(
                'alert_home' => 'Harus login sebagai admin terlebih dahulu'
                );
 
            $this->session->set_userdata($data_session);
            redirect(base_url("VillaHome/index"));
		}
			
	}

	public function fasilitas_tambah($id)
	{
		if ($this->session->userdata("tipe_user") == 'admin') {
			$data = [
				'title' => 'Tambah Fasilitas',
				'heading' => 'Tambah Fasilitas',
				'desc' => ''
			];
			$data['id'] = $id;
			$this->load->view('layouts/header', $data);
			$this->load->view('villa/fasilitas_tambah', $data);
			$this->load->view('layouts/footer');
		}else{
			$data_session = array(
                'alert_home' => 'Harus login sebagai admin terlebih dahulu'
                );
 
            $this->session->set_userdata($data_session);
            redirect(base_url("VillaHome/index"));
		}
			
	}

	public function fasilitas_edit($id)
	{
		if ($this->session->userdata("tipe_user") == 'admin') {
			$data = [
				'title' => 'Edit Fasilitas',
				'heading' => 'Edit Fasilitas',
				'desc' => ''
			];
			$data['id'] = $id;
			$data['fasilitas'] =  $this->pandehvb_model->getSelectedFasilitas2($id);
			$this->load->view('layouts/header', $data);
			$this->load->view('villa/fasilitas_edit', $data);
			$this->load->view('layouts/footer');
		}else{
			$data_session = array(
                'alert_home' => 'Harus login sebagai admin terlebih dahulu'
                );
 
            $this->session->set_userdata($data_session);
            redirect(base_url("VillaHome/index"));
		}
			
	}

	

    public function aksi_editfasilitas()
	{
		if ($_FILES["filegambar"]["error"] == 0) {
            //tempat gambar beserta nama filenya disimpan
            $nama = $_FILES['filegambar']['name'];
            $tempdir = './uploads/fasilitas/'; 
        
            $target_path = $tempdir . $nama;

            //ekstensi file yang diperbolehkan
            $ekstensi_diperbolehkan = array('png', 'jpg');


            //mengambil ekstensi
            $x = explode('.', $nama);
            $ekstensi = strtolower(end($x));

            if(in_array($ekstensi, $ekstensi_diperbolehkan) === false){ 
                $data_session = array(
                    'alert_home' => 'File harus PNG / JPG'
                    );
     
                $this->session->set_userdata($data_session);
                redirect(base_url("AdminVilla/fasilitas"));
            }else{
                move_uploaded_file($_FILES['filegambar']['tmp_name'], $target_path);
                //echo 'Simpan data berhasil';

                $insert = array(
                    'fasilitas' => $this->input->post('nama'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'foto' => $nama

                );
                $this->db->where('id_detail_villa', $this->input->post('id_fasilitas'));
                $this->db->update('detail_villa', $insert);

                $data_session = array(
                    'alert_home' => 'Update fasilitas berhasil'
                    );
     
                $this->session->set_userdata($data_session);
                redirect(base_url("AdminVilla/fasilitas"));
            }

        }else {
            $data_session = array(
                    'alert_home' => 'Upload gagal, gambar kosong'
                    );
     
                $this->session->set_userdata($data_session);
                redirect(base_url("AdminVilla/datavilla"));
        }
    }

    

    public function aksi_tambahfasilitas()
	{
		if ($_FILES["filegambar"]["error"] == 0) {
            //tempat gambar beserta nama filenya disimpan
            $nama = $_FILES['filegambar']['name'];
            $tempdir = './uploads/fasilitas/'; 
        
            $target_path = $tempdir . $nama;

            //ekstensi file yang diperbolehkan
            $ekstensi_diperbolehkan = array('png', 'jpg');


            //mengambil ekstensi
            $x = explode('.', $nama);
            $ekstensi = strtolower(end($x));

            if(in_array($ekstensi, $ekstensi_diperbolehkan) === false){ 
                $data_session = array(
                    'alert_home' => 'File harus PNG / JPG'
                    );
     
                $this->session->set_userdata($data_session);
                redirect(base_url("AdminVilla/fasilitas"));
            }else{
                move_uploaded_file($_FILES['filegambar']['tmp_name'], $target_path);
                //echo 'Simpan data berhasil';

                $insert = array(
                    'fasilitas' => $this->input->post('nama'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'foto' => $nama,
                    'id_villa' => $this->input->post('id_villa')

                );
                $this->db->insert('detail_villa', $insert);

                $data_session = array(
                    'alert_home' => 'Tambah fasilitas berhasil'
                    );
     
                $this->session->set_userdata($data_session);
                redirect(base_url("AdminVilla/fasilitas"));
            }

        }else {
            $data_session = array(
                    'alert_home' => 'Upload gagal, gambar kosong'
                    );
     
                $this->session->set_userdata($data_session);
                redirect(base_url("AdminVilla/datavilla"));
        }
    }

    

	public function AksiDeleteFasilitas($id)
	{
		$this->db->where('id_detail_villa', $id);
    	$result = $this->db->delete('detail_villa');
		$data_session = array(
            'alert_home' => 'Hapus sukses'
            );
 
        $this->session->set_userdata($data_session);
        redirect(base_url("AdminVilla/fasilitas"));
		
	}
}

/* End of file VillaController.php and path \application\controllers\Villa\VillaController.php */
