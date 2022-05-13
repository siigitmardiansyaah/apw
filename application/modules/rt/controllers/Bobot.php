<?php 
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "third_party/MX/Controller.php";


class Bobot extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->module = 'rt/';

      $this->load->model($this->module . 'bobot_m');
    // Cek apakah terdapat session dengan nama authenticated
    if( ! $this->session->userdata('authenticated')) // Jika tidak ada
    redirect('login_pengurus'); // Redirect ke halaman login
  }

  public function index()
    {
        $data['title'] = 'Data Bobot GAP SPK';
        $data['module'] = $this->module;
        $this->load->view('templates/admin/head.php', $data);
        $this->load->view('templates/admin/navbar.php');
        $this->load->view('templates/admin/sidebar_rt.php');
        $this->load->view($this->module . 'bobot_v', $data);
        $this->load->view('templates/admin/js.php');
        $this->load->view($this->module . 'js/bobot_js', $data);
        $this->load->view('templates/admin/footer.php');
    }

    function getBobot()
    {
        $list = $this->bobot_m->getBobot();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->selisih;
            $row[] = $field->bobot;
            $row[] = $field->keterangan;
            $row[] = '
            <a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_data(' . "'" . $field->selisih . "'" . ')"><i class="fa fa-trash"></i> Delete</a>';
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->bobot_m->count_all(),
            "recordsFiltered" => $this->bobot_m->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->bobot_m->get_by_id($id);
        echo json_encode($data);
    }

  

    public function ajax_add()
    {
        $selisih = $this->input->post('selisih',TRUE);
        $bobot = $this->input->post('bobot',TRUE);
        $keterangan = $this->input->post('keterangan',TRUE);
        $insert = $this->bobot_m->save($selisih,$bobot,$keterangan);
        echo json_encode(array("status" => TRUE));
    }
	
	public function ajax_update()
    {
        $selisih = $this->input->post('selisih',TRUE);
        $bobot = $this->input->post('bobot',TRUE);
        $keterangan = $this->input->post('keterangan',TRUE);
        $id = $this->input->post('id');
        $this->bobot_m->update_data($selisih,$bobot,$keterangan, $id);
        echo json_encode(array("status" => TRUE));
    }
	
	public function ajax_delete($id)
    {
        $this->bobot_m->delete_data($id);
        echo json_encode(array("status" => TRUE));
    }
	

}