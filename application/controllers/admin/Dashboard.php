<?php
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_guru');
	}

	function index()
	{
		if ($this->session->userdata('akses') == '1') {
				$data['jumlah_guru'] = $this->m_guru->getJumlahData();
				$data['breadcrumb'] = 'Dashboard';
				$data['main_view'] = 'admin/v_dashboard';
				$this->load->view('theme/admintemplate', $data);
            
		}else{
			redirect('administrator');
		}
	
	}
	
}