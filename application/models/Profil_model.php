<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil_model extends CI_Model
{
	public function select_id($id)
	{
		$query = $this->db->where('id_pemilik', $id);
		$query = $this->db->get('pemilik')->result();
		return $query;
	}
}


/* End of file Profil_model.php and path \application\models\Profil_model.php */
