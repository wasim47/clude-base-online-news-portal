<?php foreach($rightsideAd->result() as $ad):
	$adTitle=$ad->advertisement_name;
	$image=$ad->image;
?>
<img src="<?php echo base_url('asset/uploads/advertisement/'.$image);?>" class="adImg" />
<?php
endforeach;
?>