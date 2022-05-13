<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Berita_m extends CI_Model
{

	var $column_order = array(null,'judul','isi',null,null,null,null); //set column field database for datatable orderable
	var $column_search = array('judul'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('judul' => 'asc'); // default order 
	var $table = 'pengumuman'; // default order 

	public function __construct()
	{
		parent::__construct();
		$CI = &get_instance();
	}

	private function _get_datatables_query()
	{

		$this->db->from($this->table);

		$i = 0;
		foreach ($this->column_search as $item)
		{
			if(strtoupper($_POST['search']['value'])) // if datatable send POST for search
			{
				if($i===0) // first loop
				{
					if(count($this->column_search) > 1)
						$this->db->where("(" .$item . " LIKE '%".($_POST['search']['value']."%'"));
					else
						$this->db->where("(" .$item . " LIKE '%".($_POST['search']['value']."%')"));
				}
				else
				{
					if(count($this->column_search) - 1 == $i)
						$this->db->or_where($item . " LIKE '%".($_POST['search']['value']."%')"));
					else
						$this->db->or_where($item . " LIKE '%".($_POST['search']['value']."%'"));
				}
			}
			$i++;
		}

		if(isset($_POST['order'])) // here order processing
		{
			//$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else if(isset($this->order))
		{
			$order = $this->order;

			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
	
	public function getBerita($no_urut){
		$this->db->join('penduduk','pengumuman.pembuat = penduduk.id');
		$this->db->where('penduduk.no_rt',$no_urut);
		$this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
	}
	
	function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
		
    }
	
	public function count_all()
    {
		$query = "select count(*) as numrows from ".$this->table."";
        $sql = $this->db->query($query);
        return $sql->row();
	}
	
	function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}


	public function get_by_id($id)
    {
		$this->db->from($this->table);
        $this->db->where('id_berita', $id);
		$query = $this->db->get();
		return $query->row();


    }


	public function simpandata($judul,$isi,$tanggal,$publish,$id_pembuat) {
		$field = array(
		'judul' => $judul,
		'isi' => $isi,
		'tanggal' => $tanggal,
        'pembuat'=>$id_pembuat,
		'publish' => $publish,
		);
		return $this->db->insert('pengumuman', $field);
		}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id_berita', $id);
		$this->db->delete($this->table);
	}

	function TotalBerita()
	{
		$rt = $this->session->userdata('no_rt');
		$this->db->join('penduduk','pengumuman.pembuat = penduduk.id');
		$this->db->where('penduduk.no_rt = ',$rt);
		$query = $this->db->get('pengumuman');
		return $query->num_rows();
	}
	
    
}