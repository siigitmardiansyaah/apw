<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('register_m');
    }

    function index()
    {
        
        $data['title'] = 'Register Page';
        $data['agama'] = $this->register_m->getAgama();
        $data['pendidikan'] = $this->register_m->getPendidikan();
        $this->load->view('register_v', $data);
    }

    function getKK(){
        $nik=$this->input->post('kk');
        $data=$this->register_m->getKK($nik);
        echo json_encode($data);
    }
    //Proses Login
    function register()
    {
        $kk = $this->input->post('kk',TRUE);
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
        $password = md5($this->input->post('password',TRUE));
        $tgl = date('Y-m-d', strtotime($tgl_lahir));
        $sql = $this->db->query("SELECT no_kk FROM kartu_keluarga where no_kk = $kk AND status_kk IN(1,2)");
        $cek_nik = $sql->num_rows();
        if ($cek_nik == 0) {
            $pesan='<div class="alert alert-danger"><strong> NO Kartu Keluarga Tidak Ada
               </strong></div>';
            $this->session->set_flashdata('message', $pesan);
            redirect('register');
        }else{
            $sql = $this->register_m->getKK($kk);
            foreach($sql as $row){
                $id_kk = $row->id_kk;
            }
            $insert = $this->register_m->save($id_kk,$nik,$nama,$tmpt_lahir,$tgl,
            $alamat,$no_rt,$no_telepon,$jk,$id_agama,$id_pekerjaan,$id_pendidikan,$status_perkawinan,
            $kewarganegaraan,$password);
            echo json_encode(array("status" => TRUE));
            redirect('login');
        } 
    }
    //Proses Login

    
}
