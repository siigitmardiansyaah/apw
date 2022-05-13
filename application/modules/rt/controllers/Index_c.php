<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "third_party/MX/Controller.php";
class Index_c extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->module = 'rt/';
    //   $this->load->model($this->module . 'calon_m');
    // Cek apakah terdapat session dengan nama authenticated
    if (!$this->session->userdata('authenticated')) // Jika tidak ada
      redirect('login_pengurus'); // Redirect ke halaman login
      $this->load->model('warga_m');
      $this->load->model('berita_m');
      $this->load->model('kk_m');
  }
  public function index()
  {
    $data['title'] = 'Selamat Datang RT';
    $no_rt = $this->session->userdata('no_rt');
    $id = $this->session->userdata('id');
    $data['module'] = $this->module;
    $data['total_warga'] = $this->warga_m->TotalWarga($no_rt);
    $data['total_berita'] = $this->berita_m->TotalBerita($id );
    $data['total_kk'] = $this->kk_m->TotalKK($no_rt);
    $this->load->view('templates/admin/head.php', $data);
    $this->load->view('templates/admin/navbar.php');
    $this->load->view('templates/admin/sidebar_rt.php');
    $this->load->view('templates/admin/js.php');
    $this->load->view($this->module . 'index_v',$data);
    $this->load->view($this->module . 'js/index_js',$data);
    $this->load->view('templates/admin/footer.php');
  }


}
