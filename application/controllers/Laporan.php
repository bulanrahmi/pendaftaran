<?php
class Laporan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->Model('Model_user', 'muser');
		chek_seesion();
	}

	function index()
	{
		$this->template->load('template', 'laporan/index');
	}

	function pasien(){
		$data['pasien'] = $this->db->query("select * from tbl_pasien")->result_object();
		$this->load->view('laporan/pasien', $data);
	}

	function kunjungan(){
		$data['kunjungan'] = $this->db->query("
								select * 
								from 
								tbl_transaksi_pasien as tp, tbl_pasien as p, jenis_berobat as j 
								where 
								tp.id_user=p.id_user and j.id=tp.id_jenis_berobat
							")->result_object();
		$this->load->view('laporan/kunjungan', $data);
	}
}
