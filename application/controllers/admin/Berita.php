<?php
class berita extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_berita');
		$this->load->model('m_admin');
		$this->load->library('upload');
	}


	function index(){
		$this->data['data']=$this->m_berita->get_all_berita();
        
        $this->data['breadcrumb']  = 'Data Berita';
            
        $this->data['main_view']   = 'admin/v_berita';
            
        $this->load->view('theme/admintemplate',$this->data);
		
	}
	function add_berita(){
        $this->data['breadcrumb']  = 'Tambah Berita';
            
        $this->data['main_view']   = 'admin/v_add_berita';
            
        $this->load->view('theme/admintemplate',$this->data);
		
	}
	function get_edit(){
        
		$kode=$this->uri->segment(4);
        
		$this->data['data']=$this->m_berita->get_berita_by_kode($kode);
                
        $this->data['breadcrumb']  = 'Ubah Berita';
            
        $this->data['main_view']   = 'admin/v_edit_berita';
            
        $this->load->view('theme/admintemplate',$this->data);
        
        
	}
	function simpan_berita(){
				$config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/images/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 710;
	                        $config['height']= 460;
	                        $config['new_image']= './assets/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $gambar=$gbr['file_name'];
													$judul=strip_tags($this->input->post('xjudul'));
													$isi=$this->input->post('xisi');
													$string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
													$trim     = trim($string);
													$detail   = strtolower(str_replace(" ", "-", $trim));
													$kode = $this->session->userdata('id_admin');
													$user = $this->m_admin->get_admin_login($kode);
													$p = $user->row_array();
													$user_id = $p['id_admin'];
													$user_nama = $p['nama_admin'];	
													$this->m_berita->simpan_berita($judul,$isi, $user_id, $user_nama, $gambar, $detail);
													echo $this->session->set_flashdata('msg','success');
													redirect('admin/berita');
											}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/berita');
	                }

	            }else{
					redirect('admin/berita');
				}

	}

	function update_berita(){

	            $config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/images/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 710;
	                        $config['height']= 460;
	                        $config['new_image']= './assets/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $gambar=$gbr['file_name'];
	                        $id_berita=$this->input->post('kode');
	                        $judul=strip_tags($this->input->post('xjudul'));
													$isi=$this->input->post('xisi');
													$string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
													$trim     = trim($string);
													$detail     = strtolower(str_replace(" ", "-", $trim));
													$kode=$this->session->userdata('id_admin');
													$user=$this->m_admin->get_admin_login($kode);
													$p=$user->row_array();
													$user_id=$p['id_admin'];
													$user_nama=$p['nama_admin'];
													$this->m_berita->update_berita($id_berita, $judul, $isi, $user_id, $user_nama, $gambar, $detail);
													echo $this->session->set_flashdata('msg','info');
													redirect('admin/berita');

	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/admin');
	                }

	            }else{
									$id_berita=$this->input->post('kode');
									$judul=strip_tags($this->input->post('xjudul'));
									$isi=$this->input->post('xisi');
									$string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
									$trim     = trim($string);
									$detail     = strtolower(str_replace(" ", "-", $trim));									
									$kode=$this->session->userdata('id_admin');
									$user=$this->m_admin->get_admin_login($kode);
									$p=$user->row_array();
									$user_id=$p['id_admin'];
									$user_nama=$p['nama_admin'];
									$this->m_berita->update_berita_tanpa_img($id_berita, $judul, $isi, $user_id, $user_nama, $gambar, $detail);
									echo $this->session->set_flashdata('msg','info');
									redirect('admin/berita');
	            }

	}

	function hapus_berita(){
		$kode=$this->input->post('kode');
		$gambar=$this->input->post('gambar');
		$path='./assets/images/'.$gambar;
		unlink($path);
		$this->m_berita->hapus_berita($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/berita');
	}

}
