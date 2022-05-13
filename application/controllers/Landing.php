<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('guest_m');
    }

    function index()
    {
        
        $data['title'] = 'Selamat Datang';
		$data['total_rt'] = $this->guest_m->TotalRT();
		$data['total_kk'] = $this->guest_m->TotalKK();
		$data['total_warga'] = $this->guest_m->TotalWarga();
		$data['rw'] = $this->guest_m->getRW();
		$data['rt'] = $this->guest_m->getRT();
		$this->load->view('landing_v',$data);
    }

    
    
}
