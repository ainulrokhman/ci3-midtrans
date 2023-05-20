<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Biaya extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_Biaya']);
        $this->load->model("DatatableServerSideModel", "ds");
    }
    public function index()
    {
        $data['title'] = "Kelas";
        $data['biaya'] = $this->M_Biaya->get_all()->result();
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
                "nama_biaya" => $this->input->post('jenis_biaya', true),
                "deskripsi" => $this->input->post('deskripsi', true),
                "nominal" => $this->input->post('nominal', true),
            ];
            $insert = $this->M_Biaya->insert($data);
            $notif = $this->load->view('template/alert', array(
                'condition' => $insert,
                'msg' => "Data berhasil disimpan!"
            ), true);
            $this->session->set_flashdata('success', $notif);
            redirect(base_url("biaya"));
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
                "nama_biaya" => $this->input->post('jenis_biaya', true),
                "deskripsi" => $this->input->post('deskripsi', true),
                "nominal" => $this->input->post('nominal', true),
            ];
            $update = $this->M_Biaya->update($data);
            $notif = $this->load->view('template/alert', array(
                'condition' => $update,
                'msg' => "Data berhasil diupdate!"
            ), true);
            $this->session->set_flashdata('success', $notif);
            redirect(base_url("biaya"));
            return;
        }

        $this->load->helper('form');
        $data['title'] = "Kelas";
        $data['biaya'] = $this->M_Biaya->get_by_id($id)->result()[0];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('edit');
        $this->load->view('template/footer');
    }

    public function hapus($id)
    {
        $condition = $this->M_Biaya->delete($id);
        $notif = $this->load->view('template/alert', array(
            'condition' => $condition,
            'msg' => "Data berhasil dihapus!"
        ), true);
        $this->session->set_flashdata('success', $notif);
        redirect(base_url("biaya"));
    }

    public function datatable()
    {
        $this->ds->setTableName("jenis_biaya");

        $fields = ["nama_biaya", "deskripsi", "nominal"];
        $this->ds->setFiled($fields);

        $result = $this->ds->get();

        $data = [];
        $no = $_POST['start'];
        foreach ($result['data'] as $d) {
            $action = $this->action("biaya/edit/{$d->id}", base_url("biaya/hapus/{$d->id}"));
            $row = [];
            $row[] = ++$no;
            $row[] = $d->nama_biaya;
            $row[] = $d->deskripsi;
            $row[] = $d->nominal;
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
