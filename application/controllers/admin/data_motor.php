<?php

class data_motor extends Secure_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->authForAdmin($this->session->userdata());
	}
	public function index ()
	{	
		$data['motor'] = $this->rental_model->get_data('motor')->result();
		$data['type'] = $this->rental_model->get_data('type')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_motor', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_motor ()
	{
		$data['type'] = $this->rental_model->get_data('type')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_tambah_mobil', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_motor_aksi ()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->tambah_motor();
		} else {
			$kode_type        = $this->input->post('kode_type');
			$merk             = $this->input->post('merk');
			$no_plat          = $this->input->post('no_plat');
			$warna            = $this->input->post('warna');
			$tahun            = $this->input->post('tahun');
			$status           = $this->input->post('status');
			$harga            = $this->input->post('harga');
			$gambar           = $_FILES['gambar'] ['name'];
			if ($gambar='') {} else {
				$config['upload_path']       = './assets/upload';
				$config['allowed_types']     = 'jpg|jpeg|png|tiff';

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('gambar')) {
					echo "Gambar Mobil Gagal Diupload!";
				} else {
					$gambar = $this->upload->data('file_name');
				}
			}

			$data = array(
				'kode_type'          => $kode_type,
				'merk'               => $merk,
				'no_plat'            => $no_plat,
				'tahun'              => $tahun,
				'warna'              => $warna,
				'status'             => $status,
				'gambar'             => $gambar,
				'harga'             => $harga,
			);

			$this->rental_model->insert_data($data, 'motor');
			$this->session->set_flashdata('pesan', '<div class= "alert alert-success alert-dismissible fade show" role="alert">
				Data Berhasil Ditambahkan!.
				<button type="button" close="close" data-dismiss="alert" aria-label="close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
			redirect ('admin/data_motor');
		}
	}

	public function update_motor ($id) {
		$data ['mobil'] = $this->db->query("SELECT * 
												FROM motor mtr 
											LEFT JOIN type 
												ON mtr.kode_type = type.kode_type
											WHERE mtr.id_motor = '$id'")->result ();
		$data ['type'] = $this->rental_model->get_data('type')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_update_mobil', $data);
		$this->load->view('templates_admin/footer');
	}

	public function motor_update()
	{
		$this->_rules();

		If ($this->form_validation->run()==false)
		{
			$this->update_motor($this->input->post('id_motor'));
		}else{
			$id               = $this->input->post('id_motor');
			$kode_type        = $this->input->post('kode_type');
			$merk             = $this->input->post('merk');
			$no_plat          = $this->input->post('no_plat');
			$warna            = $this->input->post('warna');
			$tahun            = $this->input->post('tahun');
			$status           = $this->input->post('status');
			$harga            = $this->input->post('harga');
			$gambar           = $_FILES['gambar'] ['name'];
			if ($gambar) {
				$config['upload_path']       = './assets/upload';
				$config['allowed_types']     = 'jpg|jpeg|png|tiff';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('gambar')) {
					$gambar=$this->upload->data('file_name');
					$this->db->set('gambar' , $gambar);
				}else{
					echo $this->upload->display_error();
				}
			}
			$data = array(
				'kode_type'          => $kode_type,
				'merk'               => $merk,
				'no_plat'            => $no_plat,
				'tahun'              => $tahun,
				'warna'              => $warna,
				'status'             => $status,
				'harga'             => $harga,
			);
			$where = array (
				'id_motor' => $id
			);
			$this->rental_model->update_data('motor', $data, $where);
			$this->session->set_flashdata('pesan', '<div class= "alert alert-success alert-dismissible fade show" role="alert">
				Data Motor Berhasil Diupdate!.
				<button type="button" close="close" data-dismiss="alert" aria-label="close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
			redirect ('admin/data_motor');
		}
	}
	public function _rules()
	{
		$this->form_validation->set_rules('kode_type', 'Kode Type', 'required');
		$this->form_validation->set_rules('merk', 'Merk', 'required');
		$this->form_validation->set_rules('no_plat', 'No Plat', 'required');
		$this->form_validation->set_rules('tahun', 'Tahun', 'required');
		$this->form_validation->set_rules('warna', 'Warna', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');
	}

	public function detail_motor($id)
	{
		$data['detail'] = $this->rental_model->ambil_id_motor($id);
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/detail_motor', $data);
		$this->load->view('templates_admin/footer');
	}

	public function delete_motor ($id)
	{
		$where = array ('id_motor' => $id);
		$this->rental_model->delete_data($where, 'motor');
		$this->session->set_flashdata('pesan', '<div class= "alert alert-danger alert-dismissible fade show" role="alert">
				Data Motor Berhasil Dihapus!.
				
					<span aria-hidden="true">&times;</span>
				</div>');
			redirect ('admin/data_motor');
	}
}

?>