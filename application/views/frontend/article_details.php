    <div class="wrapper">
    <div class="bdy_container">
    	
<section class="content_area">

                <!--<div class="nws_bg">
                	<div class="nws1">Latest News :</div>
                </div>-->
        	<div class="ca_left">
            	<div class="adArea"><?php include('upcommingevents.php');?></div>
            	<div class="adArea">
                 <!--  <img src="<?php echo base_url('asset/uploads/advertisement/5.Asian Paints.gif');?>" class="adImg" />
                    <img src="<?php echo base_url('asset/uploads/advertisement/7.RAK-PAINTS.gif');?>" class="adImg" />
                    <img src="<?php echo base_url('asset/uploads/advertisement/6.AQUA-PAINT.gif');?>" class="adImg" />
                    <img src="<?php echo base_url('asset/uploads/advertisement/5.Asian Paints.gif');?>" class="adImg" />-->
               </div>
            </div>
            <div class="ca_middle">
            	<div style="width:96%; border-bottom:1px solid #ccc; background:#f5f5f5; padding:5px; float:left; font-size:12px; color:#333; margin-left:3%;">
                	<a href="<?php echo base_url()?>">Home</a> 
                    &raquo; <a href="<?php echo base_url('index/article_details/'.$this->uri->segment(3))?>"><?php echo ucfirst($this->uri->segment(3));?></a> 
                    <?php if($this->uri->segment(4)){?>
                    &raquo; <a href="<?php echo base_url('index/article_details/'.$this->uri->segment(3).'/'.$this->uri->segment(4))?>"><?php echo ucfirst($this->uri->segment(4));?></a> 
                     <?php } if($this->uri->segment(5)){?>
                    &raquo; <a href="<?php echo base_url('index/article_details/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5))?>">
					<?php echo ucfirst($this->uri->segment(5));?></a>  <?php }?>
                </div>
            	<div class="notice_bg" style="width:100%;">
                    <div class="ntic_text_area" style="width:100%;">
                    	<div class="title1"><?php echo stripslashes($articledetails['headline']);?></div>
                        <div class="main_tex" style="width:100%">
                        	<p><?php echo stripslashes($articledetails['details']);?></p>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="ca_ri8">
            <div class="adArea"><?php include('loginform.php');?></div>
               <div class="adArea">
           	 	 	<!--<img src="<?php echo base_url('asset/uploads/advertisement/1.Berger1.gif');?>" class="adImg" />
               <img src="<?php echo base_url('asset/uploads/advertisement/2.ELITE PAINT.gif');?>" class="adImg" />
                <img src="<?php echo base_url('asset/uploads/advertisement/3.PAILAC.gif');?>" class="adImg" />
                <img src="<?php echo base_url('asset/uploads/advertisement/4.ROXY1.gif');?>" class="adImg" />-->
              </div>	
          </div>
        </section>
