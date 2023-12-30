<?php
class Home extends CI_Controller
{

	function __construct()
	{

		parent::__construct();
		$this->load->model('m_berita');
		$this->load->model('m_galeri');
		$this->load->model('m_pengumuman');
		$this->load->model('m_files');
	}

	function index()
	{

		$this->data['main_view']   = 'depan/v_home';

		$this->data['berita'] = $this->m_berita->get_berita_home();
		$this->data['pengumuman'] = $this->m_pengumuman->get_pengumuman_home();
		$this->data['tot_guru'] = $this->db->get('guru')->num_rows();
		$this->data['tot_siswa'] = $this->db->get('siswa')->num_rows();
		$this->data['tot_files'] = $this->db->get('tbl_files')->num_rows();


		$this->load->view('theme/template', $this->data);
	}
}
