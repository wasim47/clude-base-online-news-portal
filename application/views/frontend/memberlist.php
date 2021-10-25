    <div class="wrapper">
    <div class="bdy_container">
    	
<div class="col-md-12 col-sm-12 col-xs-12 " style="padding:0; margin:0">

        	<div class="col-md-3 col-sm-3 col-xs-12" style="padding:0; margin:0;">
            	<div class="adArea"><?php include('upcommingevents.php');?></div>
            	<div class="adArea">
                    <?php include("leftad.php");?>
               </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12" style="padding:0; margin:0;">
            	<div style="width:99%; border-bottom:1px solid #ccc; background:#f5f5f5; padding:5px; float:left; margin:1%; font-size:12px; color:#333;">
                	<a href="<?php echo base_url()?>">Home</a> 
                    &raquo; <a href="<?php echo base_url('index/article_details/'.$this->uri->segment(3))?>"><?php echo ucfirst($this->uri->segment(3));?></a> 
                    <?php if($this->uri->segment(4)){?>
                    &raquo; <a href="<?php echo base_url('index/article_details/'.$this->uri->segment(3).'/'.$this->uri->segment(4))?>"><?php echo ucfirst($this->uri->segment(4));?></a> 
                     <?php } if($this->uri->segment(5)){?>
                    &raquo; <a href="<?php echo base_url('index/article_details/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5))?>">
					<?php echo ucfirst($this->uri->segment(5));?></a>  <?php }?>
                </div>
                <div style="width:99%; margin-top:10px; float:left">
                    <div style="width:98%; border-bottom:1px dotted #666666; float:left; margin:1% 1% 0 1%;">
                    	<div class="title1" style="width:40%; float:left; margin-left:1%">List of Member's</div>
                        <div class="title1" style="width:40%; float:right">
                        	<?php echo form_open('');?>
                        	<input type="text" name="keyword"  style="padding:3px; border:1px solid #999; width:80%; float:left"/>
                            <input type="submit" name="submit" value="GO" style="float:right; padding:3px; background:#333333; color:#fff; border:none; cursor:pointer" />
                            <?php echo form_close();?>
                        </div>
                   </div>
                    <div style="width:98%; border-bottom:1px dotted #666666; float:left; margin:0 1%;">	
                   	<?php 
						foreach (range('A', 'Z') as $char) {
							echo '<a href="'.base_url('index/member/'.$fullurl).'?searchkey='.$char.'" style="padding:1px; float:left; color:#172C71; text-align:center">'.$char.'&nbsp;<span style="color:#999">|</span> </a>';
						}
					?>
                    </div>
                    </div>
                  <?php 
				   foreach($memberlist->result() as $member):?>
                    <div id="memberArea">
                   		<div class="imageArea">
                        	<img src="<?php echo base_url('asset/uploads/member/logo/'.$member->logo);?>" class="memberImg" />
                        </div>
                        <div class="conArea">
                        	<h3 class="comName"><?php echo $member->company_name;?></h3>
                            <h4 class="comDesc">Phone: <?php echo $member->contact;?></h4>
                            <h4 class="comDesc">Web: <a href="http://<?php echo $member->web;?>" target="_blank"><?php echo $member->web;?></a></h4>
                            <h4 class="comDesc"><a href="<?php echo base_url('index/memberDetails/'.$member->id);?>">For Details &raquo;</a></h4>
                        </div>
                   </div>
                   <?php endforeach;?> 
                    <div id="pagination" class="tsc_pagination">
                          <ul><?php echo "<li>". $pagination."</li>"; ?></ul>
                      </div>
                    </div>
                   
            <div class="col-md-3 col-sm-3 col-xs-12" style="padding:0; margin:0;">
            <div class="adArea"><?php include('loginform.php');?></div>
               <div class="adArea">
           	 	<?php include("rightad.php");?>
              </div>	
          </div>
        </div>
