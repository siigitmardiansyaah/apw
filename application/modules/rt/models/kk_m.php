<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class kk_m extends CI_Model
{

	var $column_order = array(null,'kartu_keluarga.no_kk','kartu_keluarga.kepala_keluarga',null,null,null,null); //set column field database for datatable orderable
	var $column_search = array('kartu_keluarga.kepala_keluarga','kartu_keluarga.no_kk'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('kartu_keluarga.no_kk' => 'asc','kartu_keluarga.kepala_keluarga' => 'asc','kartu_keluarga.id_kk'=>'asc'); // default order 
	var $table = 'kartu_keluarga'; // default order 

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
	
	public function getKK($no_rt){
        $this->db->select('kartu_keluarga.*');
		$this->db->join('penduduk','kartu_keluarga.id_kk = penduduk.id_kk');
		$this->db->where('kartu_keluarga.status_kk IN (1,2)');
		$this->db->where('penduduk.no_rt =',$no_rt);
		$this->db->group_by('kartu_keluarga.id_kk');
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
        $this->db->where('id_kk', $id);
        $query = $this->db->get();

        return $query->row();
    }
	
	public function save($no_kk,$nama,$status_kk)
    {

        $query = " INSERT INTO kartu_keluarga (no_kk,kepala_keluarga,status_kk ) VALUES ('$no_kk','$nama','$status_kk')";
        $sql = $this->db->query($query);
        return $sql;
    }

    public function update_data($no_kk,$nama,$status_kk, $id)
    {
        $query = " UPDATE kartu_keluarga SET 
                    no_kk = '$no_kk',
					kepala_keluarga = '$nama',
                    status_kk = '$status_kk'
					WHERE id_kk = $id ";
        $sql = $this->db->query($query);
        return $sql;
    }
	
    public function delete_data($id)
    {
        $query = "DELETE FROM kartu_keluarga WHERE id_kk = $id";
        $sql = $this->db->query($query);
        return $sql;
    }
	function TotalKK($no_rt)
	{
		$this->db->join('penduduk','kartu_keluarga.id_kk = penduduk.id_kk');
		$this->db->where('kartu_keluarga.status_kk IN (1,2)');
		$this->db->where('penduduk.no_rt =',$no_rt);
		$this->db->group_by('kartu_keluarga.id_kk');
		$query = $this->db->get('kartu_keluarga');
		return $query->num_rows();
	}

    
}