<?php 
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "third_party/MX/Controller.php";


class Role extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->module = 'rw/';

      $this->load->model($this->module . 'role_m');
    // Cek apakah terdapat session dengan nama authenticated
    if( ! $this->session->userdata('authenticated')) // Jika tidak ada
    redirect('login_pengurus'); // Redirect ke halaman login
  }

  public function index()
    {
        $data['title'] = 'Role Penduduk';
        $data['module'] = $this->module;
        $data['data'] = $this->role_m->getWarga();
        $this->load->view('templates/admin/head.php', $data);
        $this->load->view('templates/admin/navbar.php');
        $this->load->view('templates/admin/sidebar_rw.php');
        $this->load->view($this->module . 'role_v', $data);
        $this->load->view('templates/admin/js.php');
        $this->load->view($this->module . 'js/role_js', $data);
        $this->load->view('templates/admin/footer.php');
    }

    function getRole()
    {
        $list = $this->role_m->getRole();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nama;
            $row[] = $field->role;
            $row[] = $field->rt_no;
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Edit" onclick="edit(' . "'" . $field->id_role . "'" . ')"><i class="fa fa-edit"></i> Edit</a>
            <a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_data(' . "'" . $field->id_role . "'" . ')"><i class="fa fa-trash"></i> Delete</a>';
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->role_m->count_all(),
            "recordsFiltered" => $this->role_m->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->role_m->get_by_id($id);
        echo json_encode($data);
    }

  

    public function ajax_add()
    {
        $id_penduduk = $this->input->post('id_penduduk',TRUE);
        $role = $this->input->post('role',TRUE);
        $no_rt = $this->input->post('no_rt',TRUE);
        if($role == null)
        {
            $insert = $this->role_m->save1($id_penduduk,$role);
            echo json_encode(array("status" => TRUE));
        }else{
            $insert = $this->role_m->save($id_penduduk,$role,$no_rt);
            echo json_encode(array("status" => TRUE));
        }
        
    }
	
	public function ajax_update()
    {
        $id_penduduk = $this->input->post('id_penduduk',TRUE);
        $role = $this->input->post('role',TRUE);
        $no_rt = $this->input->post('no_rt',TRUE);
        $id = $this->input->post('id');

        if($role == 'RW')
        {
            $this->role_m->update_data1($id_penduduk,$role, $id);
            echo json_encode(array("status" => TRUE));
        }else{
            $this->role_m->update_data($id_penduduk,$role,$no_rt, $id);
            echo json_encode(array("status" => TRUE));
        }
    }
 
	
	public function ajax_delete($id)
    {
        $this->role_m->delete_data($id);
        echo json_encode(array("status" => TRUE));
    }
	

}