<?php 
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "third_party/MX/Controller.php";


class Kk extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->module = 'rw/';

      $this->load->model($this->module . 'kk_m');
    // Cek apakah terdapat session dengan nama authenticated
    if( ! $this->session->userdata('authenticated')) // Jika tidak ada
    redirect('login_pengurus'); // Redirect ke halaman login
  }

  public function index()
    {
        $data['title'] = 'Data Kartu Keluarga';
        $data['module'] = $this->module;
        $this->load->view('templates/admin/head.php', $data);
        $this->load->view('templates/admin/navbar.php');
        $this->load->view('templates/admin/sidebar_rw.php');
        $this->load->view($this->module . 'kk_v', $data);
        $this->load->view('templates/admin/js.php');
        $this->load->view($this->module . 'js/js_kk', $data);
        $this->load->view('templates/admin/footer.php');
    }

    function getKK()
    {
        $list = $this->kk_m->getKK();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->no_kk;
            $row[] = $field->kepala_keluarga;            
            if($field->status_kk == 1)
            {
                $status_kk = 'Tetap';
            }else if($field->status_kk == 2)
            {
                $status_kk = 'Kontrak';
            }
            $row[] = $status_kk;  
            $row[] = $field->jumlah_keluarga;  

            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->kk_m->count_all(),
            "recordsFiltered" => $this->kk_m->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function ajax_add()
    {
        $no_kk = $this->input->post('no_kk',TRUE);
        $nama = $this->input->post('kepala_keluarga',TRUE);
        $status_kk = $this->input->post('status_kk',TRUE);
        $insert = $this->kk_m->save($no_kk,$nama,$alamat);
        echo json_encode(array("status" => TRUE));
    }
	
	public function ajax_update()
    {
        $no_kk = $this->input->post('no_kk',TRUE);
        $nama = $this->input->post('kepala_keluarga',TRUE);
        $status_kk = $this->input->post('status_kk',TRUE);
        $id = $this->input->post('id');
        $this->kk_m->update_data($no_kk,$nama,$status_kk, $id);
        echo json_encode(array("status" => TRUE));
    }
	
	public function ajax_delete($id)
    {
        $this->kk_m->delete_data($id);
        echo json_encode(array("status" => TRUE));
    }
  

    

}