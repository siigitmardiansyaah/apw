<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Rangking_m extends CI_Model
{

	var $column_order = array(null, 'a.id_penduduk', 'a.id_faktor'); //set column field database for datatable orderable
	var $column_search = array('b.faktor', 'c.nama'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('a.id_faktor' => 'asc'); // default order 
	var $table = 'pm_sample a'; // default order 

	public function __construct()
	{
		parent::__construct();
		$CI = &get_instance();
	}

	function TotalAspek()
	{
		$query = $this->db->query('select pm_aspek.id_aspek, 
		COUNT(pm_faktor.id_aspek) AS jumlah_faktor,
		pm_aspek.aspek 
		from pm_aspek LEFT JOIN 
		pm_faktor ON 
		pm_aspek.id_aspek = pm_faktor.id_aspek
		GROUP BY pm_aspek.id_aspek
		order by id_aspek asc');
		return $query->result_array();
	}
	function getAspekWarga()
	{
		$this->db->where_in('id_aspek', 10);
		$query = $this->db->get('pm_faktor');
		return $query->result_array();
	}

	function Warga()
	{
		
		$query = $this->db->query('select id_alternatif,
		kd_alternatif 
		from pm_alternatif order by id_alternatif asc');
		return $query->result_array();
	}

	function Faktor()
	{
		$query = $this->db->query('select id_faktor,
		id_aspek, 
		faktor,
		type,
		target 
		from pm_faktor 
		order by id_aspek,id_faktor asc');
		return $query->result_array();
	}

	function Faktor1()
	{
		$query = $this->db->query('select id_faktor,
		id_aspek, 
		faktor,
		type,
		target 
		from pm_faktor 
		order by id_aspek,type,id_faktor asc');
		return $query->result_array();
	}

	function NilaiWarga($id_warga)
	{
		$query = $this->db->query("
		select tb1.id_alternatif as id_alternatif, 
		tb1.id_faktor as id_faktor,
		tb2.faktor as faktor,
		tb2.target as target,
		tb2.type,
		tb3.id_aspek as id_aspek,
		tb1.value as value
		from pm_sample tb1
		left join pm_faktor tb2 ON
		tb1.id_faktor = tb2.id_faktor 
		left join pm_aspek tb3 ON
		tb2.id_aspek = tb3.id_aspek
		where id_alternatif = '$id_warga'");
		return $query->result_array();
	}

	function TotalCFSF()
	{
		$query = $this->db->query("
		SELECT id_aspek, 
											type, 
											COUNT(id_aspek) AS jumlah_item 
											FROM pm_faktor 
											GROUP BY id_aspek, type
											ORDER BY id_aspek, type");
		return $query->result_array();
	}

	function CS_SFWarga($id_warga,$id_aspek,$type)
	{
		$query = $this->db->query("
		select tb1.id_alternatif as id_alternatif, 
		tb1.id_faktor as id_faktor,
		tb2.faktor as faktor,
		tb2.target as target,
		tb2.type,
		tb3.id_aspek as id_aspek,
		tb1.value as value
		from pm_sample tb1
		left join pm_faktor tb2 ON
		tb1.id_faktor = tb2.id_faktor 
		left join pm_aspek tb3 ON
		tb2.id_aspek = tb3.id_aspek
		where id_alternatif = '$id_warga'
		AND tb3.id_aspek = '$id_aspek'
		AND tb2.type = '$type'
		order by tb2.id_aspek, tb2.type ASC");	
		return $query->result_array();
	}

	function Rangking()
	{
		
		$query = $this->db->query('
		select penduduk.nama,pm_hasil.hasil
		from pm_hasil
		inner join pm_alternatif on pm_hasil.id_alternatif = pm_alternatif.id_alternatif
		inner join penduduk on pm_alternatif.id_penduduk = penduduk.id
		order by pm_hasil.hasil desc');
		return $query->result_array();
	}
}
