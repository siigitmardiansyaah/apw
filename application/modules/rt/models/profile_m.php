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
		$this->db->join('pendidikan','penduduk.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->where('penduduk.id', $id);
        return $this->db->get('penduduk')->result();
	}

	public function get_by_id($id)
    {
        $this->db->from('penduduk');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function update_profile($where, $data)
	{
		$this->db->update('penduduk', $data, $where);
		return $this->db->affected_rows();
	}

	function getPendidikan(){
		$query = $this->db->get('pendidikan');
		return $query->result_array();
	}
	
	function getAgama(){
		$query = $this->db->get('agama');
		return $query->result_array();
	}
	

}