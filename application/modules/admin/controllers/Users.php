<?php 
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "third_party/MX/Controller.php";


class Users extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->module = 'admin/';

      $this->load->model($this->module . 'users_m');
    // Cek apakah terdapat session dengan nama authenticated
    if( ! $this->session->userdata('authenticated')) // Jika tidak ada
    redirect('login_admin'); // Redirect ke halaman login
  }

  public function index()
    {
        $data['title'] = 'Data Users';
        $data['module'] = $this->module;
        $this->load->view('templates/admin/head.php', $data);
        $this->load->view('templates/admin/navbar.php');
        $this->load->view('templates/admin/sidebar.php');
        $this->load->view($this->module . 'users_v', $data);
        $this->load->view('templates/admin/js.php');
        $this->load->view($this->module . 'js/users_js', $data);
        $this->load->view('templates/admin/footer.php');
    }

    function getUsers()
    {
        $list = $this->users_m->getUsers();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->username;
            $row[] = $field->nama;
            $row[] = '<a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Edit" onclick="edit(' . "'" . $field->id . "'" . ')"><i class="fa fa-edit"></i> Edit</a>
            <a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_data(' . "'" . $field->id . "'" . ')"><i class="fa fa-trash"></i> Delete</a>';
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->users_m->count_all(),
            "recordsFiltered" => $this->users_m->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->users_m->get_by_id($id);
        echo json_encode($data);
    }

  

    public function ajax_add()
    {
        $username = $this->input->post('username',TRUE);
        $nama = $this->input->post('nama',TRUE);
        $password = md5($this->input->post('password',TRUE));
        $insert = $this->users_m->save($username,$nama,$password);
        echo json_encode(array("status" => TRUE));
    }
	
	public function ajax_update()
    {
        $username = $this->input->post('username',TRUE);
        $nama = $this->input->post('nama',TRUE);
        $password = md5($this->input->post('password',TRUE));
        $id = $this->input->post('id');
        if($password == null)
        {
            $this->users_m->update_data1($username,$nama, $id);
            echo json_encode(array("status" => TRUE));
        }else{
            $this->users_m->update_data($username,$nama,$password, $id);
            echo json_encode(array("status" => TRUE));
        }

     
    }
	
	public function ajax_delete($id)
    {
        $this->users_m->delete_data($id);
        echo json_encode(array("status" => TRUE));
    }
	

}