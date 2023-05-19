<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kelas extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_Kelas']);
        $this->load->model("DatatableServerSideModel", "ds");
    }
    public function index()
    {
        $data['title'] = "Kelas";
        $data['kelas'] = $this->M_Kelas->get_all()->result();
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
                "jurusan" => $this->input->post('jurusan', true),
                "tingkat" => $this->input->post('tingkat', true),
            ];
            $insert = $this->M_Kelas->insert($data);
            $notif = $this->load->view('template/alert', array(
                'condition' => $insert,
                'msg' => "Data berhasil disimpan!"
            ), true);
            $this->session->set_flashdata('success', $notif);
            redirect(base_url("kelas"));
            return;
        }
        $this->load->helper('form');
        $data['title'] = "Kelas";
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('add');
        $this->load->view('template/footer');
    }

    public function edit($id)
    {
        if ($this->input->method() == "post") {
            $data = [
                "id" => $this->input->post('id', true),
                "jurusan" => $this->input->post('jurusan', true),
                "tingkat" => $this->input->post('tingkat', true),
            ];
            $update = $this->M_Kelas->update($data);
            $notif = $this->load->view('template/alert', array(
                'condition' => $update,
                'msg' => "Data berhasil diupdate!"
            ), true);
            $this->session->set_flashdata('success', $notif);
            redirect(base_url("kelas"));
            return;
        }

        $this->load->helper('form');
        $data['title'] = "Kelas";
        $data['kelas'] = $this->M_Kelas->get_by_id($id)->result()[0];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('edit');
        $this->load->view('template/footer');
    }

    public function hapus($id)
    {
        $hapus = $this->M_Kelas->delete($id);
        $notif = $this->load->view('template/alert', array(
            'condition' => $hapus,
            'msg' => "Data berhasil dihapus!"
        ), true);
        $this->session->set_flashdata('success', $notif);
        redirect(base_url("kelas"));
    }

    public function datatable()
    {
        $this->ds->setTableName("kelas");

        $fields = ["jurusan", "tingkat"];
        $this->ds->setFiled($fields);

        $result = $this->ds->get();

        $data = [];
        $no = $_POST['start'];
        foreach ($result['data'] as $d) {
            $action = $this->action("kelas/edit/{$d->id}", base_url("kelas/hapus/{$d->id}"));
            $row = [];
            $row[] = ++$no;
            $row[] = $d->jurusan;
            $row[] = $d->tingkat;
            $row[] = $action;
            $data[] = $row;
        }
        $result['data'] = $data;

        echo json_encode($result);
    }

    private function action($link_edit, $link_hapus)
    {
        $edit = "<a href='" . base_url($link_edit) . "'><div class='badge bg-info'><i class='fa fa-edit'></i> Edit</div></a>";
        $hapus = "<span role='button' class='hapus' data-href='{$link_hapus}'><div class='badge bg-danger'><i class='fa fa-trash'></i> Hapus</div></span>";
        // $hapus = "<a href='" . base_url($link_hapus) . "' class='delete'><div class='badge bg-danger'><i class='fa fa-trash'></i> Hapus</div></a>";
        return "$edit $hapus";
    }
}
