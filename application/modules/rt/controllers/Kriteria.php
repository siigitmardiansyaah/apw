<?php 
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "third_party/MX/Controller.php";


class Kriteria extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->module = 'rt/';

      $this->load->model($this->module . 'kriteria_m');
    // Cek apakah terdapat session dengan nama authenticated
    if( ! $this->session->userdata('authenticated')) // Jika tidak ada
    redirect('login_admin'); // Redirect ke halaman login
  }

  public function index()
    {
        $data['title'] = 'Data Kriteria SPK';
        $data['module'] = $this->module;
        $data['aspek'] = $this->kriteria_m->getAspek();
        $this->load->view('templates/admin/head.php', $data);
        $this->load->view('templates/admin/navbar.php');
        $this->load->view('templates/admin/sidebar_rt.php');
        $this->load->view($this->module . 'kriteria_v', $data);
        $this->load->view('templates/admin/js.php');
        $this->load->view($this->module . 'js/kriteria_js', $data);
        $this->load->view('templates/admin/footer.php');
    }

    function getKriteria()
    {
        $list = $this->kriteria_m->getKriteria();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->aspek;
            $row[] = $field->faktor;
            $row[] = $field->target;
            $row[] = $field->type;
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Edit" onclick="edit(' . "'" . $field->id_faktor . "'" . ')"><i class="fa fa-edit"></i> Edit</a>
            <a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_data(' . "'" . $field->id_faktor . "'" . ')"><i class="fa fa-trash"></i> Delete</a>';
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->kriteria_m->count_all(),
            "recordsFiltered" => $this->kriteria_m->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->kriteria_m->get_by_id($id);
        echo json_encode($data);
    }

  

    public function ajax_add()
    {
        $id_aspek = $this->input->post('id_aspek',TRUE);
        $faktor = $this->input->post('faktor',TRUE);
        $target = $this->input->post('target',TRUE);
        $type = $this->input->post('type',TRUE);
        $insert = $this->kriteria_m->save($id_aspek,$faktor,$target,$type);
        echo json_encode(array("status" => TRUE));
    }
	
	public function ajax_update()
    {
        $id_aspek = $this->input->post('id_aspek',TRUE);
        $faktor = $this->input->post('faktor',TRUE);
        $target = $this->input->post('target',TRUE);
        $type = $this->input->post('type',TRUE);
        $id = $this->input->post('id');
        $this->kriteria_m->update_data($id_aspek,$faktor,$target,$type, $id);
        echo json_encode(array("status" => TRUE));
    }
	
	public function ajax_delete($id)
    {
        $this->kriteria_m->delete_data($id);
        echo json_encode(array("status" => TRUE));
    }
	

}