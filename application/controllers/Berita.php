<?php
class Berita extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_berita');
	}
	function index(){
        
		$jum=$this->m_berita->berita();
        $page=$this->uri->segment(3);
        if(!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;
        $limit=5;
        $config['base_url'] = base_url() . 'berita/index/';
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
						$this->data['data']=$this->m_berita->berita_perpage($offset,$limit);
						
        $this->data['main_view']   = 'depan/v_berita';
        
        $this->load->view('theme/template',$this->data);
        
        
	}
    
	function detail($details){
        
		$detail=htmlspecialchars($details,ENT_QUOTES);
		$query = $this->db->get_where('berita', array('detail_berita' => $detail));
		if($query->num_rows() > 0){
			$b=$query->row_array();
			$kode=$b['id_berita'];
			$data=$this->m_berita->get_berita_by_kode($kode);
			$row=$data->row_array();
			$this->data['id']=$row['id_berita'];
			$this->data['title']=$row['judul_berita'];
			$this->data['image']=$row['gambar_berita'];
			$this->data['berita'] =$row['isi_berita'];
			$this->data['tanggal']=$row['tanggal'];
			$this->data['detail']=$row['detail_berita'];
            
			
            
            $this->data['main_view']   = 'depan/v_berita_detail';
        
            $this->load->view('theme/template',$this->data);
            
		}else{
			redirect('artikel');
		}
	}


    function search(){
        $keyword=str_replace("'", "", htmlspecialchars($this->input->get('keyword',TRUE),ENT_QUOTES));
        $query=$this->m_berita->cari_berita($keyword);
				if($query->num_rows() > 0){
                    
					$this->data['data']=$query;
                    
                    $this->data['main_view']   = 'depan/v_berita';
        
             $this->load->view('theme/template',$this->data);
                    
          
                    
	 		 }else{
                    
				 echo $this->session->set_flashdata('msg','<div class="alert alert-danger">Tidak dapat menemukan artikel dengan kata kunci <b>'.$keyword.'</b></div>');
				 redirect('artikel');
                    
			 }
    }


}
