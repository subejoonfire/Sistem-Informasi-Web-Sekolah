<?php
class Admin extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_admin');
		$this->load->library('upload');
	}


	function index(){
		$kode=$this->session->userdata('id_admin');
        
		$this->data['user']=$this->m_admin->get_admin_login($kode);
		$this->data['data']=$this->m_admin->get_all_admin();
        $this->data['breadcrumb']  = 'Data Account User';
            
        $this->data['main_view']   = 'admin/v_admin';
            
        $this->load->view('theme/admintemplate',$this->data);
		
	}

	function simpan_admin(){
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
	                        $config['width']= 300;
	                        $config['height']= 300;
	                        $config['new_image']= './assets/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $gambar=$gbr['file_name'];
	                        $nama=$this->input->post('xnama');
	                        $jenkel=$this->input->post('xjenkel');
	                        $username=$this->input->post('xusername');
	                        $password=$this->input->post('xpassword');
                            $konfirm_password=$this->input->post('xpassword2');
                            $email=$this->input->post('xemail');
                            $nohp=$this->input->post('xkontak');
     						if ($password <> $konfirm_password) {
     							echo $this->session->set_flashdata('msg','error');
	               				redirect('admin/admin');
     						}else{
	               				$this->m_admin->simpan_admin($nama,$jenkel,$username,$password,$email,$nohp,$gambar);
	                    		echo $this->session->set_flashdata('msg','success');
	               				redirect('admin/admin');
	               				
	               			}
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/admin');
	                }
	                 
	            }else{
	            	$nama=$this->input->post('xnama');
	                $jenkel=$this->input->post('xjenkel');
	                $username=$this->input->post('xusername');
	                $password=$this->input->post('xpassword');
                    $konfirm_password=$this->input->post('xpassword2');
                    $email=$this->input->post('xemail');
                    $nohp=$this->input->post('xkontak');
	            	if ($password <> $konfirm_password) {
     					echo $this->session->set_flashdata('msg','error');
	               		redirect('admin/admin');
     				}else{
	               		$this->m_admin->simpan_admin_tanpa_gambar($nama,$jenkel,$username,$password,$email,$nohp);
	                    echo $this->session->set_flashdata('msg','success');
	               		redirect('admin/admin');
	               	}
	            } 

	}

	function update_admin(){
				
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
	                        $config['width']= 300;
	                        $config['height']= 300;
	                        $config['new_image']= './assets/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $gambar=$gbr['file_name'];
	                        $kode=$this->input->post('kode');
	                        $nama=$this->input->post('xnama');
	                		$jenkel=$this->input->post('xjenkel');
	                		$username=$this->input->post('xusername');
	                		$password=$this->input->post('xpassword');
                    		$konfirm_password=$this->input->post('xpassword2');
                    		$email=$this->input->post('xemail');
                    		$nohp=$this->input->post('xkontak');
                            if (empty($password) && empty($konfirm_password)) {
                            	$this->m_admin->update_admin_tanpa_pass($kode,$nama,$jenkel,$username,$password,$email,$nohp,$gambar);
	                    		echo $this->session->set_flashdata('msg','info');
	               				redirect('admin/admin');
     						}elseif ($password <> $konfirm_password) {
     							echo $this->session->set_flashdata('msg','error');
	               				redirect('admin/admin');
     						}else{
	               				$this->m_admin->update_admin($kode,$nama,$jenkel,$username,$password,$email,$nohp,$gambar);
	                    		echo $this->session->set_flashdata('msg','info');
	               				redirect('admin/admin');
	               			}
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/admin');
	                }
	                
	            }else{
	            	$kode=$this->input->post('kode');
	            	$nama=$this->input->post('xnama');
	                $jenkel=$this->input->post('xjenkel');
	                $username=$this->input->post('xusername');
	                $password=$this->input->post('xpassword');
                    $konfirm_password=$this->input->post('xpassword2');
                    $email=$this->input->post('xemail');
                    $nohp=$this->input->post('xkontak');
	            	if (empty($password) && empty($konfirm_password)) {
                       	$this->m_admin->update_admin_tanpa_pass_dan_gambar($kode,$nama,$jenkel,$username,$password,$email,$nohp);
	                    echo $this->session->set_flashdata('msg','info');
	               		redirect('admin/admin');
     				}elseif ($password <> $konfirm_password) {
     					echo $this->session->set_flashdata('msg','error');
	               		redirect('admin/admin');
     				}else{
	               		$this->m_admin->update_admin_tanpa_gambar($kode,$nama,$jenkel,$username,$password,$email,$nohp);
	                    echo $this->session->set_flashdata('msg','warning');
	               		redirect('admin/admin');
	               	}
	            } 

	}

	function hapus_admin(){
		$kode=$this->input->post('kode');
		$data=$this->m_admin->get_admin_login($kode);
		$q=$data->row_array();
		$p=$q['admin_photo'];
		$path=base_url().'assets/images/'.$p;
		delete_files($path);
		$this->m_admin->hapus_admin($kode);
	    echo $this->session->set_flashdata('msg','success-hapus');
	    redirect('admin/admin');
	}

	function reset_password(){
   
        $id=$this->uri->segment(4);
        $get=$this->m_admin->getusername($id);
        if($get->num_rows()>0){
            $a=$get->row_array();
            $b=$a['admin_username'];
        }
        $pass=rand(123456,999999);
        $this->m_admin->resetpass($id,$pass);
        echo $this->session->set_flashdata('msg','show-modal');
        echo $this->session->set_flashdata('uname',$b);
        echo $this->session->set_flashdata('upass',$pass);
	    redirect('admin/admin');
   
    }


}