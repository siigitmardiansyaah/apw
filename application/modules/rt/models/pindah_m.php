<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pindah_m extends CI_Model
{

	var $column_order = array(null,'no_kk','kepala_keluarga',null,null,null,null); //set column field database for datatable orderable
	var $column_search = array('kepala_keluarga','no_kk',); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('no_kk' => 'asc','kepala_keluarga' => 'asc','id_kk'=>'asc','no_rt'=>'asc'); // default order 
	var $table = 'kartu_keluarga'; // default order 

	public function __construct()
	{
		parent::__construct();
		$CI = &get_instance();
	}

	public function getKKPindah($no_rt)
	{
			$this->db->select('a.id_kk,a.no_kk,a.kepala_keluarga,(select COUNT(id_kk) FROM penduduk where id_kk = a.id_kk) as jumlah_keluarga');
			$this->db->join('penduduk b','a.id_kk = b.id_kk');
			$this->db->where('a.status_kk',3);
			$this->db->where('b.no_rt',$no_rt);
		    return $this->db->get('kartu_keluarga a')->result();	
	}

    
}