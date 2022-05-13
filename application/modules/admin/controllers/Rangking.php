<?php 
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "third_party/MX/Controller.php";


class Rangking extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->module = 'admin/';
    $this->load->helper('pm');

      $this->load->model($this->module . 'rangking_m');
    // Cek apakah terdapat session dengan nama authenticated
    if( ! $this->session->userdata('authenticated')) // Jika tidak ada
    redirect('login_admin'); // Redirect ke halaman login
  }

  public function index()
    {
        $data['title'] = 'Data Rangking SPK';
        $data['module'] = $this->module;
        $data['aspek'] = $this->rangking_m->TotalAspek();
        $data['faktor'] = $this->rangking_m->Faktor();
        $data['faktor1'] = $this->rangking_m->Faktor1();
        $data['warga'] = $this->rangking_m->Warga();
        foreach($data['warga'] as $wa)
        {
          $id_warga = $wa['id_alternatif'];
        }
        foreach($data['aspek'] as $wa)
        {
          $id_aspek = $wa['id_aspek'];
        }
        foreach($data['faktor'] as $wa)
        {
          $type = $wa['type'];
        }
        $data['nilai'] = $this->rangking_m->NilaiWarga($id_warga);
        $data['cf_sf'] = $this->rangking_m->TotalCFSF();
        $data['warga1'] = $this->rangking_m->CS_SFWarga($id_warga,$id_aspek,$type);
        $data['rangking'] = $this->rangking_m->Rangking();


        $this->load->view('templates/admin/head.php', $data);
        $this->load->view('templates/admin/navbar.php');
        $this->load->view('templates/admin/sidebar.php');
        $this->load->view($this->module . 'rangking_v', $data);
        $this->load->view('templates/admin/js.php');
        $this->load->view($this->module . 'js/rangking_js', $data);
        $this->load->view('templates/admin/footer.php');
    }

	

}