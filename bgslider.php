<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/component.css" />
<script src="<?php bloginfo('template_url'); ?>/js/modernizr.custom.js"></script>
<style>
.dummy_image {
position: absolute;
}
</style>

<div class="main_design_page">

<div class="design_left_sec">
<ul class="design_page_ul">

<!--  *****************  Row title *********  --> 
<?php if($row_details[1]->meta_value !=""){ ?>
<li><?php echo $row_details[1]->meta_value; ?></li>
<?php } ?>


<!--  *****************  Row pdf title and link *********  -->
<?php if($row_details[0]->meta_value !=""){ ?>
<li><a href="<?php echo $design_room[1]->guid; ?>" target="_blank" class="rk_pdf_links"><?php echo $row_details[0]->meta_value; ?></a></li>
<?php } ?>


<!--  *****************  Row Description *********  -->
<?php if($row_details[2]->meta_value !=""){ ?>
<li><?php echo $row_details[2]->meta_value; ?></li>
<?php } ?>


</ul>
</div>

<div class="bg_body design_right_sec">


<?php if($design_room[0]->guid !=""){ ?>
<img src="<?php echo  $design_room[0]->guid; ?>" alt="image01" data-description="Raskin" class="dummy_image" />
<?php } else { ?>
<img src="<?php bloginfo('template_url'); ?>/images/room_04.jpg" alt="image01" data-description="Raskin" class="dummy_image" />
<?php } ?>


<ul id="cbp-bislideshow" class="cbp-bislideshow">
<?php				
if(is_array($slider_result) and count($slider_result)>0){
foreach ($slider_result as $slider_val){
if($slider_val->guid !=""){
?>
<li><img class="original_img" src="<?php echo $slider_val->guid;  ?>" alt="" width="1400" height="1050" /></li> 
<?php } } }  else { ?> 
<li><img class="test_1" src="<?php bloginfo('template_url'); ?>/images/111.jpg" alt="" width="1400" height="1050" /> </li>
<li><img class="test_1" src="<?php bloginfo('template_url'); ?>/images/11.jpg" alt="" width="1400" height="1050" /> </li>
<li><img class="test_1" src="<?php bloginfo('template_url'); ?>/images/22.jpg" alt="Coalesse" width="1400" height="1050" /> 
<li><img class="test_1" src="<?php bloginfo('template_url'); ?>/images/33.jpg" alt="" width="1400" height="1050" /> </li>
<?php } ?>
</ul>
<div id="cbp-bicontrols" class="cbp-bicontrols">
<span class="cbp-biprev"></span>
<span class="cbp-bipause"></span>
<span class="cbp-binext"></span>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!-- imagesLoaded jQuery plugin by @desandro : https://github.com/desandro/imagesloaded -->
<script src="<?php bloginfo('template_url'); ?>/js/jquery.imagesloaded.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/cbpBGSlideshow.min.js"></script>
<script>
$(function() {
cbpBGSlideshow.init();
});
</script>
