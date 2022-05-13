<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_m');
    }

    function index()
    {
        // Jika user sudah login (Session authenticated ditemukan)
        if ($this->session->userdata('authenticated'))

            redirect('login');
        $data['title'] = 'Login Page';
        $this->load->view('login_v', $data);
    }
    // Redirect ke page sesuai role

    //Proses Login
    function login()
    {
        $username = htmlspecialchars($this->input->post('nik', TRUE), ENT_QUOTES); // Ambil isi dari inputan username pada form login
        $password = md5($this->input->post('password')); // Ambil isi dari inputan password pada form login dan encrypt dengan md5               
        $user = $this->login_m->get($username); // Panggil fungsi get yang ada di UserModel.php
        if (empty($user)) { // Jika hasilnya kosong / user tidak ditemukan
            $this->session->set_flashdata('error', 'Username tidak terdaftar'); // Buat session flashdata
            redirect('login'); // Redirect ke halaman login
        } else {
            if ($password == $user->password) { // Jika password yang diinput sama dengan password yang didatabase

                $session = array(
                    'authenticated' => true, // Buat session authenticated dengan value true
                    'id' => $user->id, // Buat session authenticated dengan value true
                    'id_kk' => $user->id_kk,  // Buat session username
                    'no_rt' => $user->no_rt,
                    'nama' => $user->nama,
                );

                $this->session->set_userdata($session); // Buat session sesuai $session

                redirect('warga');

                // Redirect ke halaman sesuai role
                $this->session->set_flashdata('success');
                 // Buat session flashdata
                // Redirect ke halaman sesuai role
            } else {
                $this->session->set_flashdata('error', 'Password salah'); // Buat session flashdata
                redirect('login'); // Redirect ke halaman login
            }
        }
    }
    //Proses Login
    function login_admin()
    {
        // Jika user sudah login (Session authenticated ditemukan)
        if ($this->session->userdata('authenticated'))

            // Redirect ke page sesuai role
            if ($this->session->userdata('role') == 'admin') {
                redirect('admin');
            }

        $data['title'] = 'Login Page';
        $this->load->view('login_admin_v', $data);
    }

    function verif_admin()
    {
        $username = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES); // Ambil isi dari inputan username pada form login
        $password = md5($this->input->post('password')); // Ambil isi dari inputan password pada form login dan encrypt dengan md5               
        $user = $this->login_m->getAdmin($username); // Panggil fungsi get yang ada di UserModel.php
        if (empty($user)) { // Jika hasilnya kosong / user tidak ditemukan
            $this->session->set_flashdata('error', 'Username tidak terdaftar'); // Buat session flashdata
            redirect('login_admin'); // Redirect ke halaman login
        } else {
            if ($password == $user->password) { // Jika password yang diinput sama dengan password yang didatabase

                $session = array(
                    'authenticated' => true,
                    'id' => $user->id, // Buat session authenticated dengan value true
                    'nama' => $user->nama,
                    'username' => $user->username,
                    'foto' => $user->gambar // Buat session authenticated
                );

                $this->session->set_userdata($session); // Buat session sesuai $session
                // Redirect ke halaman sesuai role
               
                redirect('admin');
                
                $this->session->set_flashdata('success'); // Buat session flashdata
                // Redirect ke halaman sesuai role
            } else {
                $this->session->set_flashdata('error', 'Password salah'); // Buat session flashdata
                redirect('login_admin'); // Redirect ke halaman login
            }
        }
    }

    

    // Login sebagai Pengurus
    function login_pengurus()
    {
        // Jika user sudah login (Session authenticated ditemukan)
        if ($this->session->userdata('authenticated'))

            // Redirect ke page sesuai role
            if ($this->session->userdata('role') == 'RW') {
                redirect('rw');
            }else if ($this->session->userdata('role') == 'RT') {
            redirect('rt');
        }else{
            redirect('login_pengurus');
        }
        $data['title'] = 'Login Page Pengurus';
        $this->load->view('login_pengurus_v', $data);
    }

    function verif_pengurus()
    {
        $nik = htmlspecialchars($this->input->post('nik', TRUE), ENT_QUOTES); // Ambil isi dari inputan username pada form login
        $password = md5($this->input->post('password')); // Ambil isi dari inputan password pada form login dan encrypt dengan md5               
        $user = $this->login_m->getData($nik); // Panggil fungsi get yang ada di UserModel.php
        if (empty($user)) { // Jika hasilnya kosong / user tidak ditemukan
            $this->session->set_flashdata('error', 'Username tidak terdaftar'); // Buat session flashdata
            redirect('login_pengurus'); // Redirect ke halaman login
        } else {
            if ($password == $user->password) { // Jika password yang diinput sama dengan password yang didatabase
                if($user->role == "RW")
                {
                    $session = array(
                        'authenticated' => true,
                        'id' => $user->id, // Buat session authenticated dengan value true
                        'nama' => $user->nama,
                        'no_rt' => $user->no_rt,
                        'role' => $user->role,
                    );     
                }else if($user->role == "RT")
                {
                    $session = array(
                        'authenticated' => true,
                        'id' => $user->id, // Buat session authenticated dengan value true
                        'nama' => $user->nama,
                        'no_rt' => $user->no_rt,
                        'role' => $user->role,
                    );     
                }
                

                $this->session->set_userdata($session); // Buat session sesuai $session
                // Redirect ke halaman sesuai role
               
                if ($this->session->userdata('role') == 'RW') {
                    redirect('rw');
                }
                if ($this->session->userdata('role') == 'RT') {
                    redirect('rt');
                }                
                $this->session->set_flashdata('success'); // Buat session flashdata
                // Redirect ke halaman sesuai role
            } else {
                $this->session->set_flashdata('error', 'Password salah'); // Buat session flashdata
                redirect('login_pengurus'); // Redirect ke halaman login
            }
        }
    }
    //Logout
    function logout()
    {
        $this->session->sess_destroy(); // Hapus semua session
        redirect('login'); // Redirect ke halaman login
    }
    //Logout
}
