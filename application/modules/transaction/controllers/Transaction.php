<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Transaction extends MX_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
	{
		parent::__construct();
		$params = array('server_key' => 'SB-Mid-server-gQklrmnTFk9302Hk9rQgRA1u', 'production' => false);
		$this->load->library('veritrans');
		$this->veritrans->config($params);
		$this->load->model(['M_Transaction']);
		$this->load->model("DatatableServerSideModel", "ds");
	}

	public function index()
	{
		if ($this->input->method() == "post") {
			$id = $this->input->post('id', true);
			$data = $this->M_Biaya->get_by_id($id)->row_array();
			echo json_encode($data);
			return;
		}
		$data['title'] = "Transaksi";
		$data['trx'] = $this->M_Transaction->get_all()->result();
		$data['css'] = [
			"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css",
			"https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css"
		];

		$this->load->helper('form');
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('index');
		$this->load->view('template/footer');
	}

	public function detail()
	{
		$order_id = $this->input->get('order_id', true);
		$data = $this->M_Transaction->get_by_id($order_id)->row_array();
		$detail = $this->M_Transaction->get_detail($order_id)->row_array();
		$data['title'] = "Detail Transaksi";
		$data['nama_siswa'] = $detail['nama_siswa'];
		$data['jenis_biaya'] = $detail['jenis_biaya'];

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('detail');
		$this->load->view('template/footer');
	}

	public function datatable()
	{
		$this->ds->setTableName("v_trx");

		$fields = ["order_id", "status_message", "transaction_status", "nama_siswa", "jenis_biaya"];
		$this->ds->setFiled($fields);

		$result = $this->ds->get();

		$data = [];
		$no = $_POST['start'];
		foreach ($result['data'] as $d) {
			$action = $this->action($d->order_id);
			$row = [];
			$row[] = ++$no;
			$row[] = $d->jenis_biaya;
			$row[] = $d->nama_siswa;
			$row[] = $d->transaction_status;
			// $row[] = "";
			$row[] = $action;
			$data[] = $row;
		}
		$result['data'] = $data;

		echo json_encode($result);
	}

	private function action($id)
	{
		$link_hapus = base_url("transaction/hapus/$id");
		$link_detail = base_url("transaction/detail?order_id=$id");
		$hapus = "<a href='" . $link_detail . "'><div class='badge bg-info'><i class='fa fa-search'></i> Detail</div></a>";
		$detail = "<a href='" . $link_hapus . "'><div class='badge bg-danger'><i class='fa fa-trash'></i> Hapus</div></a>";
		return "$detail $hapus";
	}

	public function process()
	{
		$order_id = $this->input->get('order_id');
		$action = $this->input->get('action');
		switch ($action) {
			case 'status':
				$this->status($order_id);
				break;
			case 'approve':
				$this->approve($order_id);
				break;
			case 'expire':
				$this->expire($order_id);
				break;
			case 'cancel':
				$this->cancel($order_id);
				break;
		}
	}

	public function status($order_id)
	{
		$result = new stdClass();
		try {
			$result = $this->veritrans->status($order_id);
		} catch (Exception $e) {
			$result->status_message = "Success, transaction is Updated";
			$result->order_id = $order_id;
			$result->transaction_status = "cancel";
			$result->settlement_time = null;
		}
		$data['status_message'] = $result->status_message;
		$data['order_id'] = $result->order_id;
		$data['settlement_time'] = $result->settlement_time;
		$data['transaction_status'] = $result->transaction_status;
		$update = $this->M_Transaction->update($data);
		$notif = $this->load->view('template/alert', array(
			'condition' => $update,
			'msg' => $result->status_message
		), true);
		$this->session->set_flashdata('success', $notif);
		redirect(base_url("transaction/detail?order_id=$order_id"));
	}

	public function cancel($order_id)
	{
		$result = new stdClass();
		try {
			$result = $this->veritrans->cancel($order_id);
		} catch (Exception $e) {
			$result->status_message = "Success, transaction is canceled";
			$result->order_id = $order_id;
			$result->transaction_status = "cancel";
		}
		$data['status_message'] = $result->status_message;
		$data['order_id'] = $result->order_id;
		$data['transaction_status'] = $result->transaction_status;
		$update = $this->M_Transaction->update($data);
		$notif = $this->load->view('template/alert', array(
			'condition' => $update,
			'msg' => $result->status_message
		), true);
		$this->session->set_flashdata('success', $notif);
		redirect(base_url("transaction/detail?order_id=$order_id"));
	}

	public function approve($order_id)
	{
		$result = $this->veritrans->approve($order_id);
		echo json_encode($result);
	}

	public function hapus($id)
	{
		$condition = $this->M_Transaction->delete($id);
		$notif = $this->load->view('template/alert', array(
			'condition' => $condition,
			'msg' => "Data berhasil dihapus!"
		), true);
		$this->session->set_flashdata('success', $notif);
		redirect(base_url("transaction"));
	}

	public function expire($order_id)
	{
		$result = new stdClass();
		try {
			$result = $this->veritrans->expire($order_id);
		} catch (Exception $e) {
			$result->status_message = "Success, transaction is expired";
			$result->order_id = $order_id;
			$result->transaction_status = "expire";
		}
		$data['status_message'] = $result->status_message;
		$data['order_id'] = $result->order_id;
		$data['transaction_status'] = $result->transaction_status;
		$update = $this->M_Transaction->update($data);
		$notif = $this->load->view('template/alert', array(
			'condition' => $update,
			'msg' => $result->status_message
		), true);
		$this->session->set_flashdata('success', $notif);
		redirect(base_url("transaction/detail?order_id=$order_id"));
	}
}
