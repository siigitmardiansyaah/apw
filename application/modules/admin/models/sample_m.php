<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sample_m extends CI_Model
{

	var $column_order = array(null,'a.id_alternatif','a.id_faktor'); //set column field database for datatable orderable
	var $column_search = array('b.faktor','e.nama'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('a.id_faktor' => 'asc'); // default order 
	var $table = 'pm_sample a'; // default order 

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
	
	public function getSample(){
        $this->db->join('pm_faktor b','a.id_faktor = b.id_faktor');
        $this->db->join('pm_alternatif c','a.id_alternatif = c.id_alternatif');
        $this->db->join('pm_aspek d','b.id_aspek = d.id_aspek');
        $this->db->join('penduduk e','c.id_penduduk = e.id');
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
        $this->db->where('id_sample', $id);
        $query = $this->db->get();

        return $query->row();
    }
	
	public function save($id_penduduk,$id_faktor,$value)
    {

        $query = " INSERT INTO pm_sample (id_alternatif,id_faktor,value) VALUES ('$id_penduduk','$id_faktor','$value')";
        $sql = $this->db->query($query);
        return $sql;
    }

    public function update_data($id_penduduk,$id_faktor,$value, $id)
    {
        $query = " UPDATE pm_sample SET 
					id_alternatif = '$id_penduduk', 
					id_faktor = '$id_faktor',
                    value = '$value'
					WHERE id_sample = $id ";
        $sql = $this->db->query($query);
        return $sql;
    }
	
    public function delete_data($id)
    {
        $query = "DELETE FROM pm_sample WHERE id_sample = $id";
        $sql = $this->db->query($query);
        return $sql;
    }

    function getAlternatif(){
        $this->db->join('penduduk','pm_alternatif.id_penduduk = penduduk.id');
		$query = $this->db->get('pm_alternatif');
		return $query->result_array();
	}

	function getKriteria(){
        $this->db->join('pm_aspek','pm_faktor.id_aspek = pm_aspek.id_aspek');
		$query = $this->db->get('pm_faktor');
		return $query->result_array();
	}

    
}