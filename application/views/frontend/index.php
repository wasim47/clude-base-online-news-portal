    <div class="wrapper">
    <div class="bdy_container">
<section class="content_area">
        	<div class="ca_left">
            	<div class="adArea"><?php include('upcommingevents.php');?></div>
            	<div class="adArea">
                	<?php include("leftad.php");?>
               </div>
            </div>
            <div class="ca_middle">
            <div class="adArea"><?php include('banner.php');?> </div>
            	<div class="notice_bg">
                
                    <div class="ntic_text_area">
                    	<div class="title1"><?php echo stripslashes($articledetails['headline']);?></div>
                        <div class="main_tex">
                        	<?php echo stripslashes($articledetails['details']);?>
                        </div>
                        
                    </div>
                </div>
                <div class="adArea"><?php include('tab.php');?></div>
            </div>
            <div class="ca_ri8">
            <div class="adArea"><?php include('loginform.php');?></div>
               <div class="adArea">
           	 	<?php include("rightad.php");?>
              </div>	
          </div>
        </section>
