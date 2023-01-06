<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Villa_model extends CI_Model
{
	public function select_all()
	{
		$query = $this->db->get('tb_villa')->result();
		return $query;
	}
}


/* End of file Villa_model.php and path \application\models\Villa_model.php */
