<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Register_m extends CI_Model
{
    function getPendidikan(){
		$query = $this->db->get('pendidikan');
		return $query->result_array();
	}
	
	function getAgama(){
		$query = $this->db->get('agama');
		return $query->result_array();
	}
	function getKK($kk){
		$this->db->select('id_kk');
		$this->db->where("no_kk = $kk AND status_kk IN (1,2)");
		$query = $this->db->get('kartu_keluarga');
		return $query->result();
	}

	public function save($id_kk,$nik,$nama,$tmpt_lahir,$tgl,
	$alamat,$no_rt,$no_telepon,$jk,$id_agama,$id_pekerjaan,$id_pendidikan,$status_perkawinan,
	$kewarganegaraan,$password)
    {
        $query = " INSERT INTO penduduk 
		(`id_kk`, `nik`, `nama`, `tmpt_lahir`, `tgl_lahir`, `alamat`,`no_rt`,`no_telepon`, `jk`, `pekerjaan`, `id_pendidikan`, `id_agama`, `status_perkawinan`, `kewarganegaraan`, `password`)
		VALUES 
		('$id_kk','$nik','$nama','$tmpt_lahir','$tgl','$alamat','$no_rt','$no_telepon','$jk','$id_pekerjaan','$id_pendidikan','$id_agama','$status_perkawinan','$kewarganegaraan'
	,'$password')";
        $sql = $this->db->query($query);
        return $sql;
    }

}