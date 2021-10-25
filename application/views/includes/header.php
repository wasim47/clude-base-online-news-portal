<?php include('tophead.php');?>
<div id="headerArea">
<div id="headerBottom">
    	<header>
        <div class="col-md-12 col-sm-12 col-xs-12">
        	<div class="col-md-8 col-sm-12 col-xs-12 hdr_left_area">
       	    <a href="<?php echo base_url();?>">
            <img src="<?php echo base_url();?>asset/images/front/logo.png" class="tp_icon" style="float:left" />
            <h2 class="logo_rightCon">Bangladesh Paint Manufacturer's Association</h2>
            </a>
            
            </div>
       
         <div class="col-md-4 col-sm-12 col-xs-12 hdr_right_area">
                <div class="col-md-12 col-sm-12 col-xs-12 srch_area">
                   
                    <div class="srch_icon_area">
                    <span class="srch_field_area">Find Us</span>
                    <a href="#" style="margin-right:3px;"><img src="<?php echo base_url();?>asset/images/front/fb.png" border="0" /></a>
                    <a href="#" style="margin-right:3px;"><img src="<?php echo base_url();?>asset/images/front/tweeter.png" border="0" /></a>
                    <a href="#" style="margin-right:3px;"><img src="<?php echo base_url();?>asset/images/front/in.png" border="0" /></a>
                    <a href="#" style="margin-right:3px;"><img src="<?php echo base_url();?>asset/images/front/you-tube.png" border="0" /></a>
                    </div>
                </div>
                <div class="col-md-11 col-sm-12 col-xs-12 sign_area">
                		 <?php if($this->session->userdata('memberAccessId')){
							echo $this->session->userdata('memberAccessName');
						?>
                        <a href="<?php echo base_url('index/logout');?>">Logout</a>
                        <?php 
						}
						else{
							?>
                        <a href="<?php echo base_url('index/signUp');?>">Online Membership Application</a>
                        <?php 
						}
						?>
                </div>
          </div>
        </div>    
            
            
            
          
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
						$strMenu=$fmenu->page_structure;
						$m_id=$fmenu->m_id;
						$url=base_url('index/'.$strMenu.'/'.$slug);
					?>
					 <li><a href="<?php echo $url;?>"><?php echo $menu_name;?></a>
                        <ul>
                        <?php
							$query_scat=$this->db->query("select * from menu where root_id='".$m_id."' and sroot_id=0 order by m_id asc");
							$row_scatRes=$query_scat->result();
							foreach($row_scatRes as $row_scat){
							$scid_id=$row_scat->m_id;
							$sslug=$row_scat->slug;
							$sub_cat_name=$row_scat->menu_name;
							$strSmenu=$row_scat->page_structure;
							$urls=base_url('index/'.$strSmenu.'/'.$slug.'/'.$sslug);
						?>
                        <li><a href='<?php echo $urls;?>'><span><?php echo $sub_cat_name;?></span></a>
                        
                        	<ul>
                        <?php
							$query_lcat=$this->db->query("select * from menu where sroot_id='".$scid_id."' order by m_id asc");
							$row_lcatRes=$query_lcat->result();
							foreach($row_lcatRes as $row_lcat){
							$lcid_id=$row_lcat->slug;
							$last_cat_name=$row_lcat->menu_name;
							$strLmenu=$row_scat->page_structure;
							$urll=base_url('index/'.$strLmenu.'/'.$slug.'/'.$sslug.'/'.$lcid_id);
						?>
                        <li class='last'><a href='<?php echo $urll;?>'><span><?php echo $last_cat_name;?></span></a></li>
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