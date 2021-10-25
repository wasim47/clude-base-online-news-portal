<?php
	$id='';
	$memId=set_value('reg_no');
	$companyName=set_value('companyname');
	$head=set_value('head_organization');
	$contact_person=set_value('contact_person');
	$position=set_value('position');
	$contact=set_value('contact');
	$email='';
	$web='';
	$fax='';
	$address='';
	$year='';
	$otherInfo='';
	$logo='';
	$file1='';
	$file2='';
	$file3='';
	$file4='';
?>
    <div class="wrapper">
    <div class="bdy_container">
    	
<section class="content_area">

                <!--<div class="nws_bg">
                	<div class="nws1">Latest News :</div>
                </div>-->
        	<div class="ca_left">
            	<div class="adArea"><?php include('upcommingevents.php');?></div>
            	<div class="adArea">
                        <img src="<?php echo base_url('asset/uploads/advertisement/5.Asian Paints.gif');?>" class="adImg" />
                    <img src="<?php echo base_url('asset/uploads/advertisement/7.RAK-PAINTS.gif');?>" class="adImg" />
                    <img src="<?php echo base_url('asset/uploads/advertisement/6.AQUA-PAINT.gif');?>" class="adImg" />
                    <img src="<?php echo base_url('asset/uploads/advertisement/5.Asian Paints.gif');?>" class="adImg" />
               </div>
            </div>
            <div class="ca_middle">
            
            	<div class="notice_bg">
                <h2 class="logo_rightCon">Member Registration</h2>
                    <div style="width:100%; float:left;margin-right:20px;"> 
                   		 <?php echo $this->session->flashdata('successMsg');?>
         				 <?php echo form_open_multipart('', 'class="form-horizontal form-label-left"');?>
                              <div class="panel-body">
                    <div class="form-group">
        <label class="control-label col-md-4 col-sm-4 col-xs-12">Company name<span class="required">*</span>
        </label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <input type="text" name="companyname" required class="form-control col-md-7 col-xs-12" 
            placeholder='Company name' value="<?php echo $companyName; ?>"  onFocus="this.placeholder=''" onBlur="this.placeholder='Company name'">
         <?php echo form_error('companyname', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
        </div>
    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Membership ID No<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input type="text" name="reg_no" required class="form-control col-md-7 col-xs-12"
                            placeholder='Membership ID' onFocus="this.placeholder=''" value="<?php echo $memId; ?>" onBlur="this.placeholder='Membership ID'">
                             <?php echo form_error('reg_no', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
        <label class="control-label col-md-4 col-sm-4 col-xs-12">Head Organization<span class="required">*</span>
        </label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <input type="text" name="head_organization" required class="form-control col-md-7 col-xs-12"  value="<?php echo $head;?>"
            placeholder='Head Organization' onFocus="this.placeholder=''" onBlur="this.placeholder='Head Organization'">
            <?php echo form_error('head_organization', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
        </div>
    </div>
                    <div class="form-group">
        <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">Contact Person</label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <input  class="form-control col-md-7 col-xs-12" type="text" value="<?php echo $contact_person; ?>" name="contact_person"
            placeholder='Contact Person' onFocus="this.placeholder=''" onBlur="this.placeholder='Contact Person'">
            <?php echo form_error('contact_person', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
        </div>
    </div>
                    <div class="form-group">
        <label class="control-label col-md-4 col-sm-4 col-xs-12">Position<span class="required">*</span>
        </label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <input type="text" name="position" required class="form-control col-md-7 col-xs-12" 
            placeholder='position' value="<?php echo $position; ?>"  onFocus="this.placeholder=''" onBlur="this.placeholder='position'">
         <?php echo form_error('position', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
        </div>
    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Contact No<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input type="text" name="contact" required class="form-control col-md-7 col-xs-12"
                            placeholder='Contact No' onFocus="this.placeholder=''" value="<?php echo $contact; ?>" onBlur="this.placeholder='Contact No'">
                             <?php echo form_error('contact', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
        <label class="control-label col-md-4 col-sm-4 col-xs-12">Email<span class="required">*</span>
        </label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <input type="text" name="email" required class="form-control col-md-7 col-xs-12" value="<?php echo $email; ?>" 
            placeholder='Email' onFocus="this.placeholder=''" onBlur="this.placeholder='Email'">
            <?php echo form_error('email', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Password<span class="required">*</span>
        </label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <input type="password" name="password" required class="form-control col-md-7 col-xs-12" 
            placeholder='Password' onFocus="this.placeholder=''" onBlur="this.placeholder='Password'">
            <?php echo form_error('password', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
        </div>
    </div>
                    <div class="form-group">
        <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">Web Address</label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <input class="form-control col-md-7 col-xs-12" type="text" name="web" value="<?php echo $web; ?>"
            placeholder='Web Address' onFocus="this.placeholder=''" onBlur="this.placeholder='Web Address'">
        </div>
    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Fax<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
<input type="text" name="fax" class="form-control col-md-7 col-xs-12"  placeholder='Fax' onFocus="this.placeholder=''" onBlur="this.placeholder='Fax'" value="<?php echo $fax; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Address<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <textarea type="text" name="address" required class="form-control col-md-7 col-xs-12" 
                            placeholder='Company Aaddress'  
                            onFocus="this.placeholder=''" onBlur="this.placeholder='Company Aaddress'"><?php echo $address; ?></textarea>
                         <?php echo form_error('address', '<p style="color:#ff0000;margin:0;">', '</p>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Year of inception<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input type="text" name="year_of_inception" value="<?php echo $year; ?>" class="date-picker  form-control col-md-7 col-xs-12" 
                            placeholder='Year of inception'  onFocus="this.placeholder=''" onBlur="this.placeholder='Year of inception'">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Others information<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <textarea type="text" name="others_information" class="form-control col-md-7 col-xs-12" 
                            placeholder='Others information'  onFocus="this.placeholder=''" onBlur="this.placeholder='Others information'"><?php echo $otherInfo; ?></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Company Logo<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input type="file" name="clogo" id="file" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Upload File 1<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input type="file" name="firstfile" id="file" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Upload File 2<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input type="file" name="secondfile" id="file" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Upload File 3<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input type="file" name="thirdfile" id="file" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Upload File 4<span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input type="file" name="fourthfile" id="file" />
                        </div>
                    </div>
            </div>
                        	   <div class="form-group">
                                  <div style="margin:5px; padding:5px;  width:60%; float:left; color:#333; font-size:15px; text-shadow:#ccc 1px 1px">
                                      <input type="submit" name="registration" class="btn btn-success" style="cursor:pointer" value="Submit">
                                      <input type="reset" name="registration" class="btn btn-primary" style="cursor:pointer" value="Reset">
                                  </div>
                              </div>
                        <?php echo form_close();?>
                    </div>
                </div>
            </div>
            <div class="ca_ri8">
            <div class="adArea"><?php include('loginform.php');?></div>
               <div class="adArea">
           	 	<img src="<?php echo base_url('asset/uploads/advertisement/1.Berger1.gif');?>" class="adImg" />
               <img src="<?php echo base_url('asset/uploads/advertisement/2.ELITE PAINT.gif');?>" class="adImg" />
                <img src="<?php echo base_url('asset/uploads/advertisement/3.PAILAC.gif');?>" class="adImg" />
                <img src="<?php echo base_url('asset/uploads/advertisement/4.ROXY1.gif');?>" class="adImg" />
              </div>	
          </div>
        </section>
