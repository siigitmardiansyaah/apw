<?php 
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "third_party/MX/Controller.php";


class Agama extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->module = 'admin/';

      $this->load->model($this->module . 'agama_m');
    // Cek apakah terdapat session dengan nama authenticated
    if( ! $this->session->userdata('authenticated')) // Jika tidak ada
    redirect('login_admin'); // Redirect ke halaman login
  }

  public function index()
    {
        $data['title'] = 'Master Data Agama';
        $data['module'] = $this->module;
        $this->load->view('templates/admin/head.php', $data);
        $this->load->view('templates/admin/navbar.php');
        $this->load->view('templates/admin/sidebar.php');
        $this->load->view($this->module . 'agama_v', $data);
        $this->load->view('templates/admin/js.php');
        $this->load->view($this->module . 'js/js_agama', $data);
        $this->load->view('templates/admin/footer.php');
    }

    function getAgama()
    {
        $list = $this->agama_m->getAgama();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->agama;
            $row[] = $field->deskripsi;
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Edit" onclick="edit(' . "'" . $field->id_agama . "'" . ')"><i class="fa fa-edit"></i> Edit</a>
            <a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_data(' . "'" . $field->id_agama . "'" . ')"><i class="fa fa-trash"></i> Delete</a>';
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->agama_m->count_all(),
            "recordsFiltered" => $this->agama_m->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->agama_m->get_by_id($id);
        echo json_encode($data);
    }

  

    public function ajax_add()
    {
        $agama = $this->input->post('agama',TRUE);
        $deskripsi = $this->input->post('deskripsi',TRUE);
        $insert = $this->agama_m->save($agama,$deskripsi);
        echo json_encode(array("status" => TRUE));
    }
	
	public function ajax_update()
    {
        $agama = $this->input->post('agama');
        $deskripsi = $this->input->post('deskripsi');
        $id = $this->input->post('id');

        $this->agama_m->update_data($agama,$deskripsi, $id);
        echo json_encode(array("status" => TRUE));
    }
	
	public function ajax_delete($id)
    {
        $this->agama_m->delete_data($id);
        echo json_encode(array("status" => TRUE));
    }
	

}