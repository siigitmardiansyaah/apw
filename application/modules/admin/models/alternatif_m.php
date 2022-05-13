<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Alternatif_m extends CI_Model
{

	var $column_order = array(null,'a.kd_alternatif',null); //set column field database for datatable orderable
	var $column_search = array('a.kd_alternatif','b.nama'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('a.kd_alternatif' => 'asc'); // default order 
	var $table = 'pm_alternatif a'; // default order 

	public function __construct()
	{
		parent::__construct();
		$CI = &get_instance();
        
	}

    public $kode_alternatif;

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
	
	public function getAlternatif(){
        $this->db->join('penduduk b','a.id_penduduk = b.id');
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
        $this->db->where('id_alternatif', $id);
        $query = $this->db->get();

        return $query->row();
    }
	
	public function save($kd_alternatif,$id_penduduk)
    {

        $query = " INSERT INTO pm_alternatif (kd_alternatif, id_penduduk ) VALUES ('$kd_alternatif','$id_penduduk')";
        $sql = $this->db->query($query);
        return $sql;
    }

    public function update_data($kd_alternatif,$id_penduduk, $id)
    {
        $query = " UPDATE pm_alternatif SET 
					kd_alternatif = '$kd_alternatif', 
					id_penduduk = '$id_penduduk'
					WHERE id_alternatif = $id ";
        $sql = $this->db->query($query);
        return $sql;
    }
	
    public function delete_data($id)
    {
        $query = "DELETE FROM pm_alternatif WHERE id_alternatif = $id";
        $sql = $this->db->query($query);
        return $sql;
    }

   

    function getWarga(){
        $this->db->join('kartu_keluarga b','a.id_kk = b.id_kk','inner');
        $this->db->where('b.status_kk IN( 1,2)');
		$query = $this->db->get('penduduk a');
		return $query->result_array();
	}

    
}