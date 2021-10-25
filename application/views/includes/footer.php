<footer>
<div style="float:left; width:100%;">
       <div style="width:60%; float:left; margin:20px 0 0 20px;">
       <div class="logo" style="width:100%;"><a href='<?php echo base_url();?>'><img src="<?php echo base_url()?>asset/images/front/logo.png" /></a></div>
       	<h5 style="color:#333333;  padding:0 50px 0 0; margin:0; font-family:Arial, Helvetica, sans-serif; line-height:20px; font-size:14px; font-weight:normal;">
        Bangladesh Paint Manufacturer's Association (BPMA) is a not for profit leading body representing the paint manufacturers & suppliers of Bangladesh.</h5>
     </div>
         
    
    
    <div style="width:22%; float:right; margin:50px 20px 0 20px;">
    <div style="font-family:Arial, Helvetica, sans-serif; font-size:15px; color:#333333; margin-left:80px; text-align:center; text-transform:uppercase">Follow Us</div>
    	<div class="scal_logo_area" style="float:right">
        <div class="scial_box1"><img src="<?php echo base_url()?>asset/images/front/facebook.png" width="30" height="30" /></div>
        <div class="scial_box1"><img src="<?php echo base_url()?>asset/images/front/twitter.png" width="30" height="30" /></div>
        <div class="scial_box1"><img src="<?php echo base_url()?>asset/images/front/google_circle_color.png" width="30" height="30" /></div>
        <div class="scial_box1"><img src="<?php echo base_url()?>asset/images/front/youtube.png" width="30" height="30" /></div>
        </div>
    </div>
    
 </div>
 <div style="width:100%; float:left" class="footerTopMenu">
    	<ul style="text-align:center">
        <?php foreach($menu->result() as $fmenu){
			$menu_name=$fmenu->menu_name;
			$slug=$fmenu->slug;
		?>
        	<li><a href="<?php echo base_url('index/article_details/'.$slug);?>"><?php echo $menu_name;?>&nbsp;&nbsp;&nbsp;|</a></li>
        <?php
        }
		?>
        </ul>
    </div>
<div class="footerBottom">
<div class="footerBottomCopyright">Copyright BPMA &copy; 2015. All Rights Reserved.<br />
Design Developed & Maintained by&nbsp;<a href="http://onair.com.bd/" target="_blank" style="color:#333333; font-weight:bold">onAir International Ltd.</a>
</div>
<div class="footerBottomSocial">Bangladesh  Paint Manufacturer&rsquo;s Association</div>
</div>
</footer>
</body>
</html>
