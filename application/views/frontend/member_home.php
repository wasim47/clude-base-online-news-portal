<style>
.main {margin: 3px auto; background:#f5f5f5; width:100%; box-shadow:#ccc 0 0 1px 1px; float:left}
.content {background: #fff; color: #373737;; float:left;transition: all 0.8s ease;width:100%;}
.content > div {display: none; padding: 0px 0px 0px; float:left;transition: all 0.8s ease; }

input[type='radio'] {display: none;}
label {display: inline-block; padding: 15px 25px; text-align: left;float:left;}
label:hover {color: #333; cursor: pointer;float:left;transition: all 0.8s ease;}
input:checked + label {background: #eaeaea; color: #333; float:left;transition: all 0.8s ease;}

#tab1:checked ~ .content #content1,
#tab2:checked ~ .content #content2,
#tab3:checked ~ .content #content3{
  display: block;
  float:left;
  text-align:left;
}


</style>
    <div class="wrapper">
    <div class="bdy_container">
    	
<section class="content_area">

                <!--<div class="nws_bg">
                	<div class="nws1">Latest News :</div>
                </div>-->
        	<div class="ca_left">
            	<div class="adArea"><?php include('upcommingevents.php');?></div>
            	<div class="adArea">
                    <img src="<?php echo base_url('asset/uploads/advertisement/ad8.gif');?>" class="adImg" />
                    <img src="<?php echo base_url('asset/uploads/advertisement/ad9.gif');?>" class="adImg" />
                    <img src="<?php echo base_url('asset/uploads/advertisement/ad10.gif');?>" class="adImg" />
                    <img src="<?php echo base_url('asset/uploads/advertisement/ad11.gif');?>" class="adImg" />
               </div>
            </div>
            <div class="ca_middle">
            	<div class="notice_bg">
                    <div style="width:100%; float:left;margin-right:20px;"> 
   		 <div class="main">
  
		  <input id="tab1" type="radio" name="tabs" checked>
		  <label for="tab1">Profile</label>
	
		  <input id="tab2" type="radio" name="tabs">
		  <label for="tab2">Edit Profile</label>
	
		  <input id="tab3" type="radio" name="tabs">
		  <label for="tab3">Change Password</label>
	
	
		  <div class="content">  
			  <div id="content1">
         		<div style="width:100%; margin:30px;">
                
                   <div class="form-group">
                   		<label class="control-label">Company Name :</label>
                        <div style="margin:5px; padding:5px;  width:60%; float:left; color:#333; font-size:15px; text-shadow:#ccc 1px 1px">
						<?php echo $userProfile['company_name'];?></div>
                   </div>
                   <div class="form-group">
                   		<label class="control-label">Company Logo :</label>
                        <div style="margin:5px; padding:5px;  width:60%; float:left; color:#333; font-size:15px; text-shadow:#ccc 1px 1px">
						<img src="<?php echo base_url('asset/uploads/member/logo/'.$userProfile['logo']);?>" style="width:60%; height:auto" /></div>
                   </div>
                   <div class="form-group">
                   		<label class="control-label">Head Organization :</label>
                        <div style="margin:5px; padding:5px;  width:60%; float:left; color:#333; font-size:15px; text-shadow:#ccc 1px 1px">
						<?php echo $userProfile['head_organization'];?></div>
                   </div>
                   <div class="form-group">
                   		<label class="control-label">Contact Person :</label>
                        <div style="margin:5px; padding:5px;  width:60%; float:left; color:#333; font-size:15px; text-shadow:#ccc 1px 1px">
						<?php echo $userProfile['contact_person'];?></div>
                   </div>
                   <div class="form-group">
                   		<label class="control-label">Position :</label>
                        <div style="margin:5px; padding:5px;  width:60%; float:left; color:#333; font-size:15px; text-shadow:#ccc 1px 1px">
						<?php echo $userProfile['position'];?></div>
                   </div>
                   <div class="form-group">
                   		<label class="control-label">Email :</label>
					<div style="margin:5px; padding:5px;  width:60%; float:left; color:#333; font-size:15px; text-shadow:#ccc 1px 1px"><?php echo $userProfile['email'];?></div>
                   </div>
                   
                   <div class="form-group">
                   		<label class="control-label">Contact :</label>
                        <div style="margin:5px; padding:5px;  width:60%; float:left; color:#333; font-size:15px; text-shadow:#ccc 1px 1px">
						<?php echo $userProfile['contact'];?></div>
                   </div>
                   <div class="form-group">
                   		<label class="control-label">web :</label>
                        <div style="margin:5px; padding:5px;  width:60%; float:left; color:#333; font-size:15px; text-shadow:#ccc 1px 1px">
						<?php echo $userProfile['web'];?></div>
                   </div>
                   <div class="form-group">
                   		<label class="control-label">fax :</label>
                        <div style="margin:5px; padding:5px;  width:60%; float:left; color:#333; font-size:15px; text-shadow:#ccc 1px 1px">
						<?php echo $userProfile['fax'];?></div>
                   </div>
                   
                   <div class="form-group">
                   		<label class="control-label">Address :</label>
                        <div style="margin:5px; padding:5px;  width:60%; float:left; color:#333; font-size:15px; text-shadow:#ccc 1px 1px">
						<?php echo $userProfile['address'];?></div>
                   </div>
                   <div class="form-group">
                   		<label class="control-label">Year of Inception :</label>
                        <div style="margin:5px; padding:5px;  width:60%; float:left; color:#333; font-size:15px; text-shadow:#ccc 1px 1px">
						<?php echo $userProfile['year_of_inception'];?></div>
                   </div>
                   <div class="form-group">
                   		<label class="control-label">Others Information :</label>
                        <div style="margin:5px; padding:5px;  width:60%; float:left; color:#333; font-size:15px; text-shadow:#ccc 1px 1px">
						<?php echo $userProfile['others_information'];?></div>
                   </div>
                    <div class="form-group">
                   		<input type="submit" name="updateProfile" value="Submit"/>
                   </div>

                </div>
			  </div>
	
			  <div id="content2">
         		<div style="width:100%; margin:30px;">
                
                <?php echo form_open_multipart('');?>
                   
                   <div class="form-group">
                   		<label class="control-label">Company Name :</label>
                        <div style="margin:5px; padding:5px;  width:60%; float:left; color:#333; font-size:15px; text-shadow:#ccc 1px 1px">
						<input type="text" name="companyname" required class="form-control col-md-7 col-xs-12" 
                        value="<?php echo $userProfile['company_name'];?>" /></div>
                   </div>
                   <div class="form-group">
                   		<label class="control-label">Company Logo :</label>
                        <div style="margin:5px; padding:5px;  width:60%; float:left; color:#333; font-size:15px; text-shadow:#ccc 1px 1px">
						<img src="<?php echo base_url('asset/uploads/member/logo/'.$userProfile['logo']);?>" style="width:80%; height:auto" /></div>
                   </div>
                   <div class="form-group">
                   		<label class="control-label">Head Organization :</label>
                        <div style="margin:5px; padding:5px;  width:60%; float:left; color:#333; font-size:15px; text-shadow:#ccc 1px 1px">
                        <input type="text" name="head_organization" required class="form-control"  value="<?php echo $userProfile['head_organization'];?>">
    </div>
                   </div>
                   <div class="form-group">
                   		<label class="control-label">Contact Person :</label>
                        <div style="margin:5px; padding:5px;  width:60%; float:left; color:#333; font-size:15px; text-shadow:#ccc 1px 1px">
						<input type="text" name="contact_person" required class="form-control col-md-7 col-xs-12" value="<?php echo $userProfile['contact_person'];?>"></div>
                   </div>
                   <div class="form-group">
                   		<label class="control-label">Position :</label>
                        <div style="margin:5px; padding:5px;  width:60%; float:left; color:#333; font-size:15px; text-shadow:#ccc 1px 1px">
						<?php echo $userProfile['position'];?>
                        <input type="text" name="position" required class="form-control col-md-7 col-xs-12" value="<?php echo $userProfile['position'];?>"></div>
                   </div>
                   <div class="form-group">
                   		<label class="control-label">Email :</label>
					<div style="margin:5px; padding:5px;  width:60%; float:left; color:#333; font-size:15px; text-shadow:#ccc 1px 1px">
					<input type="text" name="email" required class="form-control col-md-7 col-xs-12" value="<?php echo $userProfile['email'];?>"></div>
                   </div>
                   
                   <div class="form-group">
                   		<label class="control-label">Contact :</label>
                        <div style="margin:5px; padding:5px;  width:60%; float:left; color:#333; font-size:15px; text-shadow:#ccc 1px 1px">
						<input type="text" name="contact" required class="form-control col-md-7 col-xs-12" value="<?php echo $userProfile['contact'];?>"></div>
                   </div>
                   <div class="form-group">
                   		<label class="control-label">web :</label>
                        <div style="margin:5px; padding:5px;  width:60%; float:left; color:#333; font-size:15px; text-shadow:#ccc 1px 1px">
						<input type="text" name="web" required class="form-control col-md-7 col-xs-12" value="<?php echo $userProfile['web'];?>"></div>
                   </div>
                   <div class="form-group">
                   		<label class="control-label">fax :</label>
                        <div style="margin:5px; padding:5px;  width:60%; float:left; color:#333; font-size:15px; text-shadow:#ccc 1px 1px">
                        <input type="text" name="fax" required class="form-control col-md-7 col-xs-12" value="<?php echo $userProfile['fax'];?>"></div>
                   </div>
                   
                   <div class="form-group">
                   		<label class="control-label">Address :</label>
                        <div style="margin:5px; padding:5px;  width:60%; float:left; color:#333; font-size:15px; text-shadow:#ccc 1px 1px">
						<textarea name="address"><?php echo $userProfile['address'];?></textarea></div>
                   </div>
                   <div class="form-group">
                   		<label class="control-label">Year of Inception :</label>
                        <div style="margin:5px; padding:5px;  width:60%; float:left; color:#333; font-size:15px; text-shadow:#ccc 1px 1px">
						<input type="text" name="year_of_inception" class="form-control col-md-7 col-xs-12" value="<?php echo $userProfile['year_of_inception'];?>">
						</div>
                   </div>
                   <div class="form-group">
                   		<label class="control-label">Others Information :</label>
                        <div style="margin:5px; padding:5px;  width:60%; float:left; color:#333; font-size:15px; text-shadow:#ccc 1px 1px">
						<textarea name="others_information"><?php echo $userProfile['others_information'];?></textarea></div>
                   </div>
                    <div class="form-group">
                   		<input type="submit" name="submie" value="Submit"/>
                   </div>
               <?php echo form_close();?> 
                </div>
			  </div>
	
			  <div id="content3">
				<div style="width:100%; float:left;margin-right:20px;">
         		<div style="width:100%; margin:30px;">
                <div style="width:100%; float:left; font-size:18px"><?php echo $this->session->flashdata('globalMsg'); ?></div>
                <?php echo form_open('');?>
                   <div class="form-group">
                   		<label class="control-label">Email :</label>
                   		<input type="email" name="email" style="width:60%" value="<?php echo $userProfile['email'];?>"/>
                   </div>
                   <div class="form-group">
                   		<label class="control-label">Old Password :</label>
                   		<input type="password" name="oldpassword" style="width:60%"/>
                        <?php echo form_error('oldpassword','<p class="label label-danger">','</p>'); ?>
                   </div>
                   <div class="form-group">
                   		<label class="control-label">New Password :</label>
                   		<input type="password" name="password" style="width:60%"/>
                        <?php echo form_error('password','<p class="label label-danger">','</p>'); ?>
                   </div>
                   <div class="form-group">
                   		<label class="control-label">Retype- Password :</label>
                   		<input type="password" name="confirmpassword" style="width:60%"/>
                        <?php echo form_error('confirmpassword','<p class="label label-danger">','</p>'); ?>
                   </div>
                    <div class="form-group">
                   		<input type="submit" name="changePassword" value="Submit"/>
                   </div>
               <?php echo form_close();?> 
                </div>
  			  </div>
			  </div>
	
		  </div>
	
		</div>
    </div>
                </div>
            </div>
            <div class="ca_ri8">
            <div class="adArea"><?php include('loginform.php');?></div>
               <div class="adArea">
           	 	<img src="<?php echo base_url('asset/uploads/advertisement/ad8.gif');?>" class="adImg" />
                <img src="<?php echo base_url('asset/uploads/advertisement/ad9.gif');?>" class="adImg" />
                <img src="<?php echo base_url('asset/uploads/advertisement/ad10.gif');?>" class="adImg" />
                <img src="<?php echo base_url('asset/uploads/advertisement/ad11.gif');?>" class="adImg" />
              </div>	
          </div>
        </section>
