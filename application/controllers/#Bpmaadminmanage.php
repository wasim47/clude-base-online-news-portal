<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bpmaadminmanage extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Index_model');
		date_default_timezone_set('Asia/Dhaka');
     	$this->load->library('email');
		$this->load->library('cart');
		$this->load->helper('form');
	}
	function index()
	{
		if($this->session->userdata('userAccessMail')) redirect("Bpmaadminmanage/dashboard");
		$data['title']="BSMMU | Bangabandhu Sheikh Mujib Medical University";
        $this->load->view('admin/index',$data);
	}

/////////////////////// Admin Part ////////////////////////////////	 
	
	function dashboard()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("Bpmaadminmanage");
		$data['title']="Dashboard BSMMU | Bangabandhu Sheikh Mujib Medical University";
		$data['main_content']="admin/dashboard";
        $this->load->view('admin_template',$data);
	}
	function admin_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("Bpmaadminmanage");
		$data['title']="article List BSMMU | Bangabandhu Sheikh Mujib Medical University";
		$data['admin_list'] = $this->Index_model->getTable('users','id','desc');
		$data['main_content']="admin/administration/admin_list";
        $this->load->view('admin_template',$data);
	} 
	
	function admin_registration()
	{
		$data['title']="Admin Registration | BPMA";
		$userId=$this->uri->segment(3);
		$data['adminUpdate'] = $this->Index_model->getAllItemTable('users','id',$userId,'','','id','desc');
		
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			$this->form_validation->set_rules('username', 'User Name', 'trim|required');
			$this->form_validation->set_rules('email', 'Login Email', 'trim|required|is_unique[users.email]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confirmpassword]');
			$this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'required');
			
			if($this->form_validation->run() != false){
				$save['username']	    = $this->input->post('username');
				$save['email']	    	= $this->input->post('email');
				$save['password']	    = sha1($this->input->post('password'));
				$save['pass_hints']	    = $this->input->post('password');
				$save['created_on']	    = date('Y-m-d');
				$save['active']	    	= 1;
				
				if($this->input->post('user_id')!=""){
					$user_id=$this->input->post('user_id');
					$this->Index_model->update_table('users','id',$user_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('users', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('Bpmaadminmanage/admin_list', 'refresh');
				
				
			}
			else{
				$data['main_content']="admin/administration/admin_registration";
        		$this->load->view('admin_template', $data);
				}
		}
		$data['main_content']="admin/administration/admin_registration";
        $this->load->view('admin_template', $data);
	}


	public function userLogin()
     {
          $username = $this->input->post("username");
  		  $password = $this->input->post("password");
          $this->form_validation->set_rules("username", "Email", "trim|required|min_length[6]|valid_email");
          $this->form_validation->set_rules("password", "Password", "trim|required");

          if ($this->form_validation->run() == FALSE)
          {
              redirect('Bpmaadminmanage');
          }
          else
          {
                    $usr_result = $this->Index_model->get_userLogin($username, $password,$usertype);
                    if ($usr_result > 0) //active user record is present
                    {
					  $sessiondata = array(
						'userAccessMail'=>$username,
						'userAccessName'=> $usr_result['username'],
						'userAccessId' => $usr_result['id'],
						'password' => TRUE
					   );
						$this->session->set_userdata($sessiondata);
						redirect("Bpmaadminmanage/dashboard/");
                    }
                    else
                    {
                     $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" style="padding:7px; margin-bottom:5px">Invalid Email and password!</div>');
                     redirect('Bpmaadminmanage');
                    }
          }
     }
	 
    function logout()
  	{
	  $sessiondata = array(
				'userAccessMail'=>'',
				'userAccessName'=> '',
				'userAccessId' => '',
				'password' => FALSE
		 );
	$this->session->unset_userdata($sessiondata);
	$this->session->sess_destroy();
    redirect('Bpmaadminmanage', 'refresh');
  }
  	
	
	
	
	
	////////////// Member Part/////////////////////////////////////////////////////////
	function member_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("Bpmaadminmanage");
		$data['title']="Member List | BPMA";
		$data['member_list'] = $this->Index_model->getTable('member','id','desc');
		$data['main_content']="admin/member/member_list";
        $this->load->view('admin_template',$data);
	} 
	
	function registration()
	{
		$data['title']="Member Registration | BPMA";
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			$this->form_validation->set_rules('hospital_number', 'Hostipat Name', 'trim|required');
			$this->form_validation->set_rules('patient_id', 'Patient Id', 'trim|required');
			$this->form_validation->set_rules('regis_date', 'regis_date', 'trim|required');
			$this->form_validation->set_rules('patient_name', 'patient name', 'trim|required');
			
			if($this->form_validation->run() != false){
				$config['allowed_types'] = '*';
				$config['upload_path'] = 'asset/uploads/member/';
				$config['remove_spaces'] = true;
				$this->load->library('upload', $config);
				
				if($this->upload->do_upload()){
					$upload_data	= $this->upload->data();
					$save['images']	= $upload_data['file_name'];
				}
				else{
					$upload_data	= "";
					$save['images']	= $upload_data;	
				}
				
				$save['hos_reg_number']	    = $this->input->post('hospital_number');
				$save['patient_id']	    = $this->input->post('patient_id');
				$save['date_reg']	    = $this->input->post('regis_date');
				$save['bed_no']	    = $this->input->post('bed_number');
				$save['username']	    = $this->input->post('patient_name');
				$save['phone']	    = $this->input->post('mobile');
				$save['alt_phone']	    = $this->input->post('alt_phone');
				$save['gender']	    = $this->input->post('gender');
				$save['dob']		 = $this->input->post('dob');
				$save['relision']	    = $this->input->post('religion');
				$save['email']	    = $this->input->post('email');
				$save['address']	    = $this->input->post('address');
				$save['father_name']	    = $this->input->post('fname');
				$save['father_ocu']	    = $this->input->post('occupation');
				$save['expenditure']	    = $this->input->post('monthly_expenditure');
				$save['family_income']	    = $this->input->post('family_income');
				$save['housing']	    = $this->input->post('housing');
				$save['sanatation']	    = $this->input->post('sanitation');
				$save['water_supplly']	    = $this->input->post('water_supply');
				
				$query = $this->Index_model->inertTable('member', $save);
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully Registration</h2>');
			}
			else{
				$data['main_content']="admin/member/registration";
        		$this->load->view('admin_template', $data);
				}
		}
		$data['main_content']="admin/member/registration";
        $this->load->view('admin_template', $data);
	}
	
	
/////////////////////// article ////////////////////////////////	 
	function article_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("bpmaadminmanage");
		$data['title']="Article List | BPMA";
		$data['article_list'] = $this->Index_model->getTable('article_manage','a_id','desc');
		$data['main_content']="admin/article/article_list";
        $this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function article_registration()
	{
		
		$artiId=$this->uri->segment(3);
		if(!$artiId){
			$data['title']="Article Registration | BPMA";
		}
		else{
			$data['title']="Article Update | BPMA";
		}
		$data['articleUpdate'] = $this->Index_model->getAllItemTable('article_manage','a_id',$artiId,'','','a_id','desc');
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			$this->form_validation->set_rules('headline', 'Article Headline', 'trim|required');
			$this->form_validation->set_rules('details', 'Article Details', 'trim|required');
			
			if($this->form_validation->run() != false){
				$save['headline']	    = $this->input->post('headline');
				$save['details']	    	= $this->input->post('details');
				$save['date']	    = date('Y-m-d');
				
				if($this->input->post('a_id')!=""){
					$a_id=$this->input->post('a_id');
					$this->Index_model->update_table('article_manage','a_id',$a_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('article_manage', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('bpmaadminmanage/article_list', 'refresh');
			}
			else{
				$data['main_content']="admin/article/article_action";
        		$this->load->view('admin_template', $data);
				}
		}
		$data['main_content']="admin/article/article_action";
        $this->load->view('admin_template', $data);
	}


/////////////////////// menu ////////////////////////////////	 
	function menu_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("bpmaadminmanage");
		$data['title']="Menu List | BPMA";
		$data['menu_list'] = $this->Index_model->getTable('menu','m_id','desc');
		$data['main_content']="admin/menu/menu_list";
        $this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function menu_registration()
	{
		
		$artiId=$this->uri->segment(3);
		
		$data['menuUpdate'] = $this->Index_model->getAllItemTable('menu','m_id',$artiId,'','','m_id','desc');
		$data['root_menu'] = $this->Index_model->getAllItemTable('menu','root_id',NULL,'','','menu_name','asc');
		if(!$artiId){
			$data['title']="menu Registration | BPMA";
			$this->form_validation->set_rules('menu_name', 'menu name', 'trim|required|is_unique[menu.menu_name]');
		}
		else{
			$data['title']="menu Update | BPMA";
			$this->form_validation->set_rules('menu_name', 'menu name', 'trim|required');
		}
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			if($this->form_validation->run() != false){
			$expval=explode(' ',$this->input->post('menu_name'));
			$impval=implode('-',$expval);
				$save['menu_name']	    = addslashes($this->input->post('menu_name'));
				$save['slug']	    = addslashes(strtolower($impval));
				$save['root_id']	    = $this->input->post('root_id');
				$save['sroot_id']	    = $this->input->post('sroot_id');
				$save['date']	    = date('Y-m-d');
				
				if($this->input->post('m_id')!=""){
					$m_id=$this->input->post('m_id');
					$this->Index_model->update_table('menu','m_id',$m_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('menu', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('bpmaadminmanage/menu_list', 'refresh');
			}
			else{
				$data['main_content']="admin/menu/menu_action";
        		$this->load->view('admin_template', $data);
				}
		}
		$data['main_content']="admin/menu/menu_action";
        $this->load->view('admin_template', $data);
	}
	
	function ajaxData()
	{
		$rid=$this->input->get('root_id');
		$sroot_menu = $this->Index_model->getAllItemTable('menu','root_id',$rid,'','','menu_name','asc');
		$svar='<select name="sroot_id" class="form-control" style="width:60%;">
							<option value="">Sub Parent Menu</option>';
							 foreach($sroot_menu->result() as $rootmenu):
								$svar .= '<option value="'.$rootmenu->m_id.'">'.$rootmenu->menu_name.'</option>';
							endforeach;
						$svar .= '</select>';
		echo $svar;
	}
	/////////////////////// banner ////////////////////////////////	 
	function banner_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("bpmaadminmanage");
		$data['title']="banner List | BPMA";
		$data['banner_list'] = $this->Index_model->getTable('banner','b_id','desc');
		$data['main_content']="admin/banner/banner_list";
        $this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function banner_registration()
	{
		
		$artiId=$this->uri->segment(3);
		if(!$artiId){
			$data['title']="Banner Registration | BPMA";
		}
		else{
			$data['title']="Banner Update | BPMA";
		}
		$data['bannerUpdate'] = $this->Index_model->getAllItemTable('banner','b_id',$artiId,'','','b_id','desc');
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			$this->form_validation->set_rules('banner_name', 'banner name', 'trim|required');
			
			if($this->form_validation->run() != false){
				
			$config['allowed_types'] = '*';
			$config['remove_spaces'] = true;
			$config['max_size'] = '1000000';
			$config['upload_path'] = './asset/uploads/banner/';
			$config['charset'] = "UTF-8";
			$new_name = "Banner_".time();
			$config['file_name'] = $new_name;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
				if (isset($_FILES['bannerPhoto']['name']))
				{
					if($this->upload->do_upload('bannerPhoto')){
						$upload_data	= $this->upload->data();
						$save['image']	= $upload_data['file_name'];
					}
					else{
						$upload_data	= "";
						$save['image']	= $upload_data;	
					}
				}	
				
				$save['banner_name']	    = $this->input->post('banner_name');
				$save['date']	    = date('Y-m-d');
				
				if($this->input->post('b_id')!=""){
					$b_id=$this->input->post('b_id');
					$this->Index_model->update_table('banner','b_id',$b_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('banner', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('bpmaadminmanage/banner_list', 'refresh');
			}
			else{
				$data['main_content']="admin/banner/banner_action";
        		$this->load->view('admin_template', $data);
				}
		}
		$data['main_content']="admin/banner/banner_action";
        $this->load->view('admin_template', $data);
	}


/////////////////////// advertisement ////////////////////////////////	 
	function advertisement_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("bpmaadminmanage");
		$data['title']="advertisement List | BPMA";
		$data['advertisement_list'] = $this->Index_model->getTable('advertisement','b_id','desc');
		$data['main_content']="admin/advertisement/advertisement_list";
        $this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function advertisement_registration()
	{
		
		$artiId=$this->uri->segment(3);
		if(!$artiId){
			$data['title']="advertisement Registration | BPMA";
		}
		else{
			$data['title']="advertisement Update | BPMA";
		}
		$data['advertisementUpdate'] = $this->Index_model->getAllItemTable('advertisement','b_id',$artiId,'','','b_id','desc');
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			$this->form_validation->set_rules('advertisement_name', 'advertisement name', 'trim|required');
			
			if($this->form_validation->run() != false){
				$config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/advertisement/';
				$config['charset'] = "UTF-8";
				$new_name = "Advertisement_".time();
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if (isset($_FILES['ad_photo']['name']))
					{
						if($this->upload->do_upload('ad_photo')){
							$upload_data	= $this->upload->data();
							$save['image']	= $upload_data['file_name'];
						}
						else{
							$upload_data	= "";
							$save['image']	= $upload_data;	
						}
					}	
				
				$save['advertisement_name']	    = $this->input->post('advertisement_name');
				$save['date']	    = date('Y-m-d');
				
				if($this->input->post('b_id')!=""){
					$b_id=$this->input->post('b_id');
					$this->Index_model->update_table('advertisement','b_id',$b_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('advertisement', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('bpmaadminmanage/advertisement_list', 'refresh');
			}
			else{
				$data['main_content']="admin/advertisement/advertisement_action";
        		$this->load->view('admin_template', $data);
				}
		}
		$data['main_content']="admin/advertisement/advertisement_action";
        $this->load->view('admin_template', $data);
	}
///////////  All  Delete///////////////////////
public function deleteData($tableName,$colId){
		$cID = $this->input->get('deleteId');
		$this->Index_model->deletetable_row($tableName, $colId, $cID);
	}

}

?>
