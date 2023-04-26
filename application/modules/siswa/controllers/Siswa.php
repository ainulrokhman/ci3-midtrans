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
        $data['kelas'] = $this->db->get('class')->result_array();
        $data['siswa'] = $this->M_Siswa->get_all();
        $data['css'] = ["https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('siswa');
        $this->load->view('template/footer');
    }
    public function get($id)
    {
        $data = $this->M_Siswa->get_by_id($id);
        echo json_encode($data);
    }
    public function hapus()
    {
        $id = $this->input->get('id');
        echo $id;
    }
    public function action()
    {
        $id = $this->input->post('id');
        $nis = $this->input->post('nis');
        $nama = $this->input->post('nama');
        $id_kelas = $this->input->post('id_kelas');
        $email = $this->input->post('email');
        $telp = $this->input->post('telp');
        $tahun_masuk = $this->input->post('tahun_masuk');
        $wali_nama = $this->input->post('wali_nama');
        $wali_email = $this->input->post('wali_email');
        $wali_telp = $this->input->post('wali_telp');

        $action = $id == "" ? "insert" : "update";    
    }
}