<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "third_party/MX/Controller.php";
class Profile extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->module = 'admin/';
    // Cek apakah terdapat session dengan nama authenticated
    if (!$this->session->userdata('authenticated')) // Jika tidak ada
      redirect('login_admin'); // Redirect ke halaman login
    $this->load->model($this->module . 'profile_m');
  }

  public function index()
  {
    $data['title'] = 'Profile';
    $data['module'] = $this->module;
    $id = $this->session->userdata('id');
    $data['user'] = $this->profile_m->getProfile($id);
    $this->load->view('templates/admin/head.php', $data);
    $this->load->view('templates/admin/navbar.php');
    $this->load->view('templates/admin/sidebar.php');
    $this->load->view($this->module . 'profile_v', $data);
    $this->load->view('templates/admin/js.php');
    $this->load->view('templates/admin/footer.php');
  }

  private function _do_upload()
  {
    $config['upload_path']          = 'upload/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 4096; //set max size allowed in Kilobyte
    $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

    $this->load->library('upload', $config);
    $this->upload->initialize($config);

    if (!$this->upload->do_upload('photo')) //upload and validate
    {
      $return = $this->upload->display_errors();
      return $return;
    }
    return $this->upload->data('file_name');
  }

  function update()
  {

    $id = $this->input->post('id');
    $username = $this->input->post('username');
    $nama = $this->input->post('nama');
    $password = $this->input->post('password');
    $pass = md5($password);

    if (strlen($password) == 0) {
      $data = array(
        'username' => $username,
        'nama' => $nama,
      );
    } else {
      $data = array(
        'username' => $username,
        'nama' => $nama,
        'password' => $pass,

      );
    }



    if ($this->input->post('remove_photo')) // if remove photo checked
    {
      if (file_exists('upload/' . $this->input->post('remove_photo')) && $this->input->post('remove_photo'))
        unlink('upload/' . $this->input->post('remove_photo'));
      $data['gambar'] = '';
    }

    if (!empty($_FILES['photo']['name'])) {
      $upload = $this->_do_upload();

      //delete file
      $person = $this->profile_m->get_by_id($this->input->post('id'));
      if (file_exists('upload/' . $person->gambar) && $person->gambar)
        unlink('upload/' . $person->gambar);
      $data['gambar'] = $upload;
    }

    $this->profile_m->update_profile(array('id' => $this->input->post('id')), $data);
    echo json_encode(array("status" => TRUE));
    $this->session->set_flashdata('pesan','Profile berhasil di update.');
    redirect('admin/profile');
  }
}
