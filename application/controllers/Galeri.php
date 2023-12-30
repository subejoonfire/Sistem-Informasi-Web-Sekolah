<?php
class Galeri extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_galeri');
	}
	function index(){
        
        $this->data['main_view']   = 'depan/v_galeri';
        

		$this->data['all_galeri']=$this->m_galeri->get_all_galeri();
        
		$this->load->view('theme/template',$this->data);
	}
}
