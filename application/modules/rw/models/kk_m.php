<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class kk_m extends CI_Model
{

	var $column_order = array(null,'a.no_kk','a.kepala_keluarga',null,null,null,null); //set column field database for datatable orderable
	var $column_search = array('a.kepala_keluarga','a.no_kk','no_rt'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('a.no_kk' => 'asc','kepala_keluarga' => 'asc','id_kk'=>'asc','no_rt'=>'asc'); // default order 
	var $table = 'kartu_keluarga a'; // default order 

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
	
	public function getKK(){
        $this->db->select('a.*,(select COUNT(id_kk) FROM penduduk where id_kk = a.id_kk) as jumlah_keluarga');
		$this->db->where('a.status_kk IN (1,2)');
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
	

	public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('a.id_kk', $id);
        $query = $this->db->get();

        return $query->row();
    }
	
	function TotalKK()
	{
		$this->db->where('status_kk IN (1,2)');
		$query = $this->db->get('kartu_keluarga');
		return $query->num_rows();
	}

    
}