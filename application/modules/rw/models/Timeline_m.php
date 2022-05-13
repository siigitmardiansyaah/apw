<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Timeline_m extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$CI = &get_instance();
	}

	  public function view()
	  {    
		$query = "SELECT * FROM pengumuman inner join penduduk on pengumuman.pembuat = penduduk.id inner join role on penduduk.id = role.id_penduduk where publish = 'Yes' order by pengumuman.tanggal desc"; // Query untuk menampilkan semua data siswa        
		$config['base_url'] = base_url('rw/timeline/index');    
		$config['total_rows'] = $this->db->query($query)->num_rows();    
		$config['per_page'] = 3;    
		$config['uri_segment'] = 4;    
		$config['num_links'] = 3;        
		// Style Pagination    
		// Agar bisa mengganti stylenya sesuai class2 yg ada di bootstrap    
		$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
      // End style pagination        
		$this->pagination->initialize($config); // Set konfigurasi paginationnya        
		$page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;    
		$query .= " LIMIT ".$page.", ".$config['per_page'];        
		$data['limit'] = $config['per_page'];    
		$data['total_rows'] = $config['total_rows'];    
		$data['pagination'] = $this->pagination->create_links(); // Generate link pagination nya sesuai config diatas    
		$data['siswa'] = $this->db->query($query)->result();        
		return $data;  
	}

	

	public function simpandata($komen,$id,$tanggal,$id_berita) {
		$field = array(
		'id_warga' => $id,
		'id_pengumuman' => $id_berita,
		'komentar' => $komen,
        'tanggal_komen'=>$tanggal,
		);
		return $this->db->insert('komentar', $field);
		}

		public function delete($id)
    {
        $query = "DELETE FROM komentar WHERE id_komen = $id";
        $sql = $this->db->query($query);
        return $sql;
    }
	function getKomen(){
		$this->db->join('pengumuman','komentar.id_pengumuman = pengumuman.id_berita','inner');
		$this->db->join('penduduk','komentar.id_warga = penduduk.id','inner');
		$this->db->where("id_pengumuman = id_berita");
		$query = $this->db->get('komentar');
		return $query->result();
	}
	function getBerita(){
		$this->db->where("publish ='Yes' ");
		$query = $this->db->get('pengumuman');
		return $query->result();
	}
}