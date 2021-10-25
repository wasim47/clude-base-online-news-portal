 <link rel="stylesheet" href="<?php echo base_url();?>asset/slider/responsiveslides.css">
  <link rel="stylesheet" href="<?php echo base_url();?>asset/slider/demo.css">
  <script src="<?php echo base_url();?>asset/slider/responsiveslides.min.js"></script>
  <script>
    $(function () {
      // Slideshow 4
      $("#slider4").responsiveSlides({
        auto: true,
        pager: false,
        nav: true,
        speed: 500,
        namespace: "callbacks",
        before: function () {
          $('.events').append("<li>before event fired.</li>");
        },
        after: function () {
          $('.events').append("<li>after event fired.</li>");
        }
      });

    });
  </script> 
  <section class="slider_area">     
<div class="sliderarea">
    <div class="callbacks_container">
      <ul class="rslides" id="slider4">
        <?php
                foreach($banner->result() as $bnr):
                $image_title=$bnr ->banner_name;
                $image=$bnr->image;
                ?>
                <li><img src="<?php echo base_url('asset/uploads/banner/'.$image)?>" alt="<?php echo $image_title;?>" title="<?php echo $image_title;?>" ></li>
                <?php 
                endforeach;
                ?>
        
      </ul>
    </div>
</div>
