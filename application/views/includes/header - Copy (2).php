<?php include('tophead.php');?>
<div id="headerArea">
<div id="headerBottom">
    	<header>
        	<div class="hdr_left_area">
       	    <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>asset/images/front/logo.png" class="tp_icon" style="float:left" /></a>
            </div>
            
            <div class="hdr_right_area">
                <div class="sign_area">
                        <a href="#">Member Login</a> |  <a href="#">Join the Assocition</a>
                </div>
                <div class="srch_area">
                    <div class="srch_field_area">Find Us</div>
                    <div class="srch_icon_area">
                    <a href="#" style="margin-right:3px;"><img src="<?php echo base_url();?>asset/images/front/fb.png" border="0" /></a>
                    <a href="#" style="margin-right:3px;"><img src="<?php echo base_url();?>asset/images/front/tweeter.png" border="0" /></a>
                    <a href="#" style="margin-right:3px;"><img src="<?php echo base_url();?>asset/images/front/in.png" border="0" /></a>
                    <a href="#" style="margin-right:3px;"><img src="<?php echo base_url();?>asset/images/front/you-tube.png" border="0" /></a>
                    </div>
                </div>
                <div class="clear"></div>
          </div>
            	<div class="clear"></div>
        </header>
      </div>
        <navigation class="nav_area">
        	<div id="menuBottom">
        		<div id='cssmenu'>
                <ul>
                <li class='active'><a href="<?php echo base_url();?>"><span>Home</span></a></li>
                 <?php foreach($menu->result() as $fmenu){
						$menu_name=$fmenu->menu_name;
						$slug=$fmenu->slug;
						$m_id=$fmenu->m_id;
						$query_scat=$this->db->query("select * from menu where root_id='".$m_id."' order by m_id asc");
						if($query_scat->num_rows() > 0) $class='has-sub';
						else $class='';
					?>
					 <li class='<?php echo $class; ?>'><a href="<?php echo base_url('index/article_details/'.$slug);?>"><?php echo $menu_name;?></a>
                        <ul>
                        <?php
							$query_scat=$this->db->query("select * from menu where root_id='".$m_id."' order by m_id asc");
							$row_scatRes=$query_scat->result();
							foreach($row_scatRes as $row_scat){
							$scid_id=$row_scat->m_id;
							$sslug=$row_scat->slug;
							$sub_cat_name=$row_scat->menu_name;
						?>
                        <li class='has-sub'><a href='<?php echo base_url('index/article_details/'.$sslug);?>'><span><?php echo $sub_cat_name;?></span></a>
                        
                        	<ul>
                        <?php
							$query_lcat=$this->db->query("select * from menu where sroot_id='".$scid_id."' order by m_id asc");
							$row_lcatRes=$query_lcat->result();
							foreach($row_lcatRes as $row_lcat){
							$lcid_id=$row_lcat->slug;
							$last_cat_name=$row_lcat->menu_name;
						?>
                        <li class='last'><a href='<?php echo base_url('index/article_details/'.$lcid_id);?>'><span><?php echo $last_cat_name;?></span></a></li>
                        <?php
						}
						?>
                        </ul>
                        
                        </li>
                        <?php
						}
						?>
                        </ul>
                     </li>
					<?php
					}
					?>
                   </li>
                </ul>
                </div>
			</div>
        </navigation>

</div>