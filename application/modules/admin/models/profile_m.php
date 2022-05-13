<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profile_m extends CI_Model
{
    public function __construct()
	{
		parent::__construct();
		$CI = &get_instance();
	}
	
	function getProfile($id)
	{
        $this->db->where('id', $id);
        return $this->db->get('users')->result_array();
	}

	public function get_by_id($id)
    {
        $this->db->from('users');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function update_profile($where, $data)
	{
		$this->db->update('users', $data, $where);
		return $this->db->affected_rows();
	}
	

}