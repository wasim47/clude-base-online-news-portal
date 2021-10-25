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
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->library('pagination');
	}
	function index()
	{
		if($this->session->userdata('userAccessMail')) redirect("Bpmaadminmanage/dashboard");
		$data['title']="BPMA | Bangladesh Paint Manufacturer’s Association";
        $this->load->view('admin/index',$data);
	}

/////////////////////// Admin Part ////////////////////////////////	 
	
	function dashboard()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("Bpmaadminmanage");
		$data['title']="Dashboard BPMA | Bangladesh Paint Manufacturer’s Association";
		$data['main_content']="admin/dashboard";
        $this->load->view('admin_template',$data);
	}
	function admin_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("Bpmaadminmanage");
		$data['title']="Article List BPMA | Bangladesh Paint Manufacturer’s Association";
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
                    $usr_result = $this->Index_model->get_userLogin($username, $password);
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
		$details=$this->uri->segment(3);
		if(isset($details) && is_numeric($details)){
			$pageuri=3;
		}
		else{
			$pageuri=0;
			}
			$data['totalResult']=$this->Index_model->getTable('member','id','desc');
			$config = array();
			$config["base_url"] = base_url('bpmaadminmanage/member_list');
			$config["total_rows"] = $data['totalResult']->num_rows();
			$config["per_page"] = 20;
			$config['num_links'] = $data['totalResult']->num_rows();
			$config['cur_tag_open'] = '&nbsp;<a class="current">';
			$config['cur_tag_close'] = '</a>';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Previous';
			
			$config["uri_segment"] = $pageuri;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment($pageuri)) ? $this->uri->segment($pageuri) : 0;
			$data['pagination']= $this->pagination->create_links();
			$data['pageSl'] = $page;
			
		
		$data['member_list'] = $this->Index_model->getAllMemberAdmin($config["per_page"],$page);
		if($details=='details'){
			$mid=$this->uri->segment(4);
			$data['memberDetails'] = $this->Index_model->getAllItemTable('member','id',$mid,'','','id','desc');
			$data['main_content']="admin/member/memberDetails";
		}
		else{
			$data['main_content']="admin/member/member_list";
		}
		$this->load->view('admin_template',$data);
	} 
	
	function registration($status)
	{
		if(!isset($status)) redirect(base_url('error'));
		$mid=$this->uri->segment(4);
		$data['memberUpdate'] = $this->Index_model->getAllItemTable('member','id',$mid,'','','id','desc');
		$data['title']="Member Registration | BPMA";
		
		
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			if($status=='new'){
				$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[member.email]');
				$this->form_validation->set_rules('reg_no', 'Membership Id', 'trim|required|is_unique[member.reg_no]');
			}
			elseif($status=='edit'){
				$this->form_validation->set_rules('email', 'Email', 'trim|required');
				$this->form_validation->set_rules('reg_no', 'Membership Id', 'trim|required');
			}
			$this->form_validation->set_rules('contact', 'Contact', 'trim|required');
			$this->form_validation->set_rules('companyname', 'Company Name', 'trim|required');
			$this->form_validation->set_rules('head_organization', 'Head Organization', 'trim|required');
			$this->form_validation->set_rules('contact_person', 'Contact Person', 'trim|required');
			$this->form_validation->set_rules('position', 'Position', 'trim|required');
			$this->form_validation->set_rules('address', 'Company Aaddress', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			
			if($this->form_validation->run() != false){
			$companyName = $this->input->post('companyname');
			$expval=explode('.',$companyName);
			$impval=implode('_',$expval);
			$config['allowed_types'] = '*';
			$config['overwrite'] = FALSE;
			$config['remove_spaces'] = true;
			$config['max_size'] = '1000000';
			$config['upload_path'] = './asset/uploads/member/logo/';
			$config['charset'] = "UTF-8";
			$new_name = "BPMA_Member_".$impval."".time();
			$config['file_name'] = $new_name;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			if (isset($_FILES['clogo']['name']))
			{
			if($this->upload->do_upload('clogo')){
					$upload_data	= $this->upload->data();
					$save['logo']	= $upload_data['file_name'];
				}
				else{
					 //echo $this->upload->display_errors(); die();
					$upload_data	= $this->input->post('stillLogo');
					$save['logo']	= $upload_data;	
				}
			}	
			
			
			$config2['allowed_types'] = '*';
			$config2['remove_spaces'] = true;
			$config2['max_size'] = '1000000';
			$config2['upload_path'] = './asset/uploads/member/file/';
			$config2['charset'] = "UTF-8";
			$new_name2 = "BPMA_Member_".$impval."".time();
			$config2['file_name'] = $new_name2;
			$this->load->library('upload', $config2);
			$this->upload->initialize($config2);
			
			if (isset($_FILES['firstfile']['name']))
			{
			if($this->upload->do_upload('firstfile')){
					$upload_data	= $this->upload->data();
					$save['firstfile']	= $upload_data['file_name'];
				}
				else{
					 //echo $this->upload->display_errors(); die();
					$upload_data	= $this->input->post('stillfile1');
					$save['firstfile']	= $upload_data;	
				}
			}
			
			if (isset($_FILES['secondfile']['name']))
			{
			if($this->upload->do_upload('secondfile')){
					$upload_data	= $this->upload->data();
					$save['secondfile']	= $upload_data['file_name'];
				}
				else{
					$upload_data	= $this->input->post('stillfile2');
					$save['secondfile']	= $upload_data;	
				}
			}	
			
			if (isset($_FILES['thirdfile']['name']))
			{
			if($this->upload->do_upload('thirdfile')){
					$upload_data	= $this->upload->data();
					$save['thirdfile']	= $upload_data['file_name'];
				}
				else{
					$upload_data	= $this->input->post('stillfile3');
					$save['thirdfile']	= $upload_data;	
				}
			}
			
			if (isset($_FILES['fourthfile']['name']))
			{
			if($this->upload->do_upload('fourthfile')){
					$upload_data	= $this->upload->data();
					$save['fourthfile']	= $upload_data['file_name'];
				}
				else{
					$upload_data	= $this->input->post('stillfile4');
					$save['fourthfile']	= $upload_data;	
				}
			}
				
				$save['company_name']	    = $companyName;
				$save['reg_no']	    = $this->input->post('reg_no');
				$save['head_organization']	    = $this->input->post('head_organization');
				$save['contact_person']	    = $this->input->post('contact_person');
				$save['position']	    = $this->input->post('position');
				$save['contact']	    = $this->input->post('contact');
				$save['password'] = sha1($this->input->post('password'));
				$save['passwordHints'] = $this->input->post('password');
				$save['email']	    = $this->input->post('email');
				$save['web']	    = $this->input->post('web');
				$save['fax']		 = $this->input->post('fax');
				$save['address']	    = $this->input->post('address');
				$save['year_of_inception']	    = $this->input->post('year_of_inception');
				$save['others_information']	    = $this->input->post('others_information');
				
				
				if($status=='edit' && $this->input->post('memebr_id')!=""){
					$memebr_id=$this->input->post('memebr_id');
					$this->Index_model->update_table('member','id',$memebr_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('member', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				
				redirect('bpmaadminmanage/member_list', 'refresh');
			}
		}
		$data['main_content']="admin/member/registration";
        $this->load->view('admin_template', $data);
	}
	
	function approved()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("bpmaadminmanage");
		$approve_val[]=$this->input->get('approve_val');
		$data['category']=$this->Index_model->get_category_approve($approve_val);   
		redirect('bpmaadminmanage/member_list', '');

	}
	
	function deapproved()

	{
	   if(!$this->session->userdata('userAccessMail')) redirect("bpmaadminmanage");
		$deapprove_val[]=$this->input->get('deapprove_val');
		$data['category']=$this->Index_model->get_category_deapprove($deapprove_val);   
		redirect('bpmaadminmanage/member_list', '');
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
		$data['root_menu'] = $this->Index_model->getAllItemTable('menu','root_id',0,'','','menu_name','asc');
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
				$save['page_structure']	    = $this->input->post('page_structure');
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
	
	//'.base_url("bpmaadminmanage/ajaxData?sroot_id='+this.value+'").'
	function ajaxData()
	{
		if($this->input->get('root_id')!=""){
			$rid=$this->input->get('root_id');
			$url="'http://localhost/wasim/bpma/bpmaadminmanage/ajaxData?sroot_id='+this.value+''";
			$sroot_menu = $this->Index_model->getAllItemTable('menu','root_id',$rid,'','','menu_name','asc');
			$svar='<select name="sroot_id" class="form-control" style="width:60%;" onChange="getSubMenu('.$url.')">
								<option value="">Sub Menu</option>';
								 foreach($sroot_menu->result() as $rootmenu):
									$svar .= '<option value="'.$rootmenu->m_id.'">'.$rootmenu->menu_name.'</option>';
								endforeach;
							$svar .= '</select>';
			echo $svar;
		}
		elseif($this->input->get('sroot_id')!=""){
			$rid=$this->input->get('sroot_id');
			$sroot_menu = $this->Index_model->getAllItemTable('menu','sroot_id',$rid,'','','menu_name','asc');
			$svar='<select name="lroot_id" class="form-control" style="width:60%;">
								<option value="">Last Menu</option>';
								 foreach($sroot_menu->result() as $rootmenu):
									$svar .= '<option value="'.$rootmenu->m_id.'">'.$rootmenu->menu_name.'</option>';
								endforeach;
							$svar .= '</select>';
			echo $svar;
		}
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
		$data['root_menu'] = $this->Index_model->getAllItemTable('menu','','','','','menu_name','asc');
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
				$save['menu_title']	    = $this->input->post('root_id');
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
			$this->form_validation->set_rules('adPosition', 'Ad Position', 'trim|required');
			
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
							$upload_data	= $this->input->post('adPhoto');
							$save['image']	= $upload_data;	
						}
					}	
				
				$save['advertisement_name']	    = $this->input->post('advertisement_name');
				$save['adPosition']	    = $this->input->post('adPosition');
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
	
	
	
	/////////////////////// Events ////////////////////////////////	 
	function events_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("bpmaadminmanage");
		$data['title']="events List | BPMA";
		$data['events_list'] = $this->Index_model->getTable('events','m_id','desc');
		$data['main_content']="admin/events/events_list";
        $this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function events_registration()
	{
		
		$artiId=$this->uri->segment(3);
		
		$data['eventsUpdate'] = $this->Index_model->getAllItemTable('events','m_id',$artiId,'','','m_id','desc');
		if(!$artiId){
			$data['title']="Events Registration | BPMA";
			$this->form_validation->set_rules('events_name', 'events name', 'trim|required|is_unique[events.events_name]');
		}
		else{
			$data['title']="Events Update | BPMA";
			$this->form_validation->set_rules('events_name', 'events name', 'trim|required');
		}
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			if($this->form_validation->run() != false){
				$config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['max_size'] = '1000000';
				$config['upload_path'] = './asset/uploads/event/';
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
					
					
			$expval=explode(' ',$this->input->post('events_name'));
			$impval=implode('-',$expval);
				$save['events_name']	    = addslashes($this->input->post('events_name'));
				$save['events_details']	    = addslashes($this->input->post('details'));
				$save['slug']	    = addslashes(strtolower($impval));
				$save['upcomming_id	']	    = $this->input->post('upcomming_id');
				$save['latest_id']	    = $this->input->post('latest_id');
				$save['date']	    = date('Y-m-d');
				
				if($this->input->post('m_id')!=""){
					$m_id=$this->input->post('m_id');
					$this->Index_model->update_table('events','m_id',$m_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('events', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('bpmaadminmanage/events_list', 'refresh');
			}
			else{
				$data['main_content']="admin/events/events_action";
        		$this->load->view('admin_template', $data);
				}
		}
		$data['main_content']="admin/events/events_action";
        $this->load->view('admin_template', $data);
	}
	
	
	/////////////////////// ecmember ////////////////////////////////	 
	function ecmember_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("bpmaadminmanage");
		$data['title']="ecmember List | BPMA";
		$data['ecmember_list'] = $this->Index_model->getTable('ecmember','b_id','desc');
		$data['main_content']="admin/ecmember/ecmember_list";
        $this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function ecmember_registration()
	{
		
		$artiId=$this->uri->segment(3);
		if(!$artiId){
			$data['title']="ecmember Registration | BPMA";
		}
		else{
			$data['title']="ecmember Update | BPMA";
		}
		$data['ecmemberUpdate'] = $this->Index_model->getAllItemTable('ecmember','b_id',$artiId,'','','b_id','desc');
		$data['committee_menu'] = $this->Index_model->getAllItemTable('menu','page_structure','committee','','','menu_name','asc');
		
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			$this->form_validation->set_rules('ecmember_name', 'ecmember name', 'trim|required');
			
			if($this->form_validation->run() != false){
				
			$config['allowed_types'] = '*';
			$config['remove_spaces'] = true;
			$config['max_size'] = '1000000';
			$config['upload_path'] = './asset/uploads/ecmember/';
			$config['charset'] = "UTF-8";
			$new_name = "ecmember_".time();
			$config['file_name'] = $new_name;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
				if (isset($_FILES['ecmemberPhoto']['name']))
				{
					if($this->upload->do_upload('ecmemberPhoto')){
						$upload_data	= $this->upload->data();
						$save['image']	= $upload_data['file_name'];
					}
					else{
						$upload_data	= $this->input->post('stillImage');
						$save['image']	= $upload_data;	
					}
				}	
				
				$save['display']	    = $this->input->post('display');
				$save['ecmember_name']	    = $this->input->post('ecmember_name');
				$save['designation']	    = $this->input->post('designation');
				$save['category']	    = $this->input->post('category');
				$save['date']	    = date('Y-m-d');
				
				if($this->input->post('b_id')!=""){
					$b_id=$this->input->post('b_id');
					$this->Index_model->update_table('ecmember','b_id',$b_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('ecmember', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('bpmaadminmanage/ecmember_list', 'refresh');
			}
			else{
				$data['main_content']="admin/ecmember/ecmember_action";
        		$this->load->view('admin_template', $data);
				}
		}
		$data['main_content']="admin/ecmember/ecmember_action";
        $this->load->view('admin_template', $data);
	}
	
	
	/////////////////////// photogallery ////////////////////////////////	 
	function photogallery_list()
	{
		if(!$this->session->userdata('userAccessMail')) redirect("bpmaadminmanage");
		$data['title']="photogallery List | BPMA";
		$data['photogallery_list'] = $this->Index_model->getTable('photogallery','b_id','desc');
		$data['main_content']="admin/photogallery/photogallery_list";
        $this->load->view('admin_template',$data);
	} 
	 
	 
	 
	function photogallery_registration()
	{
		
		$artiId=$this->uri->segment(3);
		if(!$artiId){
			$data['title']="photogallery Registration | BPMA";
		}
		else{
			$data['title']="photogallery Update | BPMA";
		}
		$data['photogalleryUpdate'] = $this->Index_model->getAllItemTable('photogallery','b_id',$artiId,'','','b_id','desc');
		$data['gallery_menu'] = $this->Index_model->getAllItemTable('menu','page_structure','gallery','','','menu_name','asc');
		
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			$this->form_validation->set_rules('photogallery_name', 'photogallery name', 'trim|required');
			$this->form_validation->set_rules('category', 'Gallery Menu', 'trim|required');
			
			if($this->form_validation->run() != false){
				
			$config['allowed_types'] = '*';
			$config['remove_spaces'] = true;
			$config['max_size'] = '1000000';
			$config['upload_path'] = './asset/uploads/photogallery/';
			$config['charset'] = "UTF-8";
			$new_name = "photogallery_".time();
			$config['file_name'] = $new_name;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
				if (isset($_FILES['photogalleryPhoto']['name']))
				{
					if($this->upload->do_upload('photogalleryPhoto')){
						$upload_data	= $this->upload->data();
						$save['image']	= $upload_data['file_name'];
					}
					else{
						$upload_data	= "";
						$save['image']	= $upload_data;	
					}
				}	
				
				$save['photogallery_name']	    = $this->input->post('photogallery_name');
				$save['category']	    = $this->input->post('category');
				$save['date']	    = date('Y-m-d');
				
				if($this->input->post('b_id')!=""){
					$b_id=$this->input->post('b_id');
					$this->Index_model->update_table('photogallery','b_id',$b_id,$save);
					$s='Updated';
				}
				else{
					$query = $this->Index_model->inertTable('photogallery', $save);
					$s='Inserted';
					}
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully '.$s.'</h2>');
				redirect('bpmaadminmanage/photogallery_list', 'refresh');
			}
			else{
				$data['main_content']="admin/photogallery/photogallery_action";
        		$this->load->view('admin_template', $data);
				}
		}
		$data['main_content']="admin/photogallery/photogallery_action";
        $this->load->view('admin_template', $data);
	}
	
	
	
	
	public function sequenceManage(){
		//$this->load->view('admin/updateList');
		$array	= $_POST['arrayorder'];
		if ($_POST['update'] == "update"){
			
			$count = 1;
			foreach ($array as $idval) {
				$query = "UPDATE ecmember SET sequence = " . $count . " WHERE b_id = " . $idval;
				$this->db->query($query);
				$count ++;	
			}
			echo 'All saved! refresh the page to see the changes';
		}
	}	
	
	
	
///////////  All  Delete///////////////////////
public function deleteData($tableName,$colId){
		$cID = $this->input->get('deleteId');
		$this->Index_model->deletetable_row($tableName, $colId, $cID);
	}

}

?>
