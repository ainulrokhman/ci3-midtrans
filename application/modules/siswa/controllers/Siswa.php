<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Siswa extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_Siswa']);
        $this->load->model(['kelas/M_Kelas']);
        $this->load->model("DatatableServerSideModel", "ds");
    }
    public function index()
    {
        if ($this->input->method() == "post") {
            $id = $this->input->post('id', true);
            $data = $this->M_Siswa->get_by_id($id)->row_array();
            echo json_encode($data);
            return;
        }
        $data['title'] = "Siswa";
        $data['kelas'] = $this->M_Siswa->get_all()->result();
        $data['css'] = [
            "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css",
            "https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css"
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('index');
        $this->load->view('template/footer');
    }

    public function add()
    {
        if ($this->input->method() == "post") {
            $data = [
                "nis" => $this->input->post('nis', true),
                "nama" => $this->input->post('nama', true),
                "id_kelas" => $this->input->post('kelas', true),
                "email" => $this->input->post('email', true),
                "telp" => $this->input->post('telp', true),
                "tahun_masuk" => $this->input->post('tahun_masuk', true),
                "wali_nama" => $this->input->post('wali_nama', true),
                "wali_email" => $this->input->post('wali_email', true),
                "wali_telp" => $this->input->post('wali_telp', true),
            ];
            $insert = $this->M_Siswa->insert($data);
            $notif = $this->load->view('template/alert', array(
                'condition' => $insert,
                'msg' => "Data berhasil disimpan!"
            ), true);
            $this->session->set_flashdata('success', $notif);
            redirect(base_url("siswa"));
            return;
        }
        $this->load->helper('form');
        $data['title'] = "Kelas";
        $data['kelas'] = $this->M_Kelas->get_all()->result();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('add');
        $this->load->view('template/footer');
    }

    public function detail($id)
    {
        $this->load->helper('form');
        $data['title'] = "Kelas";
        $data['siswa'] = $this->M_Siswa->get_by_id($id)->result()[0];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('detail');
        $this->load->view('template/footer');
    }

    public function edit($id)
    {
        if ($this->input->method() == "post") {
            $data = [
                "id" => $this->input->post('id', true),
                "nama" => $this->input->post('nama', true),
                "id_kelas" => $this->input->post('kelas', true),
                "email" => $this->input->post('email', true),
                "telp" => $this->input->post('telp', true),
                "tahun_masuk" => $this->input->post('tahun_masuk', true),
                "wali_nama" => $this->input->post('wali_nama', true),
                "wali_email" => $this->input->post('wali_email', true),
                "wali_telp" => $this->input->post('wali_telp', true),
            ];
            // echo json_encode($data);
            $update = $this->M_Siswa->update($data);
            $notif = $this->load->view('template/alert', array(
                'condition' => $update,
                'msg' => "Data berhasil diupdate!"
            ), true);
            $this->session->set_flashdata('success', $notif);
            redirect(base_url("siswa"));
            return;
        }

        $this->load->helper('form');
        $data['title'] = "Kelas";
        $data['siswa'] = $this->M_Siswa->get_by_id($id)->result()[0];
        $data['kelas'] = $this->M_Kelas->get_all()->result();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('edit');
        $this->load->view('template/footer');
    }

    public function hapus($id)
    {
        $hapus = $this->M_Siswa->delete($id);
        $notif = $this->load->view('template/alert', array(
            'condition' => $hapus,
            'msg' => "Data berhasil dihapus!"
        ), true);
        $this->session->set_flashdata('success', $notif);
        redirect(base_url("siswa"));
    }

    public function datatable()
    {
        $this->ds->setTableName("v_kelas_siswa");

        $fields = ["nis", "nama", "tahun_masuk", 'jurusan', 'tingkat'];
        $this->ds->setFiled($fields);

        $result = $this->ds->get();

        $data = [];
        $no = $_POST['start'];
        foreach ($result['data'] as $d) {
            $action = $this->action("siswa/detail/{$d->id}", base_url("siswa/hapus/{$d->id}"));
            $row = [];
            $row[] = ++$no;
            $row[] = $d->nis;
            $row[] = $d->nama;
            $row[] = "{$d->tingkat} {$d->jurusan}";
            $row[] = $d->tahun_masuk;
            $row[] = $action;
            $data[] = $row;
        }
        $result['data'] = $data;

        echo json_encode($result);
    }

    private function action($link_edit, $link_hapus)
    {
        $edit = "<a href='" . base_url($link_edit) . "'><div class='badge bg-info'><i class='fa fa-search'></i> Detail</div></a>";
        $hapus = "<span role='button' class='hapus' data-href='{$link_hapus}'><div class='badge bg-danger'><i class='fa fa-trash'></i> Hapus</div></span>";
        // $hapus = "<a href='" . base_url($link_hapus) . "' class='delete'><div class='badge bg-danger'><i class='fa fa-trash'></i> Hapus</div></a>";
        return "$edit $hapus";
    }
}
