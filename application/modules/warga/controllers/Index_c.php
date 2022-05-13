<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "third_party/MX/Controller.php";
class Index_c extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->module = 'warga/';
    // Cek apakah terdapat session dengan nama authenticated
    if (!$this->session->userdata('authenticated')) // Jika tidak ada
      redirect('login'); // Redirect ke halaman login
      $this->load->model('warga_m');
  }
  public function index()
  {
    $data['title'] = 'Selamat Datang';
    $id_kk = $this->session->userdata('id_kk');
    $id = $this->session->userdata('id');
    $data['module'] = $this->module;
    $data['total_warga'] = $this->warga_m->TotalWarga($id_kk);
    $this->load->view('templates/admin/head.php', $data);
    $this->load->view('templates/admin/navbar.php');
    $this->load->view('templates/admin/sidebar_warga.php');
    $this->load->view('templates/admin/js.php');
    $this->load->view($this->module . 'index_v',$data);
    $this->load->view($this->module . 'js/index_js',$data);
    $this->load->view('templates/admin/footer.php');
  }


}
