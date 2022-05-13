<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "third_party/MX/Controller.php";
class Index_c extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->module = 'admin/';
    //   $this->load->model($this->module . 'calon_m');
    // Cek apakah terdapat session dengan nama authenticated
    if (!$this->session->userdata('authenticated')) // Jika tidak ada
      redirect('login_admin'); // Redirect ke halaman login
      $this->load->model('warga_m');
      $this->load->model('berita_m');
      $this->load->model('role_m');
      $this->load->model('kk_m');
  }
  public function index()
  {
    $data['title'] = 'Selamat Datang Admin';
    $data['module'] = $this->module;
    $data['total_warga'] = $this->warga_m->TotalWarga();
    $data['total_berita'] = $this->berita_m->TotalBerita();
    $data['total_rt'] = $this->role_m->TotalRT();
    $data['total_kk'] = $this->kk_m->TotalKK();
    $data['hasil'] = $this->warga_m->getJK();
    $this->load->view('templates/admin/head.php', $data);
    $this->load->view('templates/admin/navbar.php');
    $this->load->view('templates/admin/sidebar.php');
    $this->load->view('templates/admin/js.php');
    $this->load->view($this->module . 'index_v',$data);
    $this->load->view($this->module . 'js/index_js',$data);
    $this->load->view('templates/admin/footer.php');
  }


}
