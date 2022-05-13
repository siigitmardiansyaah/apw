<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "third_party/MX/Controller.php";
class Profile extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->module = 'rw/';
    // Cek apakah terdapat session dengan nama authenticated
    if (!$this->session->userdata('authenticated')) // Jika tidak ada
      redirect('login_pengurus'); // Redirect ke halaman login
    $this->load->model($this->module . 'profile_m');
  }

  public function index()
  {
    $data['title'] = 'Profile';
    $data['module'] = $this->module;
    $id = $this->session->userdata('id');
    $data['user'] = $this->profile_m->getProfile($id);
    $data['agama'] = $this->profile_m->getAgama();
        $data['pendidikan'] = $this->profile_m->getPendidikan();
    $this->load->view('templates/admin/head.php', $data);
    $this->load->view('templates/admin/navbar.php');
    $this->load->view('templates/admin/sidebar_rw.php');
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
    $nik = $this->input->post('nik',TRUE);
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
        $status_keluarga = $this->input->post('status_dalam_keluarga',TRUE);
        $tgl = date('Y-m-d', strtotime($tgl_lahir));
    $nama = $this->input->post('nama');
    $password = $this->input->post('password');
    $pass = md5($password);

    if (strlen($password) == 0) {
      $data = array(
        'nik' => $nik,
        'nama' => $nama,
        'tmpt_lahir' => $tmpt_lahir,
        'tgl_lahir' => $tgl,
        'alamat' => $alamat,
        'no_rt' => $no_rt,
        'no_telepon' => $no_telepon,
        'jk' => $jk,
        'id_agama' => $id_agama,
        'pekerjaan' => $id_pekerjaan,
        'id_pendidikan' => $id_pendidikan,
        'status_perkawinan' => $status_perkawinan,
        'kewarganegaraan' => $kewarganegaraan,
        'status_hidup' => $status_hidup,
        'status_perkawinan' => $status_perkawinan,
        'status_dalam_keluarga' => $status_keluarga,
      );
    } else {
      $data = array(
        'nik' => $nik,
        'nama' => $nama,
        'tmpt_lahir' => $tmpt_lahir,
        'tgl_lahir' => $tgl,
        'alamat' => $alamat,
        'no_rt' => $no_rt,
        'no_telepon' => $no_telepon,
        'jk' => $jk,
        'id_agama' => $id_agama,
        'pekerjaan' => $id_pekerjaan,
        'id_pendidikan' => $id_pendidikan,
        'status_perkawinan' => $status_perkawinan,
        'kewarganegaraan' => $kewarganegaraan,
        'status_hidup' => $status_hidup,
        'status_perkawinan' => $status_perkawinan,
        'status_dalam_keluarga' => $status_keluarga,
        'password' => $pass,

      );
    }



    if ($this->input->post('remove_photo')) // if remove photo checked
    {
      if (file_exists('upload/' . $this->input->post('remove_photo')) && $this->input->post('remove_photo'))
        unlink('upload/' . $this->input->post('remove_photo'));
      $data['foto'] = '';
    }

    if (!empty($_FILES['photo']['name'])) {
      $upload = $this->_do_upload();

      //delete file
      $person = $this->profile_m->get_by_id($this->input->post('id'));
      if (file_exists('upload/' . $person->foto) && $person->foto)
        unlink('upload/' . $person->foto);
      $data['foto'] = $upload;
    }

    $this->profile_m->update_profile(array('id' => $this->input->post('id')), $data);
    echo json_encode(array("status" => TRUE));
    $this->session->set_flashdata('pesan','Profile berhasil di update.');
    redirect('rw/profile');
  }
}
