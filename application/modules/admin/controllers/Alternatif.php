<?php 
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "third_party/MX/Controller.php";


class Alternatif extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->module = 'admin/';

      $this->load->model($this->module . 'alternatif_m');
    // Cek apakah terdapat session dengan nama authenticated
    if( ! $this->session->userdata('authenticated')) // Jika tidak ada
    redirect('login_admin'); // Redirect ke halaman login
  }

  public function index()
    {
        $data['title'] = 'Data Alternatif';
        $data['module'] = $this->module;
        $data['warga'] = $this->alternatif_m->getWarga();
        
        $this->load->view('templates/admin/head.php', $data);
        $this->load->view('templates/admin/navbar.php');
        $this->load->view('templates/admin/sidebar.php');
        $this->load->view($this->module . 'alternatif_v', $data);
        $this->load->view('templates/admin/js.php');
        $this->load->view($this->module . 'js/alternatif_js', $data);
        $this->load->view('templates/admin/footer.php');
    }

    function getAlternatif()
    {
        $list = $this->alternatif_m->getAlternatif();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->kd_alternatif;
            $row[] = $field->nama;
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Edit" onclick="edit(' . "'" . $field->id_alternatif . "'" . ')"><i class="fa fa-edit"></i> Edit</a>
            <a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_data(' . "'" . $field->id_alternatif . "'" . ')"><i class="fa fa-trash"></i> Delete</a>';
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->alternatif_m->count_all(),
            "recordsFiltered" => $this->alternatif_m->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->alternatif_m->get_by_id($id);
        echo json_encode($data);
    }

  

    public function ajax_add()
    {
        $kd_alternatif = $this->input->post('kd_alternatif',TRUE);
        $id_penduduk = $this->input->post('id_penduduk',TRUE);
        $insert = $this->alternatif_m->save($kd_alternatif,$id_penduduk);
        echo json_encode(array("status" => TRUE));
    }
	
	public function ajax_update()
    {
        $kd_alternatif = $this->input->post('kd_alternatif',TRUE);
        $id_penduduk = $this->input->post('id_penduduk',TRUE);
        $id = $this->input->post('id');

        $this->alternatif_m->update_data($kd_alternatif,$id_penduduk, $id);
        echo json_encode(array("status" => TRUE));
    }
	
	public function ajax_delete($id)
    {
        $this->alternatif_m->delete_data($id);
        echo json_encode(array("status" => TRUE));
    }
	

}