<?php
class Pengumuman extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_pengumuman');
	}
	function index(){
		$jum=$this->m_pengumuman->pengumuman();
        $page=$this->uri->segment(3);
        if(!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;
        $limit=7;
        $config['base_url'] = base_url() . 'pengumuman/index/';
            $config['total_rows'] = $jum->num_rows();
            $config['per_page'] = $limit;
            $config['uri_segment'] = 3;
						//Tambahan untuk styling
	          $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
	          $config['full_tag_close']   = '</ul></nav></div>';
	          $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
	          $config['num_tag_close']    = '</span></li>';
	          $config['cur_tag_open']     = '<li class="page-item"><span class="page-link">';
	          $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
	          $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
	          $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
	          $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
	          $config['prev_tagl_close']  = '</span>Next</li>';
	          $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
	          $config['first_tagl_close'] = '</span></li>';
	          $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
	          $config['last_tagl_close']  = '</span></li>';
            $config['first_link'] = 'Awal';
            $config['last_link'] = 'Akhir';
            $config['next_link'] = 'Next >>';
            $config['prev_link'] = '<< Prev';
            $this->pagination->initialize($config);
        
            $this->data['page'] =$this->pagination->create_links();
        
            $this->data['data']=$this->m_pengumuman->pengumuman_perpage($offset,$limit);
        
            $this->data['main_view']   = 'depan/v_pengumuman';
        
            $this->load->view('theme/template',$this->data);
            
	}

	function detail($details)
	{

		$detail = htmlspecialchars($details, ENT_QUOTES);
		$query = $this->db->get_where('pengumuman', array('detail_pengumuman' => $detail));
		if ($query->num_rows() > 0) {
			$b = $query->row_array();
			$kode = $b['id_pengumuman'];
			$data = $this->m_pengumuman->get_pengumuman_by_kode($kode);
			$row = $data->row_array();
			$this->data['id'] = $row['id_pengumuman'];
			$this->data['title'] = $row['judul_pengumuman'];
			$this->data['pengumuman'] = $row['deskripsi_pengumuman'];
			$this->data['tanggal'] = $row['tanggal'];
			$this->data['detail'] = $row['detail_pengumuman'];



			$this->data['main_view']   = 'depan/v_pengumuman_detail';

			$this->load->view('theme/template', $this->data);
		} else {
			redirect('after');
		}
	}

}
