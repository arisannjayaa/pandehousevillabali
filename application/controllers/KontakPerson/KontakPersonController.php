<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KontakPersonController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('KontakPerson_model');
	}

	public function index()
	{
		$data = [
			'title' => 'Kontak Person',
			'heading' => 'Kontak Person',
			'desc' => '',
			'kontak' => $this->KontakPerson_model->select_all()
		];
		$this->load->view('layouts/header', $data);
		$this->load->view('kontakperson/index', $data);
		$this->load->view('layouts/footer');
	}

	public function create()
	{
		$data = [
			'title' => 'Tambah Data Kontak Person',
			'heading' => 'Tambah Data Kontak Person',
			'desc' => '',
		];

		$this->load->view('layouts/header', $data);
		$this->load->view('kontakperson/add', $data);
		$this->load->view('layouts/footer');
	}

	public function store()
	{
		$post = $this->input->post();
		$store = [
			'jenis_cp' => $post['jenis'],
			'isi_cp' => $post['username']
		];
		$this->db->insert('contact_person', $store);
		redirect('kontakperson');
	}

	public function edit($id)
	{
		$data = [
			'title' => 'Edit Data Kontak Person',
			'heading' => 'Edit Data Kontak Person',
			'desc' => '',
			'kontak' => $this->KontakPerson_model->select_id($id)
		];

		$this->load->view('layouts/header', $data);
		$this->load->view('kontakperson/edit', $data);
		$this->load->view('layouts/footer');
	}

	public function update()
	{
		$post = $this->input->post();
		$update = [
			'jenis_cp' => $post['jenis'],
			'isi_cp' => $post['username']
		];
		$this->db->where('id_contact_person', $post['id']);
		$this->db->update('contact_person', $update);
		redirect('kontakperson');
	}

	public function destroy($id)
	{
		$this->db->where('id_contact_person', $id);
		$this->db->delete('contact_person');
		redirect('kontakperson');
	}
}

/* End of file KontakPersonController.php and path \application\controllers\KontakPerson\KontakPersonController.php */
