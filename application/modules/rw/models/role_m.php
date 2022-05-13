<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Role_m extends CI_Model
{

	var $column_order = array(null,'a.id_penduduk',null,null); //set column field database for datatable orderable
	var $column_search = array('b.nama','a.role'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('a.id_penduduk' => 'asc','a.role'=>'asc'); // default order 
	var $table = 'role a'; // default order 

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
	
	public function getRole(){
        $this->db->join('penduduk b','a.id_penduduk = b.id','inner');
		$this->db->where("a.role = 'RT'");
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
        $this->db->where('id_role', $id);
        $query = $this->db->get();

        return $query->row();
    }
	
	public function save($id_penduduk,$role,$no_rt)
    {

        $query = " INSERT INTO role (id_penduduk, role,rt_no ) VALUES ('$id_penduduk','$role','$no_rt')";
        $sql = $this->db->query($query);
        return $sql;
    }
	public function save1($id_penduduk,$role)
    {

        $query = " INSERT INTO role (id_penduduk, role ) VALUES ('$id_penduduk','$role')";
        $sql = $this->db->query($query);
        return $sql;
    }

    public function update_data($id_penduduk,$role,$no_rt, $id)
    {
        $query = " UPDATE role SET 
					id_penduduk = '$id_penduduk', 
					role = '$role',
                    rt_no = '$no_rt'
					WHERE id_role = $id ";
        $sql = $this->db->query($query);
        return $sql;
    }
    public function update_data1($id_penduduk,$role, $id)
    {
        $query = " UPDATE role SET 
					id_penduduk = '$id_penduduk', 
					role = '$role'
					WHERE id_role = $id ";
        $sql = $this->db->query($query);
        return $sql;
    }
	
    public function delete_data($id)
    {
        $query = "DELETE FROM role WHERE id_role = $id";
        $sql = $this->db->query($query);
        return $sql;
    }

    function getWarga(){
        $this->db->join('kartu_keluarga','penduduk.id_kk = kartu_keluarga.id_kk');
        $this->db->where('kartu_keluarga.status_kk IN(1,2)');
		$this->db->order_by('penduduk.no_rt','asc');
		$query = $this->db->get('penduduk');
		return $query->result_array();
	}
	function TotalRT()
	{
		$this->db->where('role = "RT"');
		$query = $this->db->get('role');
		return $query->num_rows();
	}

    
}