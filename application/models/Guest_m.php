<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Guest_m extends CI_Model
{
    function TotalRT()
	{
		$this->db->where('role = "RT"');
		$query = $this->db->get('role');
		return $query->num_rows();
	}
    function TotalWarga()
	{
		$this->db->join('penduduk','kartu_keluarga.id_kk = penduduk.id_kk');
		$this->db->where('kartu_keluarga.status_kk IN (1,2)');
		$query = $this->db->get('kartu_keluarga');
		return $query->num_rows();
	}
    function TotalKK()
	{
		$this->db->where('status_kk IN (1,2)');
		$query = $this->db->get('kartu_keluarga');
		return $query->num_rows();
	}
    function getRW(){
        $this->db->join('penduduk','role.id_penduduk = penduduk.id','inner');
        $this->db->where("role.role = 'RW' ");
		$query = $this->db->get('role');
		return $query->result_array();
	}
    function getRT(){
        $this->db->join('penduduk','role.id_penduduk = penduduk.id','inner');
        $this->db->where("role.role = 'RT' ");
        $this->db->order_by('role.rt_no ASC');
		$query = $this->db->get('role');
		return $query->result_array();
	}

}