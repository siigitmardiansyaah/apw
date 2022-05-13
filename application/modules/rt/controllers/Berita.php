<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "third_party/MX/Controller.php";
date_default_timezone_set('Asia/Jakarta');

class Berita extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->module = 'rt/';
    // Cek apakah terdapat session dengan nama authenticated
    if (!$this->session->userdata('authenticated')) // Jika tidak ada
      redirect('login_pengurus'); // Redirect ke halaman login
    $this->load->model($this->module . 'berita_m');
  }

  public function index()
  {
    $data['title'] = 'Data Pengumuman';
    $data['module'] = $this->module;
    $this->load->view('templates/admin/head.php', $data);
    $this->load->view('templates/admin/navbar.php');
    $this->load->view('templates/admin/sidebar_rt.php');
    $this->load->view($this->module . 'berita_v', $data);
    $this->load->view('templates/admin/js.php');
    $this->load->view($this->module . 'js/berita_js', $data);
    $this->load->view('templates/admin/footer.php');
  }

  public function tambah_berita()
  {
      $data['title'] = 'Tambah Berita';
      $data['module'] = $this->module;
      $this->load->view('templates/admin/head.php', $data);
      $this->load->view('templates/admin/navbar.php');
      $this->load->view('templates/admin/sidebar_rt.php');
      $this->load->view($this->module . 'tambah_v', $data);
      $this->load->view('templates/admin/js.php');
      $this->load->view($this->module . 'js/berita_js', $data);
      $this->load->view('templates/admin/footer.php');
  }

  public function ajax_edit($id)
{
    $where = array('id_berita' => $id);
    $data['user'] = $this->berita_m->edit_data($where,'pengumuman')->result();
        $data['title'] = 'Edit Berita';
        $data['module'] = $this->module;
        $this->load->view('templates/admin/head.php', $data);
        $this->load->view('templates/admin/navbar.php');
        $this->load->view('templates/admin/sidebar_rt.php');
        $this->load->view($this->module . 'edit_v', $data);
        $this->load->view('templates/admin/js.php');
        $this->load->view($this->module . 'js/berita_js', $data);
        $this->load->view('templates/admin/footer.php');
}

  function getBerita()
    {
        $no_urut = $this->session->userdata('no_rt');
        $list = $this->berita_m->getBerita($no_urut);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->judul;
            $row[] = $field->isi;
            $row[] = $field->tanggal;
            $row[] = $field->nama;
            $row[] = $field->publish;
            $row[] = '<a class="btn btn-xs btn-primary" href="'.base_url('rt/berita/ajax_edit/'.+$field->id_berita).'" title="Edit"><i class="fa fa-edit"></i> Edit</a>
            <a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_person(' . "'" . $field->id_berita . "'" . ')"><i class="fa fa-trash"></i> Delete</a>';
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->berita_m->count_all(),
            "recordsFiltered" => $this->berita_m->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function ajax_add()
    {
        $judul = $this->input->post('judul');
        $isi = $this->input->post('isi');
        $tanggal = date('Y-m-d H:i:s');
        $publish = $this->input->post('publish');
        $id_pembuat = $this->session->userdata('id');
    
        $this->form_validation->set_rules(
            'judul','Judul','required',array(
                'required' => '%s Tidak Boleh Kosong'
            ));
        $this->form_validation->set_rules(
            'isi',' Nama','required',array(
                'required' => '%s Tidak Boleh Kosong',
            ));
        
        
        
            if ($this->form_validation->run() == FALSE) {
                $session = array(
                'judul' => $judul,
                'isi' => $isi,
                'pesan' => '<div class="alert alert-danger"><strong>' . validation_errors() .
               '</strong></div>'
                );
                $this->session->set_flashdata($session);
                redirect('rt/berita/tambah_berita');
                } else {
                $querysimpandata = $this->berita_m->simpandata($judul,$isi,$tanggal,$publish,$id_pembuat);
                if ($querysimpandata) {
                $pesansukes = '<div class="alert alert-success"><strong>Data berhasil
               disimpan</strong></div>';
                $this->session->set_flashdata('pesan', $pesansukes);
                redirect('rt/berita');
                
                }
    }
}

public function ajax_update()
    {
        $id = $this->input->post('id');
        $judul = $this->input->post('judul');
        $isi = $this->input->post('isi');
        $tanggal = date('Y-m-d H:i:s');
        $publish = $this->input->post('publish');
        $id_pembuat = $this->session->userdata('id');

     

        $this->form_validation->set_rules(
            'judul','Judul','required',array(
                'required' => '%s Tidak Boleh Kosong'
            ));
        $this->form_validation->set_rules(
            'isi',' isi','required',array(
                'required' => '%s Tidak Boleh Kosong',
            ));
            
            if ($this->form_validation->run() == FALSE) {
                $session = array(
                    'judul' => $judul,
                    'isi' => $isi,

                'pesan' => '<div class="alert alert-danger"><strong>' . validation_errors() .
               '</strong></div>'
                );
                $this->session->set_flashdata($session);
                redirect('rt/berita/ajax_edit');
                }else
                {

        $data = array(
            'judul' => $judul,
            'isi' => $isi,
            'tanggal' => $tanggal,
            'publish' => $publish,
            'pembuat' => $id_pembuat
           
        );
       
		$this->berita_m->update(array('id_berita' => $id), $data);
        echo json_encode(array("status" => TRUE));
        redirect('rt/berita');
    }
}



    public function ajax_delete($id)
    {
       //delete fil
		$this->berita_m->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
    }


}
