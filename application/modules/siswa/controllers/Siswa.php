<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Siswa extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_Siswa']);
    }
    public function index()
    {
        $data['title'] = "Siswa";
        $data['siswa'] = $this->M_Siswa->get_all();
        $data['css'] = ["https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('siswa');
        $this->load->view('template/footer');
    }
}