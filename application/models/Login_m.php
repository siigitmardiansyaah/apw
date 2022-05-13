<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_m extends CI_Model
{
    function get($username){
        $this->db->select('*');
        $this->db->where('nik', $username); 
        $result = $this->db->get('penduduk')->row();
        return $result;
    }

    function getAdmin($username){
        $this->db->select('*');
        $this->db->where('username', $username); 
        $result = $this->db->get('users')->row();
        return $result;
    }

    function getData($nik){
        $this->db->select('a.*,b.*');
        $this->db->join('role b','a.id = b.id_penduduk');
        $this->db->where('a.nik', $nik); 
        $result = $this->db->get('penduduk a')->row();
        return $result;
    }

}