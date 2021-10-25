    <div class="wrapper">
    <div class="bdy_container">
    	
<section class="content_area">

                <!--<div class="nws_bg">
                	<div class="nws1">Latest News :</div>
                </div>-->
        	<div class="ca_left">
            	<div class="adArea"><?php include('upcommingevents.php');?></div>
            	<div class="adArea">
                    <?php include("leftad.php");?>
               </div>
            </div>
            
            <div class="ca_middle">
            	<div class="notice_bg">
                    <div style="width:100%; float:left;margin-right:20px;"> 
                 <h2 style="font-family:Arial, Helvetica, sans-serif; font-size:18px; font-weight:normal; margin-bottom:10px; padding:10px;  border-bottom:1px solid #CCC;">Details For <strong><?php echo $userProfile['company_name'];?></strong></h2>
                 <div class="col-md-12 col-sm-12 col-xs-12">
                   <div class="form-group col-md-12 col-sm-12 col-xs-12" style="padding:2px; margin:0">
                   		<label class="control-label col-md-4 col-sm-4 col-xs-12" style="padding:0; margin:0">Company Name :</label>
                        <div class="col-md-8 col-sm-8 col-xs-12" style="color:#333; font-size:15px;">
						<?php echo $userProfile['company_name'];?></div>
                   </div>
                   
                   
                   <div class="form-group col-md-12 col-sm-12 col-xs-12" style="padding:2px; margin:0">
                   		<label class="control-label col-md-4 col-sm-4 col-xs-12" style="padding:0; margin:0">Company Logo :</label>
                        <div class="col-md-8 col-sm-8 col-xs-12" style="color:#333; font-size:15px; ">
						<img src="<?php echo base_url('asset/uploads/member/logo/'.$userProfile['logo']);?>" style="width:60%; height:auto" /></div>
                   </div>
                   <div class="form-group col-md-12 col-sm-12 col-xs-12" style="padding:2px; margin:0">
                   		<label class="control-label col-md-4 col-sm-4 col-xs-12" style="padding:0; margin:0">Head Organization :</label>
                        <div class="col-md-8 col-sm-8 col-xs-12" style="color:#333; font-size:15px; ">
						<?php echo $userProfile['head_organization'];?></div>
                   </div>
                   <div class="form-group col-md-12 col-sm-12 col-xs-12" style="padding:2px; margin:0">
                   		<label class="control-label col-md-4 col-sm-4 col-xs-12" style="padding:0; margin:0">Contact Person :</label>
                        <div class="col-md-7 col-sm-7 col-xs-12" style="color:#333; font-size:15px; ">
						<?php echo $userProfile['contact_person'];?></div>
                   </div>
                   <div class="form-group col-md-12 col-sm-12 col-xs-12" style="padding:2px; margin:0">
                   		<label class="control-label col-md-4 col-sm-4 col-xs-12" style="padding:0; margin:0">Position :</label>
                        <div class="col-md-7 col-sm-7 col-xs-12" style="color:#333; font-size:15px; ">
						<?php echo $userProfile['position'];?></div>
                   </div>
                   <div class="form-group col-md-12 col-sm-12 col-xs-12" style="padding:2px; margin:0">
                   		<label class="control-label col-md-4 col-sm-4 col-xs-12" style="padding:0; margin:0">Email :</label>
					<div class="col-md-7 col-sm-7 col-xs-12" style="color:#333; font-size:15px; "><?php echo $userProfile['email'];?></div>
                   </div>
                   
                   <div class="form-group col-md-12 col-sm-12 col-xs-12" style="padding:2px; margin:0">
                   		<label class="control-label col-md-4 col-sm-4 col-xs-12" style="padding:0; margin:0">Contact :</label>
                        <div class="col-md-7 col-sm-7 col-xs-12" style="color:#333; font-size:15px; ">
						<?php echo $userProfile['contact'];?></div>
                   </div>
                   <div class="form-group col-md-12 col-sm-12 col-xs-12" style="padding:2px; margin:0">
                   		<label class="control-label col-md-4 col-sm-4 col-xs-12" style="padding:0; margin:0">web :</label>
                        <div class="col-md-7 col-sm-7 col-xs-12" style="color:#333; font-size:15px; ">
						<?php echo $userProfile['web'];?></div>
                   </div>
                   <div class="form-group col-md-12 col-sm-12 col-xs-12" style="padding:2px; margin:0">
                   		<label class="control-label col-md-4 col-sm-4 col-xs-12" style="padding:0; margin:0">fax :</label>
                        <div class="col-md-7 col-sm-7 col-xs-12" style="color:#333; font-size:15px; ">
						<?php echo $userProfile['fax'];?></div>
                   </div>
                   
                   <div class="form-group col-md-12 col-sm-12 col-xs-12" style="padding:2px; margin:0">
                   		<label class="control-label col-md-4 col-sm-4 col-xs-12" style="padding:0; margin:0">Address :</label>
                        <div class="col-md-7 col-sm-7 col-xs-12" style="color:#333; font-size:15px; ">
						<?php echo $userProfile['address'];?></div>
                   </div>
                   <div class="form-group col-md-12 col-sm-12 col-xs-12" style="padding:2px; margin:0">
                   		<label class="control-label col-md-4 col-sm-4 col-xs-12" style="padding:0; margin:0">Year of Inception :</label>
                        <div class="col-md-7 col-sm-7 col-xs-12" style="color:#333; font-size:15px; ">
						<?php echo $userProfile['year_of_inception'];?></div>
                   </div>
                   <div class="form-group col-md-12 col-sm-12 col-xs-12" style="padding:2px; margin:0">
                   		<label class="control-label col-md-4 col-sm-4 col-xs-12" style="padding:0; margin:0">Others Information :</label>
                        <div class="col-md-7 col-sm-7 col-xs-12" style="color:#333; font-size:15px; ">
						<?php echo $userProfile['others_information'];?></div>
                   </div>
                    <!--<div class="form-group col-md-12 col-sm-12 col-xs-12" style="padding:2px; margin:0">
                   		<input type="submit" name="updateProfile" value="Submit" class="btn btn-primary"/>
                   </div>-->

                </div>
   					 </div>
                </div>
            </div>
            <div class="ca_ri8">
            <div class="adArea"><?php include('loginform.php');?></div>
               <div class="adArea">
           	<?php include("rightad.php");?>
              </div>	
          </div>
        </section>
