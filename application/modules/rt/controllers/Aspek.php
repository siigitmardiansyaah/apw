<?php 
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "third_party/MX/Controller.php";


class Aspek extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->module = 'rt/';

      $this->load->model($this->module . 'aspek_m');
    // Cek apakah terdapat session dengan nama authenticated
    if( ! $this->session->userdata('authenticated')) // Jika tidak ada
    redirect('login_pengurus'); // Redirect ke halaman login
  }

  public function index()
    {
        $data['title'] = 'Data Aspek SPK';
        $data['module'] = $this->module;
        $this->load->view('templates/admin/head.php', $data);
        $this->load->view('templates/admin/navbar.php');
        $this->load->view('templates/admin/sidebar_rt.php');
        $this->load->view($this->module . 'aspek_v', $data);
        $this->load->view('templates/admin/js.php');
        $this->load->view($this->module . 'js/aspek_js', $data);
        $this->load->view('templates/admin/footer.php');
    }

    function getAspek()
    {
        $list = $this->aspek_m->getAspek();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->aspek;
            $row[] = $field->prosentase;
            $row[] = $field->bobot_core;
            $row[] = $field->bobot_secondary;
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Edit" onclick="edit(' . "'" . $field->id_aspek . "'" . ')"><i class="fa fa-edit"></i> Edit</a>
            <a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_data(' . "'" . $field->id_aspek . "'" . ')"><i class="fa fa-trash"></i> Delete</a>';
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->aspek_m->count_all(),
            "recordsFiltered" => $this->aspek_m->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->aspek_m->get_by_id($id);
        echo json_encode($data);
    }

  

    public function ajax_add()
    {
        $aspek = $this->input->post('aspek',TRUE);
        $prosentase = $this->input->post('prosentase',TRUE);
        $bobot_core = $this->input->post('bobot_core',TRUE);
        $bobot_secondary = $this->input->post('bobot_secondary',TRUE);
        $insert = $this->aspek_m->save($aspek,$prosentase,$bobot_core,$bobot_secondary);
        echo json_encode(array("status" => TRUE));
    }
	
	public function ajax_update()
    {
        $aspek = $this->input->post('aspek',TRUE);
        $prosentase = $this->input->post('prosentase',TRUE);
        $bobot_core = $this->input->post('bobot_core',TRUE);
        $bobot_secondary = $this->input->post('bobot_secondary',TRUE);
        $id = $this->input->post('id');

        $this->aspek_m->update_data($aspek,$prosentase,$bobot_core,$bobot_secondary, $id);
        echo json_encode(array("status" => TRUE));
    }
	
	public function ajax_delete($id)
    {
        $this->aspek_m->delete_data($id);
        echo json_encode(array("status" => TRUE));
    }
	

}