<?php


class Dashboard extends Secure_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index () 
	{
		$data ['motor'] = $this->rental_model->get_data('motor') ->result();
		$this->load->view('templates_customer/header');
		$this->load->view('customer/dashboard', $data);
		$this->load->view('templates_customer/footer');
	}

	public function detail_motor ($id)
	{
		$data ['detail'] = $this->rental_model->ambil_id_motor($id);
		$this->load->view('templates_customer/header');
		$this->load->view('customer/detail_motor', $data);
		$this->load->view('templates_customer/footer');
	}

	public function detail_byModal($id)
	{
		echo json_encode($this->rental_model->ambil_id_motor($id));
	}

	public function sewaMotor()
	{
		$tanggal = date("Y-m-d H:i:s");
		$data = [
			"id_trans"=>rand(),
			"id_customer"=>$this->session->userdata('id_customer'),
			"id_motor"=>$this->input->post(['id_motor'][0]),
			"satatus_transaksi"=>'0',
			"type_transaksi"=>$this->input->post(['type_transaksi'][0]),
			"date"=>$tanggal
		];
		$this->rental_model->beli_motor($data);
		$this->rental_model->updateStatusMobil3($data);

		echo json_encode(["info"=>'Selamat Motor Berhasil Anda Booking']);
	}

	public function dataDriver()
	{
		$data = $this->rental_model->getSupirActive();

		echo json_encode(["data"=>$data]);
	}

	public function aboutUS()
	{
		$this->load->view('templates_customer/header');
		$this->load->view('customer/aboutus');
		$this->load->view('templates_customer/footer');
	}

	
}

?>