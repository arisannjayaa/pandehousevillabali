<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KontakPerson_model extends CI_Model
{
	public function select_all()
	{
		$query = $this->db->get('contact_person')->result();
		return $query;
	}

	public function select_id($id)
	{
		$query = $this->db->where('id_contact_person', $id);
		$query = $this->db->get('contact_person')->result();
		return $query;
	}
}


/* End of file KontakPerson_model.php and path \application\models\KontakPerson_model.php */
