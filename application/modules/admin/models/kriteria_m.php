<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kriteria_m extends CI_Model
{

	var $column_order = array(null,null,'a.faktor',null,null); //set column field database for datatable orderable
	var $column_search = array('a.faktor'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('a.faktor' => 'asc'); // default order 
	var $table = 'pm_faktor a'; // default order 

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
	
	public function getKriteria(){
        $this->db->join('pm_aspek b','a.id_aspek = b.id_aspek');
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
        $this->db->where('id_faktor', $id);
        $query = $this->db->get();

        return $query->row();
    }
	
	public function save($id_aspek,$faktor,$target,$type)
    {

        $query = " INSERT INTO pm_faktor (id_aspek, faktor,target,type ) VALUES ('$id_aspek','$faktor','$target','$type')";
        $sql = $this->db->query($query);
        return $sql;
    }

    public function update_data($id_aspek,$faktor,$target,$type, $id)
    {
        $query = " UPDATE pm_faktor SET 
					id_aspek = '$id_aspek', 
					faktor = '$faktor',
                    target = '$target',
                    type  = '$type'
					WHERE id_faktor = $id ";
        $sql = $this->db->query($query);
        return $sql;
    }
	
    public function delete_data($id)
    {
        $query = "DELETE FROM pm_faktor WHERE id_faktor = $id";
        $sql = $this->db->query($query);
        return $sql;
    }

    function getAspek(){
		$query = $this->db->get('pm_aspek');
		return $query->result_array();
	}

    
}