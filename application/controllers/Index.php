<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Index_model');
		date_default_timezone_set('Asia/Dhaka');
     	$this->load->library('email');
		$this->load->library('cart');
		$this->load->helper('form');
    	$this->load->library('pagination');
		$this->load->helper('url');
	}
	function index()
	{
		$data['title']="Welcome to the Bangladesh Paint Manufacturer's Association (BPMA)";
		$data['menu']	= $this->Index_model->getDataById('menu','root_id',0,'m_id','asc','');
		$data['leftsideAd']	= $this->Index_model->getDataById('advertisement','adPosition','Left Side','date','asc','4');
		$data['rightsideAd']	= $this->Index_model->getDataById('advertisement','adPosition','Right Side','date','asc','4');
		$data['articledetails']	= $this->Index_model->getOneItemTable('article_manage','menu_title','home','a_id','desc',1);
		$data['banner']	= $this->Index_model->getDataById('banner','','','b_id','desc','');
		$data['upcomevents']	= $this->Index_model->getDataById('events','upcomming_id',1,'m_id','asc','');
		$data['main_content']="frontend/index";
		$this->load->view('template',$data);
	}
	function article()
	{
		$cat=$this->uri->segment(3);
		$scat=$this->uri->segment(4);
		$lcat=$this->uri->segment(5);
		if(isset($lcat)){
			$slug=$lcat;
		}
		elseif(isset($scat)){
			$slug=$scat;
		}
		elseif(isset($cat)){
			$slug=$cat;
		}
		$url=urldecode($slug);
		$exp=explode('-',$slug);
		$imp=implode(' ',$exp);
		$data['title']=ucfirst($imp);
		$data['slug']=$slug;
		$data['menu']	= $this->Index_model->getDataById('menu','root_id',0,'m_id','asc','');
		$data['upcomevents']	= $this->Index_model->getDataById('events','upcomming_id',1,'m_id','asc','');
		$data['leftsideAd']	= $this->Index_model->getDataById('advertisement','adPosition','Left Side','date','asc','4');
		$data['rightsideAd']	= $this->Index_model->getDataById('advertisement','adPosition','Right Side','date','asc','4');
		$data['articledetails']	= $this->Index_model->getOneItemTable('article_manage','menu_title',$url,'a_id','desc',1);
		
		if($slug=='contact-us'){
			$data['main_content']="frontend/contact_view";
		}
		else{
			$data['main_content']="frontend/article_details";
		}
        $this->load->view('template', $data);
	}
	
	function gallery()
	{
		$lcat=$this->uri->segment(5);
		$scat=$this->uri->segment(4);
		$cat=$this->uri->segment(3);
		if(isset($lcat) && !is_numeric($lcat)){
			$slug=$lcat;
			$pageuri=6;
			$baseurl=base_url('index/gallery/'.$cat.'/'.'/'.$scat.'/'.$lcat);
			$fullUrl=$cat.'/'.$scat.'/'.$lcat;
		}
		elseif(isset($scat) && !is_numeric($scat)){
			$slug=$scat;
			$pageuri=5;
			$baseurl=base_url('index/gallery/'.$cat.'/'.'/'.$scat);
			$fullUrl=$cat.'/'.$scat;
		}
		elseif(isset($cat) && !is_numeric($cat)){
			$slug=$cat;
			$pageuri=4;
			$baseurl=base_url('index/gallery/'.$cat);
			$fullUrl=$cat;
		}
		
		$url=urldecode($slug);
		$exp=explode('-',$slug);
		$imp=implode(' ',$exp);
		$data['title']=ucfirst($imp);
		$data['fullurl']=$fullUrl;
		$data['slug']=$slug;
		
		$data['menu']	= $this->Index_model->getDataById('menu','root_id',0,'m_id','asc','');
		
			$data['totalResult']=$this->Index_model->getDataById('photogallery','category',$url,'b_id','desc','');
			$config = array();
			$config["base_url"] = $baseurl;
			$config["total_rows"] = $data['totalResult']->num_rows();
			$config["per_page"] = 30;
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
		
		$data['leftsideAd']	= $this->Index_model->getDataById('advertisement','adPosition','Left Side','date','asc','4');
		$data['rightsideAd']	= $this->Index_model->getDataById('advertisement','adPosition','Right Side','date','asc','4');	
		$data['photogallery']	= $this->Index_model->getDataByIdWithPagination('photogallery','category',$url,'b_id','desc',$config["per_page"],$page);
		$data['upcomevents']	= $this->Index_model->getDataById('events','upcomming_id',1,'m_id','asc','');
		$data['main_content']="frontend/picture_gallery";
        $this->load->view('template', $data);
	}
	function committee()
	{
		$cat=$this->uri->segment(3);
		$scat=$this->uri->segment(4);
		$lcat=$this->uri->segment(5);
		if(isset($lcat)){
			$slug=$lcat;
		}
		elseif(isset($scat)){
			$slug=$scat;
		}
		elseif(isset($cat)){
			$slug=$cat;
		}
		$url=urldecode($slug);
		$exp=explode('-',$slug);
		$imp=implode(' ',$exp);
		$data['title']=ucfirst($imp);
		$data['slug']=$slug;
		$data['menu']	= $this->Index_model->getDataById('menu','root_id',0,'m_id','asc','');
		$data['leftsideAd']	= $this->Index_model->getDataById('advertisement','adPosition','Left Side','date','asc','4');
		$data['rightsideAd']	= $this->Index_model->getDataById('advertisement','adPosition','Right Side','date','asc','4');
		$data['committee']	= $this->Index_model->getDataById('ecmember','category',$url,'b_id','asc','');
		$data['upcomevents']	= $this->Index_model->getDataById('events','upcomming_id',1,'m_id','asc','');
		$data['main_content']="frontend/committee";
        $this->load->view('template', $data);
	}
	function member()
	{
		$lcat=$this->uri->segment(5);
		$scat=$this->uri->segment(4);
		$cat=$this->uri->segment(3);
		if(isset($lcat) && !is_numeric($lcat)){
			$slug=$lcat;
			$pageuri=6;
			$baseurl=base_url('index/member/'.$cat.'/'.'/'.$scat.'/'.$lcat);
			$fullUrl=$cat.'/'.$scat.'/'.$lcat;
		}
		elseif(isset($scat) && !is_numeric($scat)){
			$slug=$scat;
			$pageuri=5;
			$baseurl=base_url('index/member/'.$cat.'/'.'/'.$scat);
			$fullUrl=$cat.'/'.$scat;
		}
		elseif(isset($cat) && !is_numeric($cat)){
			$slug=$cat;
			$pageuri=4;
			$baseurl=base_url('index/member/'.$cat);
			$fullUrl=$cat;
		}
		
		$url=urldecode($slug);
		$exp=explode('-',$slug);
		$imp=implode(' ',$exp);
		$data['title']=ucfirst($imp);
		$data['fullurl']=$fullUrl;
		$data['slug']=$slug;
		$data['menu']	= $this->Index_model->getDataById('menu','root_id',0,'m_id','asc','');
		$keyword = $this->input->post('keyword');
		$searchkey = $this->input->get('searchkey');
		
			$data['totalResult']=$this->Index_model->getAllMemberCount($keyword,$searchkey);
			$config = array();
			//$config["base_url"] = base_url('index/member/'.$cat.'/'.'/'.$scat.'/'.$lcat);
			$config["base_url"] = $baseurl;
			$config["total_rows"] = $data['totalResult'];
			$config["per_page"] = 5;
			$config['num_links'] = $data['totalResult'];
			$config['cur_tag_open'] = '&nbsp;<a class="current">';
			$config['cur_tag_close'] = '</a>';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Previous';
			
			$config["uri_segment"] = $pageuri;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment($pageuri)) ? $this->uri->segment($pageuri) : 0;
			$data['pagination']= $this->pagination->create_links();
			$data['pageSl'] = $page;
		
		$data['memberlist']	= $this->Index_model->getAllMember($keyword,$searchkey,$config["per_page"],$page);
		$data['leftsideAd']	= $this->Index_model->getDataById('advertisement','adPosition','Left Side','date','asc','4');
		$data['rightsideAd']	= $this->Index_model->getDataById('advertisement','adPosition','Right Side','date','asc','4');
		$data['upcomevents']	= $this->Index_model->getDataById('events','upcomming_id',1,'m_id','asc','');
		$data['main_content']="frontend/memberlist";
        $this->load->view('template', $data);
	}
	
	function memberDetails($mid)
	{
		$data['menu']	= $this->Index_model->getDataById('menu','root_id',0,'m_id','asc','');
		$data['userProfile'] = $this->Index_model->getOneItemTable('member','id',$mid,'id','desc');
		$data['title']=$data['userProfile']['company_name'];
		$data['leftsideAd']	= $this->Index_model->getDataById('advertisement','adPosition','Left Side','date','asc','4');
		$data['rightsideAd']	= $this->Index_model->getDataById('advertisement','adPosition','Right Side','date','asc','4');
		$data['upcomevents']	= $this->Index_model->getDataById('events','upcomming_id',1,'m_id','asc','');
		$data['main_content']="frontend/member_details";
        $this->load->view('template', $data);
	}
	
	
	function signUp()
	{
		$data['menu']	= $this->Index_model->getDataById('menu','root_id',0,'m_id','asc','');
		$data['title']="Member Registration | BPMA";
		$data['upcomevents']	= $this->Index_model->getDataById('events','upcomming_id',1,'m_id','asc','');
		$data['leftsideAd']	= $this->Index_model->getDataById('advertisement','adPosition','Left Side','date','asc','4');
		$data['rightsideAd']	= $this->Index_model->getDataById('advertisement','adPosition','Right Side','date','asc','4');
		
		if($this->input->post('registration') && $this->input->post('registration')!=""){
			$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[member.email]');
			$this->form_validation->set_rules('reg_no', 'Membership Id', 'trim|required|is_unique[member.reg_no]');
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
					$upload_data	= '';
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
					$upload_data	= '';
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
					$upload_data	= '';
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
					$upload_data	= '';
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
					$upload_data	= '';
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
				
				$query = $this->Index_model->inertTable('member', $save);
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully Registration '.$companyName.'</h2>');
				redirect($_SERVER['HTTP_REFERER'], 'refresh');
			}
		}
		
		$data['main_content']="frontend/member_signup";
        $this->load->view('template', $data);
	}
	
	public function userLogin()
     {
		 if($this->session->userdata('memberAccessId')) redirect("memberhome");
          $username = $this->input->post("username");
  		  $password = $this->input->post("password");
          $this->form_validation->set_rules("username", "Email", "trim|required|min_length[6]|valid_email");
          $this->form_validation->set_rules("password", "Password", "trim|required");

          if ($this->form_validation->run() == FALSE)
          {
              redirect('Index');
          }
          else
          {
                    $usr_result = $this->Index_model->get_memberLogin($username, $password);
                    if ($usr_result > 0)
                    {
					  $sessiondata = array(
						'memberAccessMail'=>$username,
						'memberAccessName'=> $usr_result['company_name'],
						'memberAccessId' => $usr_result['id'],
						'password' => TRUE
					   );
						$this->session->set_userdata($sessiondata);
						redirect("Index/memberhome/");
                    }
                    else
                    {
                     $this->session->set_flashdata('msg', '<h3 class="alert alert-danger text-center" style="padding:7px; margin-bottom:5px">Invalid Email and password!</h3>');
                     redirect('Index');
                    }
          }
     }
	 
	   function logout()
		{
		  $sessiondata = array(
					'memberAccessMail'=>'',
					'memberAccessName'=> '',
					'memberAccessId' => '',
					'password' => FALSE
			 );
		$this->session->unset_userdata($sessiondata);
		$this->session->sess_destroy();
		redirect('index', 'refresh');
	  }
	  
	 function memberhome()
	{
		if(!$this->session->userdata('memberAccessId')) redirect("index");
		$mid=$this->session->userdata('memberAccessId');
		$data['title']=$this->session->userdata('memberAccessName');
		$data['menu']	= $this->Index_model->getDataById('menu','root_id',0,'m_id','asc','');
		$data['articledetails']	= $this->Index_model->getOneItemTable('article_manage','menu_title','home','a_id','desc',1);
		$data['userProfile'] = $this->Index_model->getOneItemTable('member','id',$mid,'id','desc');
		$data['upcomevents']	= $this->Index_model->getDataById('events','upcomming_id',1,'m_id','asc','');
		
		
		
		if($this->input->post('updateProfile') && $this->input->post('updateProfile')!=""){
			/*$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('reg_no', 'Membership Id', 'trim|required');
			$this->form_validation->set_rules('contact', 'Contact', 'trim|required');
			$this->form_validation->set_rules('companyname', 'Company Name', 'trim|required');
			$this->form_validation->set_rules('head_organization', 'Head Organization', 'trim|required');
			$this->form_validation->set_rules('contact_person', 'Contact Person', 'trim|required');
			$this->form_validation->set_rules('position', 'Position', 'trim|required');
			$this->form_validation->set_rules('address', 'Company Aaddress', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			
			if($this->form_validation->run() != false){*/
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
				
				$this->Index_model->update_table('member','id',$mid,$save);
				$this->session->set_flashdata('successMsg', '<h2 class="alert alert-success">Successfully Updated </h2>');
				redirect('index/memberhome', 'refresh');
			//}
		}
		elseif($this->input->post('changePassword')){
			$data['title'] = 'Error! Password Change';

			$this->form_validation->set_rules('oldpassword', 'Old Password', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confirmpassword]');
			$this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'required');
			$old_password = sha1($this->input->post('oldpassword'));
			$queryCheck = $this->Index_model->checkOldPass('member',$old_password,$mid);
			if($queryCheck->num_rows() >0 ){
				if($this->form_validation->run() != false){
					$password =sha1($this->input->post('password'));
					$passwordHints =$this->input->post('password');
					$dataUpdate = array(
						'password'		=> $password,
						'passwordHints'	=> $passwordHints,
						'modify_date'	=> date('Y-m-d')
					);
					
					$query = $this->cmodel->updateTable('member','id',$mid,$dataUpdate);
					if($query){
						$this->session->set_flashdata('globalMsg', '<div class="alert alert-success">Password Change Successfully </div>');
						redirect('index/memberhome', 'refresh');
					}
				}
			}
			else{
			$this->session->set_flashdata('globalMsg', '<div class="alert alert-danger">Old Password not match </div>');
			redirect('index/memberhome', 'refresh');
			}
		}
		
		
		$data['main_content']="frontend/member_home";
		$this->load->view('template',$data);
	}
	
	  public function contact_email(){

    $this->load->library('email');

    $data = array();
    $data['name'] = $this->input->post('name', true);
    $data['email'] = $this->input->post('email', true);
    $data['phone'] = $this->input->post('phone', true);
    $data['message'] = $this->input->post('message', true);
    
    $this->email->from($data['email']);
//, 'Your Name'
    $this->email->to('info@bpmabd.org');
    $this->email->subject('Info Mail');
    $this->email->message(
            'Name:' . $data['name'] . '<br>' .
            'Email:' . $data['email'] . '<br>' .
            'Phone:' . $data['phone'] . '<br>' .
            $data['message']
    );
    
    if($this->email->send()){
    
     $this->Index_model->save_info($data);
     $this->session->set_flashdata('msg','Your Information Successfull Sent We Will Get Back to You Soon',1);
           redirect('index/article/contact-us');
    }
    else {
echo $this->email->print_debugger(); 
                
    }    
        }
}

?>
