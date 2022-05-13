<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Warga_m extends CI_Model
{

	var $column_order = array(null,'b.no_kk','a.nik','a.nama',null,null,null,null,null,null,null,null,null,null); //set column field database for datatable orderable
	var $column_search = array('b.nok_kk','a.nik','a.nama'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('a.id_kk' => 'asc','a.nik' => 'asc'); // default order 
	var $table = 'penduduk a'; // default order 

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
	
	public function getPenduduk($no_rt){
        $this->db->select('a.*,b.*,c.*,e.*');
		$this->db->join('kartu_keluarga b','a.id_kk = b.id_kk','inner');
		$this->db->join('agama c','a.id_agama = c.id_agama','inner');
		$this->db->join('pendidikan e','a.id_pendidikan = e.id_pendidikan','inner');
		$this->db->where('b.status_kk IN (1,2)');
		$this->db->where('a.no_rt =',$no_rt);
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
        $this->db->where('id', $id);
        $query = $this->db->get();

        return $query->row();
    }
	
	public function save($id_kk,$nik,$nama,$tmpt_lahir,$tgl,
	$alamat,$no_rt,$no_telepon,$jk,$id_agama,$id_pekerjaan,$id_pendidikan,$status_perkawinan,
	$kewarganegaraan,$status_hidup,$status_keluarga)
    {
        $query = " INSERT INTO penduduk 
		(`id_kk`, `nik`, `nama`, `tmpt_lahir`, `tgl_lahir`, `alamat`,`no_rt`,`no_telepon`, `jk`, `pekerjaan`, `id_pendidikan`, `id_agama`, `status_perkawinan`, `kewarganegaraan`, `status_hidup`, `status_dalam_keluarga`)
		VALUES 
		('$id_kk','$nik','$nama','$tmpt_lahir','$tgl','$alamat','$no_rt','$no_telepon','$jk','$id_pekerjaan','$id_pendidikan','$id_agama','$status_perkawinan','$kewarganegaraan'
	,'$status_hidup','$status_keluarga')";
        $sql = $this->db->query($query);
        return $sql;
    }

    public function update_data($id_kk,$nik,$nama,$tmpt_lahir,$tgl,
	$alamat,$no_rt,$no_telepon,$jk,$id_agama,$id_pekerjaan,$id_pendidikan,$status_perkawinan,
	$kewarganegaraan,$status_hidup,$status_keluarga, $id)
    {
        $query = " UPDATE `penduduk` SET `id_kk`='$id_kk',
		`nik`='$nik',`nama`='$nama',
		`tmpt_lahir`='$tmpt_lahir',`tgl_lahir`='$tgl',
		`alamat`='$alamat',`no_rt`='$no_rt',
		`no_telepon`='$no_telepon',`jk`='$jk',
		`pekerjaan`='$id_pekerjaan',`id_pendidikan`='$id_pendidikan',`id_agama`='$id_agama',
		`status_perkawinan`='$status_perkawinan',`kewarganegaraan`='$kewarganegaraan',
		`status_hidup`='$status_hidup',`status_dalam_keluarga`='$status_keluarga'
		WHERE id = '$id'
		";
        $sql = $this->db->query($query);
        return $sql;
    }
	
    public function delete_data($id)
    {
        $query = "DELETE FROM penduduk WHERE id = $id";
        $sql = $this->db->query($query);
        return $sql;
    }

	
	function getPendidikan(){
		$query = $this->db->get('pendidikan');
		return $query->result_array();
	}
	
	function getAgama(){
		$query = $this->db->get('agama');
		return $query->result_array();
	}
	function getKK($no_rt){
		$this->db->join('penduduk','kartu_keluarga.id_kk = penduduk.id_kk');
		$this->db->where('kartu_keluarga.status_kk IN (1,2)');
		$this->db->where('penduduk.no_rt = ',$no_rt);
		$this->db->group_by('kartu_keluarga.id_kk');
		$query = $this->db->get('kartu_keluarga');
		return $query->result_array();
	}
	function TotalWarga($no_rt)
	{
		$this->db->join('penduduk','kartu_keluarga.id_kk = penduduk.id_kk');
		$this->db->where('kartu_keluarga.status_kk IN (1,2)');
		$this->db->where('penduduk.no_rt = ',$no_rt);
		$query = $this->db->get('kartu_keluarga');
		return $query->num_rows();
	}


	function getJK(){
        $query = $this->db->query("SELECT penduduk.jk,SUM(jk) AS jumlah_jk FROM penduduk inner join kartu_keluarga on
		penduduk.id_kk = kartu_keluarga.id_kk where kartu_keluarga.status_kk IN(1,2) GROUP BY penduduk.jk");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    
}