<?php

class Pendaftaran extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->Model('Model_pendaftaran');
		$this->load->Model('Model_user', 'muser');

	}

	public function tambah_pasien()
	{
		$this->template->load('template', 'pasien/tambah');
	}

	public function proses_tambah_pasien()
	{
		$user = $this->input->post('uname');
		$password = $this->input->post('password');
		$nama = $this->input->post('nama_pasien');
		$no_bpjs = $this->input->post('no_bpjs');
		$alamat = $this->input->post('alamat');
		$no = $this->input->post('no_hp');

		$data_user = array(
			'username' => $user,
			'password' => sha1($password),
			'level' => 'user'
		);
		$id_user = $this->muser->daftar($data_user);

		$data_detail_user = array(
			'id_user' => $id_user,
			'nama_pasien' => $nama,
			'no_BPJS' => $no_bpjs,
			'alamat' => $alamat,
			'no_hp' => $no,
		);
		$this->muser->daftar_detail($data_detail_user);
		$this->session->set_flashdata('pesan', 'Data Berhasil Disimpan');
		return redirect(site_url('Pendaftaran/pasien'));
	}

	function index()
	{
		$id_user = $this->session->userdata('id');
		$level = $this->session->userdata('level');
		$data['pasien'] = $this->db->query("select * from tbl_pasien")->result();

		if ($level == 'admin') {
			$data['daftar'] = $this->db->query("
                select tp.id, ps.nama_pasien, tp.tanggal_daftar, tp.keterangan, jb.jenis_pasien from tbl_transaksi_pasien as tp, tbl_pasien as ps, jenis_berobat as jb
                where tp.id_user=ps.id_user and tp.id_jenis_berobat=jb.id
                ")->result();
		} else {
			// $data['daftar'] = $this->db->query("SELECT ts.id_pasien,ts.nama_pasien,ts.alamat,js.jenis_pasien,ts.no_BPJS,ts.no_hp FROM tbl_pasien as ts, jenis_berobat as js WHERE ts.id_jenis_berobat=js.id and ts.id_user = $id_user")->result();

			$data['daftar'] = $this->db->query("
                select tp.id, ps.nama_pasien, tp.tanggal_daftar, tp.keterangan, jb.jenis_pasien from tbl_transaksi_pasien as tp, tbl_pasien as ps, jenis_berobat as jb
                where tp.id_user=ps.id_user and tp.id_jenis_berobat=jb.id and tp.id_user=$id_user
                ")->result();
		}
		$this->template->load('template', 'pendaftaran/list', $data);
	}

	public function pasien()
	{
		$data['pasien'] = $this->db->query("select * from tbl_pasien, tbl_user where tbl_pasien.id_user=tbl_user.id")->result();
		$this->template->load('template', 'pendaftaran/list-pasien', $data);
	}

	public function edit_password($id_user){
		$data['user'] = $this->db->query("select * from tbl_user where id=$id_user")->row_object();
		$this->template->load('template', 'pendaftaran/edit-password', $data);
	}

	function proses_edit_password(){
		$id_user = $this->input->post('id_user');
		$user = $this->input->post('uname');
		$password = $this->input->post('password');

		$data_user = array(
			'username' => $user,
			'password' => sha1($password)
		);
		$id_user = $this->muser->edit_password($id_user, $data_user);
		return redirect(site_url('Pendaftaran/pasien'));
	}

	public function kunjungan()
	{
		$id_user = $this->session->userdata('id');
		$data['daftar'] = $this->db->query("
                select tp.id, ps.nama_pasien, tp.tanggal_daftar, tp.keterangan, jb.jenis_pasien from tbl_transaksi_pasien as tp, tbl_pasien as ps, jenis_berobat as jb
                where tp.id_user=ps.id_user and tp.id_jenis_berobat=jb.id and tp.id_user=$id_user
                ")->result();
		$data['pasien'] = $this->db->query("select * from tbl_pasien")->result();
		$this->template->load('template', 'pendaftaran/kunjungan-pasien', $data);
	}


	function add()
	{
		$level = $this->session->userdata('level');
		if (isset($_POST['submit'])) {
			$this->Model_pendaftaran->add();
			if ($level == 'admin') {
				redirect('Pendaftaran');
			} else {
				redirect('Pendaftaran/kunjungan');
			}
		} else {
			if ($level == 'admin') {
				$this->template->load('template', 'pendaftaran/list');
			} else {
				$this->template->load('template', 'pendaftaran/kunjungan-pasien');
			}
		}
	}

	function show_by_id()
	{
		$id_pasien = $_GET['id_pasien'];
		$sql_pasien = "select * from tbl_pasien where id_user='$id_pasien'";
		$dokter = $this->db->query($sql_pasien)->row_Array();
		$data = array(
			'alamat' => $dokter['alamat'],
			'no_BPJS' => $dokter['no_BPJS']
		);
		echo json_encode($data);
	}
public function pdf()
    {
        $this->load->library('dompdf_gen');

        $data['nayaka'] = $this->Model_pendaftaranl->tampilData('tbl_transaksi_pasien')->result();
        $this->load->view('laporan', $data);

        $paperSize = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();

        $this->dompdf->set_paper($paperSize, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_kunjungan.pdf", array('Attachment' => 0));
    }

	function update()
	{
		if (isset($_POST['submit'])) {
			$this->Model_pendaftaran->update();
			redirect('Pendaftaran');
		} else {
			$this->template->load('template', 'pendaftaran/list');

		}
	}


	function hapus()
	{
		$id = $this->uri->segment(3);
		$this->db->where('id', $id);
		$this->db->delete('tbl_transaksi_pasien');
		redirect('Pendaftaran');
	}

}


?>

