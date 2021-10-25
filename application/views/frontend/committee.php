    <div class="wrapper">
    <div class="bdy_container">
    	
<section class="content_area">

                <!--<div class="nws_bg">
                	<div class="nws1">Latest News :</div>
                </div>-->
        	<div class="ca_left">
            	<div class="adArea"><?php include('upcommingevents.php');?></div>
            	<div class="adArea">
                    <!--<img src="<?php echo base_url('asset/uploads/advertisement/ad8.gif');?>" class="adImg" />
                    <img src="<?php echo base_url('asset/uploads/advertisement/ad9.gif');?>" class="adImg" />
                    <img src="<?php echo base_url('asset/uploads/advertisement/ad10.gif');?>" class="adImg" />
                    <img src="<?php echo base_url('asset/uploads/advertisement/ad11.gif');?>" class="adImg" />-->
               </div>
            </div>
            <div class="ca_middle">
            	<div class="title1">Photo Gallery</div>
            	
					<?php
					$count=0;
                    foreach($committee->result() as $comm):
                    $ecmember_name=$comm->ecmember_name;
					$designation=$comm->designation;
					$image=$comm->image;
					$i=$comm->display;
					if($count==3){
							print "</div>";
							$count=0;
						}
					
					if($count==0){
						print "<div class='pictureGallery' style='margin:0'>";
					}
					if($image!=""){
                    ?>
                	<div class="pictureCols"><img src="<?php echo base_url('asset/uploads/ecmember/'.$image);?>" class="galleryImg"/>
                    <div class="galleryTitle"><?php echo $ecmember_name;?></div>
                     <div class="galleryTitle"><?php echo $designation;?></div>
                    </div>
				   <?php 
				   }
				   $count++;
                    endforeach;
					if($count>0)
            	   print "</div>";
                    ?>     
            </div>
            <div class="ca_ri8">
            <div class="adArea"><?php include('loginform.php');?></div>
               <div class="adArea">
           	 	<!--<img src="<?php echo base_url('asset/uploads/advertisement/ad8.gif');?>" class="adImg" />
                <img src="<?php echo base_url('asset/uploads/advertisement/ad9.gif');?>" class="adImg" />
                <img src="<?php echo base_url('asset/uploads/advertisement/ad10.gif');?>" class="adImg" />
                <img src="<?php echo base_url('asset/uploads/advertisement/ad11.gif');?>" class="adImg" />-->
              </div>	
          </div>
        </section>
