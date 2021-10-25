<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>asset/lbox/jquery.lightbox-0.5.css">
<script type="text/javascript" src="<?php echo base_url();?>asset/lbox/jquery.lightbox-0.5.min.js"></script>
    <div class="wrapper">
    <div class="bdy_container">
    	
<section class="content_area">

                <!--<div class="nws_bg">
                	<div class="nws1">Latest News :</div>
                </div>-->
        	<div class="ca_left">
            	<div class="adArea"><?php include('upcommingevents.php');?></div>
            	<div class="adArea">
               		<img src="<?php echo base_url('asset/uploads/advertisement/ad13.gif');?>" class="adImgFull" />
                    <img src="<?php echo base_url('asset/uploads/advertisement/ad8.gif');?>" class="adImg" />
                    <img src="<?php echo base_url('asset/uploads/advertisement/ad9.gif');?>" class="adImg" />
                    <img src="<?php echo base_url('asset/uploads/advertisement/ad10.gif');?>" class="adImg" />
                    <img src="<?php echo base_url('asset/uploads/advertisement/ad11.gif');?>" class="adImg" />
               </div>
            </div>
            <div class="ca_middle">
            	<div class="title1">Photo Gallery</div>
            	<div class="pictureGallery">
					<?php
                    foreach($photogallery->result() as $gallery):
                    $photogallery_name=$gallery->photogallery_name;
					$image=$gallery->image;
					if($image!=""){
                    ?>
                    <div id="thumbnails" style="z-index:100000000">
       					 <ul class="clearfix">
                         <li style="display:block"><a href="<?php echo base_url('asset/uploads/photogallery/'.$image);?>" 
                         title="<?php echo $photogallery_name; ?>">
						<div class="pictureCols"><img src="<?php echo base_url('asset/uploads/photogallery/'.$image);?>" class="galleryImg"/>
                    	<div class="galleryTitle"><?php echo $photogallery_name;?></div></div>
                        </a></li>
                        </ul>
                        </div>
                        
                	
				   <?php 
				   }
                    endforeach;
                    ?>     
                   
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
<script type="text/javascript">
$(function() {
    $('#thumbnails a').lightBox();
});
</script>