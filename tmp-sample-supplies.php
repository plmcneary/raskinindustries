<?php
/*
template name:Sample Supplies
*/

include("head.php");

?>
<body class="index_01 " data-controller="anchor-links, selectivizr">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/style.css" />
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.tmpl.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/elastislide.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/india.css" />

<?php include('newheader.php'); ?>
	<div class="mobile_top_area">
<!------------------------>
<a href="#after-promotions" style="padding-bottom: 0 !important" class="promotions__skip"><span class="icon-arrow-down"></span></a>
<main id="after-promotions" style="padding-bottom: 0 !important" data-controller="class-on-scroll,go-to-on-scroll" data-class="main-header--startpage--after-promotions" data-target="#main-header" data-prev-scroll-target="#promotion-2" data-disable-scroll-stopper class="after-promotions">
</main>



<div id="rg-gallery" class="rg-gallery front_page">
<div class="rg-thumbs">
<!-- Elastislide Carousel Thumbnail Viewer -->
<div class="es-carousel-wrapper mobile_main_contact">

<!-- ******************** front page contnt Display *************** -->	

<div class="page_content_main clearfix">

<div class="page-content__header mobile_contact_form">

<div class="page-content__content__main-content--fixed-width">


<form class="mobile_contact mobile_contact_sample" name="contact_form" method="post">
<div class="contact_div one_block"><h2 class="page-content__heading mobile_form_head"><?php echo get_the_title($_GET['id']); ?></h2>
</div>


<div class="contact_div one_block">
<label>Name</label>
<span><input class="contact_mob" type="text" required="" id="first_name" name="first_name" required></span>
</div>
<div class="contact_div one_block">
<label>Email</label>
<span>
<input class="contact_mob" type="email" required="" id="email" name="email" required>
<input type="hidden" id="post_title" name="post_title" value="<?php echo get_the_title($_GET['id']); ?>">
</span>
</div>
<div class="contact_div one_block">
<label>Message</label>
<span><textarea class="contact_mob" required="" name="message" id="message" required></textarea></span>
</div>



<div class="contact_div one_block">
<ul class="list-mobile-prdct">
<?php 

$post_id = $_GET['id'];



$slider_data = get_field('slider_product',$post_id);
//echo "<pre>";print_r($slider_data);echo "</pre>";
if(is_array($slider_data) and count($slider_data)>0){
foreach($slider_data as $slider_data_val){
?>
<?php if($slider_data_val['product_image']['url'] !=""){ ?>
<li>

<p class="modile_product_title"><?php echo $slider_data_val['product_title']; ?></p>
<img src="<?php echo $slider_data_val['product_image']['url'];  ?>" data-large="<?php echo $slider_data_val['product_image']['url'];  ?>" alt="image01" data-description="Raskin" />

<label><input type="checkbox" name="product[]" value="<?php echo $slider_data_val['product_title']; ?>" class="product_checkbox"></label>

</li>
<?php } } } ?>

</ul>
</div>





<div class="contact_div one_block">
<label></label>
<span><button type="submit" name="send_email" id="send_email">Submit</button></span>
</div>

</form>
						



</div>
</div>
</div>


<!-- End Elastislide Carousel Thumbnail Viewer -->
</div><!-- rg-thumbs -->
</div>
</div>
</div>
<!-- rg-gallery -->
<div class="" style="clear:both"></div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.tmpl.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/validation.js"></script>

<?php include('newfooter.php'); ?>
</body>
</html>		