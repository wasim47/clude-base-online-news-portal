<style>
.con_left{
	width:50%;
	float:left;
	font-family:Arial, Helvetica, sans-serif;
	font-size:14px;
	margin-top:20px;
}
	
.con_right{
	width:46%;
	float:right;
	margin-top:20px;
	}


.con_tfield_area{
	width:100%;
	float:left;
	margin-top:10px;
}

.con_tfield1{
	width:59%;
	height:30px;
	background-color:#e7e7e7;
	border:none;
	padding-left:1%;
	}
	
	
.con_tfield2{
	width:99%;
	height:200px;
	background-color:#e7e7e7;
	border:none;
	padding:1%;
	}
	
	
.con_tbtn_area{
	width:100%;
	float:right;
	margin-top:10px;
	margin-bottom:10px;
}
.myButton {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #e8e8e8), color-stop(1, #e3e3e3));
	background:-moz-linear-gradient(top, #e8e8e8 5%, #e3e3e3 100%);
	background:-webkit-linear-gradient(top, #e8e8e8 5%, #e3e3e3 100%);
	background:-o-linear-gradient(top, #e8e8e8 5%, #e3e3e3 100%);
	background:-ms-linear-gradient(top, #e8e8e8 5%, #e3e3e3 100%);
	background:linear-gradient(to bottom, #e8e8e8 5%, #e3e3e3 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#e8e8e8', endColorstr='#e3e3e3',GradientType=0);
	background-color:#e8e8e8;
	-moz-border-radius:28px;
	-webkit-border-radius:28px;
	border-radius:28px;
	border:1px solid #000000;
	display:inline-block;
	cursor:pointer;
	color:#474749;
	font-family:arial;
	font-size:19px;
	padding:4px 15px;
	text-decoration:none;
	text-shadow:0px 1px 0px #e3e3e3;
}
</style>
    <div class="wrapper">
    <div class="bdy_container">
    	
<section class="content_area">

                <!--<div class="nws_bg">
                	<div class="nws1">Latest News :</div>
                </div>-->
        	<?php /*?><!--<div class="ca_left">
            	<div class="adArea"><?php include('upcommingevents.php');?></div>
            	<div class="adArea">
               		<img src="<?php echo base_url('asset/uploads/advertisement/ad13.gif');?>" class="adImgFull" />
                    <img src="<?php echo base_url('asset/uploads/advertisement/ad8.gif');?>" class="adImg" />
                    <img src="<?php echo base_url('asset/uploads/advertisement/ad9.gif');?>" class="adImg" />
                    <img src="<?php echo base_url('asset/uploads/advertisement/ad10.gif');?>" class="adImg" />
                    <img src="<?php echo base_url('asset/uploads/advertisement/ad11.gif');?>" class="adImg" />
               </div>
            </div>--><?php */?>
            <div class="ca_middle" style="width:98%;">
            	<div style="width:97%; border-bottom:1px solid #ccc; background:#f5f5f5; padding:5px; float:left; font-size:12px; color:#333; margin-left:3%;">
                	<a href="<?php echo base_url()?>">Home</a> 
                    &raquo; <a href="<?php echo base_url('index/article_details/'.$this->uri->segment(3))?>"><?php echo ucfirst($this->uri->segment(3));?></a> 
                    <?php if($this->uri->segment(4)){?>
                    &raquo; <a href="<?php echo base_url('index/article_details/'.$this->uri->segment(3).'/'.$this->uri->segment(4))?>"><?php echo ucfirst($this->uri->segment(4));?></a> 
                     <?php } if($this->uri->segment(5)){?>
                    &raquo; <a href="<?php echo base_url('index/article_details/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5))?>">
					<?php echo ucfirst($this->uri->segment(5));?></a>  <?php }?>
                </div>
            	<div class="notice_bg">
                    <div class="ntic_text_area">
                    	<div class="title1"><?php echo stripslashes($articledetails['headline']);?></div>
                        <div class="main_tex">
                        	<p><?php echo stripslashes($articledetails['details']);?></p>
                        </div>
                        
                    </div>
                </div>
            	
                 <?php echo form_open_multipart('index/contact_email', 'class="form-horizontal form-label-left"');?>
               

                <div class="con_right">
       <!--<div class="con_tfield_area">
        <input type="text" name="name" value="Name" onBlur="if(this.value == ''){ this.value = 'Name'; this.style.color = '#BBB';}" onFocus="if(this.value == 'Name'){ this.value = ''; this.style.color = '#000';}" style="color:#BBB;" class="con_tfield1" />
        </div>
        <div class="con_tfield_area">
        <input type="email" name="email" value="Email" onBlur="if(this.value == ''){ this.value = 'Email'; this.style.color = '#BBB';}" onFocus="if(this.value == 'Email'){ this.value = ''; this.style.color = '#000';}" style="color:#BBB;" class="con_tfield1" />
        </div>
        <div class="con_tfield_area">
        <input type="text" name="phone" value="Phone" onBlur="if(this.value == ''){ this.value = 'Phone'; this.style.color = '#BBB';}" onFocus="if(this.value == 'Phone'){ this.value = ''; this.style.color = '#000';}" style="color:#BBB;" class="con_tfield1" />
        </div>
        <div class="con_tfield_area">
        <textarea onBlur="if(this.value == ''){ this.value = 'Message'; this.style.color = '#BBB';}" onFocus="if(this.value == 'Message'){ this.value = ''; this.style.color = '#000';}" style="color:#BBB; vertical-align:top" class="con_tfield2"  name="message">Message</textarea>
        </div>
        <div class="con_tbtn_area">
        <input type="submit" name="submit" value="Submit" class="myButton" />
          </div>-->
           <?php
                      echo $this->session->flashdata('msg');
                        ?>
       			    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input type="text" name="name" required class="form-control col-md-7 col-xs-12"
                            placeholder='Name' onFocus="this.placeholder=''" onBlur="this.placeholder='Name'">
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Email<span class="required">*</span>
                    </label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="email" required class="form-control col-md-7 col-xs-12" placeholder='Email' onFocus="this.placeholder=''" onBlur="this.placeholder='Email'">
                    </div>
   				 </div>
                    <div class="form-group">
        <label for="middle-name" class="control-label col-md-4 col-sm-4 col-xs-12">phone</label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <input  class="form-control col-md-7 col-xs-12" type="text" name="phone"
            placeholder='phone' onFocus="this.placeholder=''" onBlur="this.placeholder='phone'">
        </div>
    </div>
                    <div class="form-group">
        <label class="control-label col-md-4 col-sm-4 col-xs-12">Message<span class="required">*</span>
        </label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <textarea type="text" name="message" required class="form-control col-md-7 col-xs-12" placeholder='Message' onFocus="this.placeholder=''" onBlur="this.placeholder='Message'"></textarea>
        </div>
    </div>
                    <div class="form-group" style="float:right">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input type="submit" name="registration" class="btn btn-success" style="cursor:pointer" value="Submit">
                        </div>
                    </div>
                    
     <div class="clearfloat"></div> </div>
         <?php echo form_close();?>
       			 <div class="con_left">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116833.62888977412!2d90.41932538778725!3d23.781201632893325!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xd9f57ed518fda684!2sSuvastu+Nazar+Valley+Shopping+Mall!5e0!3m2!1sbn!2sbd!4v1444073366456" width="550" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
               
                </div>
            </div>
            
        </section>
