<?php 
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "third_party/MX/Controller.php";


class Pendidikan extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->module = 'admin/';

      $this->load->model($this->module . 'pendidikan_m');
    // Cek apakah terdapat session dengan nama authenticated
    if( ! $this->session->userdata('authenticated')) // Jika tidak ada
    redirect('login_admin'); // Redirect ke halaman login
  }

  public function index()
    {
        $data['title'] = 'Master Data Pendidikan';
        $data['module'] = $this->module;
        $this->load->view('templates/admin/head.php', $data);
        $this->load->view('templates/admin/navbar.php');
        $this->load->view('templates/admin/sidebar.php');
        $this->load->view($this->module . 'pendidikan_v', $data);
        $this->load->view('templates/admin/js.php');
        $this->load->view($this->module . 'js/js_pendidikan', $data);
        $this->load->view('templates/admin/footer.php');
    }

    function getPendidikan()
    {
        $list = $this->pendidikan_m->getPendidikan();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nama_pendidikan;
           
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Edit" onclick="edit(' . "'" . $field->id_pendidikan . "'" . ')"><i class="fa fa-edit"></i> Edit</a>
            <a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_data(' . "'" . $field->id_pendidikan . "'" . ')"><i class="fa fa-trash"></i> Delete</a>';
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->pendidikan_m->count_all(),
            "recordsFiltered" => $this->pendidikan_m->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->pendidikan_m->get_by_id($id);
        echo json_encode($data);
    }

  

    public function ajax_add()
    {
        $nama = $this->input->post('pendidikan',TRUE);
        $insert = $this->pendidikan_m->save($nama);
        echo json_encode(array("status" => TRUE));
    }
	
	public function ajax_update()
    {
        $nama = $this->input->post('pendidikan');
        $id = $this->input->post('id');

        $this->pendidikan_m->update_data($nama, $id);
        echo json_encode(array("status" => TRUE));
    }
	
	public function ajax_delete($id)
    {
        $this->pendidikan_m->delete_data($id);
        echo json_encode(array("status" => TRUE));
    }
	

}