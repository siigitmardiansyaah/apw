<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Bobot_m extends CI_Model
{

	var $column_order = array('selisih',null,null,); //set column field database for datatable orderable
	var $column_search = array('selisih'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('selisih' => 'asc'); // default order 
	var $table = 'pm_bobot'; // default order 

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
	
	public function getBobot(){
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
        $this->db->where('selisih', $id);
        $query = $this->db->get();

        return $query->row();
    }
	
	public function save($selisih,$bobot,$keterangan)
    {

        $query = " INSERT INTO pm_bobot (selisih, bobot,keterangan ) VALUES ('$selisih','$bobot','$keterangan')";
        $sql = $this->db->query($query);
        return $sql;
    }

    public function update_data($selisih,$bobot,$keterangan)
    {
        $query = " UPDATE pm_bobot SET 
					selisih = '$selisih', 
					bobot = '$bobot',
                    keterangan = '$keterangan'
					WHERE selisih = $selisih ";
        $sql = $this->db->query($query);
        return $sql;
    }
	
    public function delete_data($id)
    {
        $query = "DELETE FROM pm_bobot WHERE selisih = $id";
        $sql = $this->db->query($query);
        return $sql;
    }


    
}