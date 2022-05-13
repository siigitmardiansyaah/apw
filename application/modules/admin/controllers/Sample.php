<?php 
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "third_party/MX/Controller.php";


class Sample extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->module = 'admin/';

      $this->load->model($this->module . 'sample_m');
    // Cek apakah terdapat session dengan nama authenticated
    if( ! $this->session->userdata('authenticated')) // Jika tidak ada
    redirect('login_admin'); // Redirect ke halaman login
  }

  public function index()
    {
        $data['title'] = 'Data Sample SPK';
        $data['module'] = $this->module;
        $data['warga'] = $this->sample_m->getAlternatif();
        $data['kriteria'] = $this->sample_m->getKriteria();
        $this->load->view('templates/admin/head.php', $data);
        $this->load->view('templates/admin/navbar.php');
        $this->load->view('templates/admin/sidebar.php');
        $this->load->view($this->module . 'sample_v', $data);
        $this->load->view('templates/admin/js.php');
        $this->load->view($this->module . 'js/sample_js', $data);
        $this->load->view('templates/admin/footer.php');
    }

    function getSample()
    {
        $list = $this->sample_m->getSample();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->kd_alternatif.' - '.$field->nama;
            $row[] = $field->faktor;
            $row[] = $field->value;
            $row[] = '<a class="btn btn-xs btn-info" href="javascript:void(0)" title="Edit" onclick="edit(' . "'" . $field->id_sample . "'" . ')"><i class="fa fa-edit"></i> Edit</a>
            <a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_data(' . "'" . $field->id_sample . "'" . ')"><i class="fa fa-trash"></i> Delete</a>';
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->sample_m->count_all(),
            "recordsFiltered" => $this->sample_m->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->sample_m->get_by_id($id);
        echo json_encode($data);
    }

  

    public function ajax_add()
    {
        $id_penduduk = $this->input->post('id_penduduk',TRUE);
        $id_faktor = $this->input->post('id_faktor',TRUE);
        $value = $this->input->post('value',TRUE);
        $sql = $this->db->query("SELECT id_alternatif,id_faktor FROM pm_sample where id_alternatif = '$id_penduduk' AND id_faktor = '$id_faktor'");
        $cek_data = $sql->num_rows();
        if($cek_data > 0)
        {
            $pesan='Data Nama dan Faktor sudah ada';
            $this->session->set_flashdata('message', $pesan);
            }else{
            $insert = $this->sample_m->save($id_penduduk,$id_faktor,$value);
            echo json_encode(array("status" => TRUE));
        }
        
       
    }
	
	public function ajax_update()
    {
        $id_penduduk = $this->input->post('id_penduduk',TRUE);
        $id_faktor = $this->input->post('id_faktor',TRUE);
        $value = $this->input->post('value',TRUE);
        $id = $this->input->post('id');
        $sql = $this->db->query("SELECT id_alternatif,id_faktor FROM pm_sample where id_alternatif = '$id_penduduk' AND id_faktor = '$id_faktor'");
        $cek_data = $sql->num_rows();
        if($cek_data == 0)
        {
            $this->sample_m->update_data($id_penduduk,$id_faktor,$value, $id);
            echo json_encode(array("status" => TRUE));
            
        }else{
            $pesan='Data Nama dan Faktor Tidak Ada, Silahkan membuat dengan menginput data baru';
            $this->session->set_flashdata('message', $pesan);
        }
          
        
      
    }
	
	public function ajax_delete($id)
    {
        $this->sample_m->delete_data($id);
        echo json_encode(array("status" => TRUE));
    }
	

}