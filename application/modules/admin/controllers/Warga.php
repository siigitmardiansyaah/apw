<?php 
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "third_party/MX/Controller.php";


class Warga extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->module = 'admin/';

      $this->load->model($this->module . 'warga_m');
      $this->load->model($this->module . 'pindah_m');
      $this->load->model($this->module . 'k_pinda_m');
    // Cek apakah terdapat session dengan nama authenticated
    if( ! $this->session->userdata('authenticated')) // Jika tidak ada
    redirect('login_admin'); // Redirect ke halaman login
  }

  public function index()
    {
        $data['title'] = 'Data Warga Tetap';
        $data['module'] = $this->module;
        $data['agama'] = $this->warga_m->getAgama();
        $data['pendidikan'] = $this->warga_m->getPendidikan();
        $data['kk'] = $this->warga_m->getKK();
        $this->load->view('templates/admin/head.php', $data);
        $this->load->view('templates/admin/navbar.php');
        $this->load->view('templates/admin/sidebar.php');
        $this->load->view($this->module . 'warga_v', $data);
        $this->load->view('templates/admin/js.php');
        $this->load->view($this->module . 'js/warga_js', $data);
        $this->load->view('templates/admin/footer.php');
    }

    function getPenduduk()
    {
        $list = $this->warga_m->getPenduduk();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->no_kk;
            $row[] = $field->nik;
            $row[] = $field->nama;
            $row[] = $field->tmpt_lahir.' , '.date('d M Y', strtotime($field->tgl_lahir));
            $row[] = $field->alamat;
            $row[] = $field->no_rt;
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Edit" onclick="edit(' . "'" . $field->id . "'" . ')"><i class="fa fa-edit"></i> Edit</a>
            <a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_data(' . "'" . $field->id . "'" . ')"><i class="fa fa-trash"></i> Delete</a>'
            ;

            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->warga_m->count_all(),
            "recordsFiltered" => $this->warga_m->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->warga_m->get_by_id($id);
        echo json_encode($data);
    }

  

    public function ajax_add()
    {
        $id_kk = $this->input->post('id_kk',TRUE);
        $nik = $this->input->post('nik',TRUE);
        $nama = $this->input->post('nama',TRUE);
        $tmpt_lahir = $this->input->post('tmpt_lahir',TRUE);
        $tgl_lahir = $this->input->post('tgl_lahir',TRUE);
        $alamat = $this->input->post('alamat',TRUE);
        $no_rt = $this->input->post('no_rt',TRUE);
        $no_telepon = $this->input->post('no_telepon',TRUE);
        $jk = $this->input->post('jk',TRUE);
        $id_agama = $this->input->post('id_agama',TRUE);
        $id_pekerjaan = $this->input->post('pekerjaan',TRUE);
        $id_pendidikan = $this->input->post('id_pendidikan',TRUE);
        $status_perkawinan = $this->input->post('status_perkawinan',TRUE);
        $kewarganegaraan = $this->input->post('kewarganegaraan',TRUE);
        $status_hidup = $this->input->post('status_hidup',TRUE);
        $status_keluarga = $this->input->post('status_keluarga',TRUE);
        $tgl = date('Y-m-d', strtotime($tgl_lahir));
        $insert = $this->warga_m->save($id_kk,$nik,$nama,$tmpt_lahir,$tgl,
        $alamat,$no_rt,$no_telepon,$jk,$id_agama,$id_pekerjaan,$id_pendidikan,$status_perkawinan,
        $kewarganegaraan,$status_hidup,$status_keluarga);
        echo json_encode(array("status" => TRUE));
    }
	
	public function ajax_update()
    {
        $id_kk = $this->input->post('id_kk',TRUE);
        $nik = $this->input->post('nik',TRUE);
        $nama = $this->input->post('nama',TRUE);
        $tmpt_lahir = $this->input->post('tmpt_lahir',TRUE);
        $tgl_lahir = $this->input->post('tgl_lahir',TRUE);
        $alamat = $this->input->post('alamat',TRUE);
        $no_rt = $this->input->post('no_rt',TRUE);
        $no_telepon = $this->input->post('no_telepon',TRUE);
        $jk = $this->input->post('jk',TRUE);
        $id_agama = $this->input->post('id_agama',TRUE);
        $id_pekerjaan = $this->input->post('pekerjaan',TRUE);
        $id_pendidikan = $this->input->post('id_pendidikan',TRUE);
        $status_perkawinan = $this->input->post('status_perkawinan',TRUE);
        $kewarganegaraan = $this->input->post('kewarganegaraan',TRUE);
        $status_hidup = $this->input->post('status_hidup',TRUE);
        $status_keluarga = $this->input->post('status_keluarga',TRUE);
        $id = $this->input->post('id');
        $tgl = date('Y-m-d', strtotime($tgl_lahir));
        $this->warga_m->update_data($id_kk,$nik,$nama,$tmpt_lahir,$tgl,
        $alamat,$no_rt,$no_telepon,$jk,$id_agama,$id_pekerjaan,$id_pendidikan,$status_perkawinan,
        $kewarganegaraan,$status_hidup,$status_keluarga, $id);
        echo json_encode(array("status" => TRUE));
    }
	
	public function ajax_delete($id)
    {
        $this->warga_m->delete_data($id);
        echo json_encode(array("status" => TRUE));
    }

    public function warga_pindah()
    {
        $data['title'] = 'Data Warga Pindah';
        $data['module'] = $this->module;
        $data['data'] = $this->pindah_m->getKKPindah();
        $this->load->view('templates/admin/head.php', $data);
        $this->load->view('templates/admin/navbar.php');
        $this->load->view('templates/admin/sidebar.php');
        $this->load->view($this->module . 'pindah_v', $data);
        $this->load->view('templates/admin/js.php');
        $this->load->view($this->module . 'js/pindah_js');
        $this->load->view('templates/admin/footer.php');
    }


    public function pindah_keluarga($id)
    {
        $data['title'] = 'List Keluarga Pindah';
        $data['module'] = $this->module;
        $data['data'] = $this->k_pinda_m->getKeluargaPindah($id);
        $this->load->view('templates/admin/head.php', $data);
        $this->load->view('templates/admin/navbar.php');
        $this->load->view('templates/admin/sidebar.php');
        $this->load->view($this->module . 'keluarga_pindah_v', $data);
        $this->load->view('templates/admin/js.php');
        $this->load->view($this->module . 'js/pindah_js', $data);
        $this->load->view('templates/admin/footer.php');
    }


    

    

    
	

}