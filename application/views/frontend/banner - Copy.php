<section class="slider_area">
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
        <?php
                foreach($banner->result() as $bnr):
                $image_title=$bnr ->banner_name;
                $image=$bnr->image;
                ?>
                <li><img src="<?php echo base_url('asset/uploads/banner/'.$image)?>" alt="<?php echo $image_title;?>" title="<?php echo $image_title;?>" ></li>
                <?php 
                endforeach;
                ?>
	</ul></div>
	</div>	
	<script type="text/javascript" src="<?php echo base_url();?>asset/slider/engine1/wowslider.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/slider/engine1/script.js"></script>
        </section>