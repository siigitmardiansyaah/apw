<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class K_pinda_m extends CI_Model
{

	var $column_order = array(null,'a.nik','a.nama',null,null,null,null,null,null,null,null,null,null); //set column field database for datatable orderable
	var $column_search = array('a.nik','a.nama'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('a.id_kk' => 'asc','a.nik' => 'asc'); // default order 
	var $table = 'penduduk a'; // default order 

	public function __construct()
	{
		parent::__construct();
		$CI = &get_instance();
	}

	
	public function getKeluargaPindah($id)
	{
        $this->db->select('a.*,b.*,c.*,e.*');
		$this->db->join('kartu_keluarga b','a.id_kk = b.id_kk','inner');
		$this->db->join('agama c','a.id_agama = c.id_agama','inner');
		$this->db->join('pendidikan e','a.id_pendidikan = e.id_pendidikan','inner');
        $this->db->where('a.id_kk',$id);
	    return $this->db->get('penduduk a')->result();	
	}
    
}