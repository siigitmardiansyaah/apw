<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "third_party/MX/Controller.php";
date_default_timezone_set('Asia/Jakarta');

class Timeline extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->module = 'warga/';
    // Cek apakah terdapat session dengan nama authenticated
    if (!$this->session->userdata('authenticated')) // Jika tidak ada
      redirect('login'); // Redirect ke halaman login
    $this->load->model($this->module . 'timeline_m');
    $this->load->library('pagination'); // Load librari paginationnya        

  }

  public function index()
  {
    $no_rt = $this->session->userdata('no_rt');
    $data['title'] = 'Timeline Berita';
    $data['module'] = $this->module;
    $data['model'] = $this->timeline_m->view($no_rt);
    
    $data['berita'] = $this->timeline_m->getBerita($no_rt);
    foreach($data['berita'] as $d)
    {
      $id_berita = $d->id_berita;
    } // Panggil fungsi view() yang ada di model siswa
    $data['komen'] = $this->timeline_m->getKomen(); // Panggil fungsi view() yang ada di model siswa
    
 
      
    //konfigurasi pagination
    $this->load->view('templates/admin/head.php', $data);
    $this->load->view('templates/admin/navbar.php');
    $this->load->view('templates/admin/sidebar_warga.php');
    $this->load->view($this->module . 'timeline_v', $data);
    $this->load->view('templates/admin/js.php');
    $this->load->view('templates/admin/footer.php');
  }

  function add_komen()
  {
    $komen = $this->input->post('komen');
    $id = $this->session->userdata('id');
    $tanggal = date('Y-m-d H:i:s');
    $id_berita = $this->input->post('id_berita');

    $simpan = $this->timeline_m->simpandata($komen,$id,$tanggal,$id_berita);
    redirect('rw/timeline');
  }

  function hapus_komen($id)
  {
    $simpan = $this->timeline_m->delete($id);
    redirect('rw/timeline');

  }

}