<?php
	$inner_page =  $_SERVER['REQUEST_URI']."?paged=view";

	include("head.php");
	?>
	<body class="index_01 " data-controller="anchor-links, selectivizr">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/style.css" />
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.tmpl.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/elastislide.css" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/india.css" />
	
<style>


.back_button
{
background: #a5a5a5 none repeat scroll 0 0;
border: medium none;
color: #fff;
float: left;
z-index:999;
}
.es-carousel ul{
display:block;
}
#after-promotions {
padding-bottom: 0 !important;
}
.main-header__top-links ul {
margin-top: 4%;
}
</style>
	
	<script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">	
	<div class="rg-image-wrapper">
	{{if itemsCount > 1}}
	<div class="rg-image-nav">
	<a href="#" class="rg-image-nav-prev">Previous Image</a>
	<a href="#" class="rg-image-nav-next">Next Image</a>
	</div>
	{{/if}}
	<div class="rg-image"></div>
	<div class="rg-loading"></div>
	<div class="rg-caption-wrapper">
	<div class="rg-caption" style="display:none;">
	<p></p>
	</div>
	</div>
	</div>
	</script>
	
	<?php include('newheader.php'); ?>
	<div class="mobile_top_area testtesttestsingle">
	<?php include('mobile-post-menu.php'); ?>
	

	
	<?php 
	$auto = 0;
	while ( have_posts() ) : the_post();
	$slider_data = get_field('home_page_slider');
	//echo "<pre>";print_r($slider_data);echo "</pre>";
	if(is_array($slider_data) and count($slider_data)>0){
	foreach($slider_data as $slider_data_val){
	?>
	<!------------------------>
	<article id="promotion-<?php echo $auto; ?>" style="background-image:url(<?php echo  $slider_data_val['home_slider_background_image']['url']; ?>)" data-controller="promotion,go-to-on-scroll" data-scroll-target="#promotion-2" data-prev-scroll-target=""
	class="promotions__promotion  promotions__promotion--dark-bg">
	<div class="promotions__promotion__fixed">
	<div class="promotions__promotion__fixed__content">
	<div class="main-header main-header--in-promotion ">
	<div class="main-header__container" style="overflow-y:inherit;">
	<div class="main-header__panel">
	<div class="row">
	<div class="desktop-4 columns">
	<a class="main-header__panel__mobile"><span class="icon-menu"></span></a>
	<div class="main-header__panel__logo"><a href="../start.1"><span class="icon-logo"></span></a></div>
	</div>
	<div class="desktop-8 columns">
	<a o-controller="request-sample-count" o-count-hidden-class="main-header__panel__cart--hidden" class="icon-cart right main-header__panel__cart main-header__panel__cart--hidden"><sup data-count class="main-header__panel__cart__items">0</sup></a>
	<ul class="main-header__panel__items category_menu" style="">
	<?php 
	global $wpdb;
	$sql = "select * from wp_terms as wt inner join wp_term_taxonomy as wtt on wt.term_id=wtt.term_id where wtt.taxonomy='category' and wt.term_id !='1'  ";
	$cat_data_all = $wpdb->get_results($sql);
	foreach($cat_data_all as $cat_data)   { ?>
	<li><a><span class="main-header__panel__items__hover-effect"><?php echo $cat_data->name; ?></span></a></li>	
	<?php } ?>
	</ul>
	</div>
	</div>
	</div>
	</div>
	</div>
	<div class="header_logo_img" style="margin:50px;"><img src="<?php echo  $slider_data_val['home_slider_logo']['url']; ?>"></div>
	<div class="promotions__current promotions__current--light">
	<div class="promotions__current__list">
	<?php 
	$auto_increement = 0;
	foreach($slider_data as $slider_data_val){
	if($auto_increement == 0){
	$class = "promotions__current__list__item--current";
	}
	?>
	<a href="#promotion-<?php echo $auto_increement; ?>" class="promotions__current__list__item <?php echo $class; ?>"><span></span></a>
	<?php
	$auto_increement++;
	}  ?>
	</div>
	</div>
	</div>
	</div>
	<div class="promotions__promotion__content ocean-within__centered">
	<div class="row promotions__promotion__content__bottom promotions__promotion__content__bottom--ocean-within ocean-within__centered__content">
	<div class="large-5 medium-10 small-centered columns text-center">
	<div class="row">
	<div class="home_description"><?php echo  $slider_data_val['home_slider_description']; ?>
	</div>
	</div>
	</div>
	</div>
	</article>
	<?php
	$auto++;
	} }
	endwhile; 
	?>
	<!------------------------>
	<!-- <a href="#after-promotions" style="padding-bottom: 0 !important" class="promotions__skip"><span class="icon-arrow-down"></span></a> -->
	<main id="after-promotions" style="padding-bottom: 0 !important" data-controller="class-on-scroll,go-to-on-scroll" data-class="main-header--startpage--after-promotions" data-target="#main-header" data-prev-scroll-target="#promotion-2" data-disable-scroll-stopper class="after-promotions">
	</main>
	<div id="rg-gallery" class="rg-gallery front_page">
	<div class="rg-thumbs">
	<!-- Elastislide Carousel Thumbnail Viewer -->
	<div class="es-carousel-wrapper">
	<div class="es-nav">
	<span class="es-nav-prev">Previous</span>
	<span class="es-nav-next">Next</span>
	</div>
	<!-- ******************** front page contnt Display *************** -->	
	<div class="es-carousel">
	<ul>
	<?php 
	$auto = 0;
	while ( have_posts() ) : the_post();
	$slider_data = get_field('slider_product');
	//echo "<pre>";print_r($slider_data);echo "</pre>";
	if(is_array($slider_data) and count($slider_data)>0){
	foreach($slider_data as $slider_data_val){
	?>
	<li>
	<div class="text_image">
	<h1>
	<?php if($slider_data_val['large_image']['url'] !=""){ ?>
	<a target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/raskin_logo_halfsize.jpg" data-large="<?php echo $slider_data_val['large_image']['url'];  ?>" alt="image01" data-description="Raskin" /></a>
	<br>
	<?php } ?>
	<?php if($slider_data_val['product_title'] !=""){ ?>
	<a class="heading_is" target="_blank"><FONT COLOR="#0000"><?php echo $slider_data_val['product_title']; ?></FONT></a>
	<br>
	<?php } ?>
	<?php if($slider_data_val['pdf_upload']['url'] !="" and $slider_data_val['pdf_title'] !=""){ ?>
	<a href="<?php echo $slider_data_val['pdf_upload']['url'];  ?>" target="_blank"><?php echo $slider_data_val['pdf_title']; ?></a>
	<br>
<!-- 		<a href="<?php echo get_site_url(); ?>/design-a-room?id=<?php echo get_the_id(); ?>&view=<?php echo $auto;  ?>" class="design_page">Design A Room</a> -->	
	
	
	<br><br>		

<!-- 
	<?php
	if($slider_data_val['slider_description'] !=""){
	echo '<p class="order_sample order_sample_new" onClick="open_sampleform()">'.$slider_data_val['slider_description'].'</p>';
	}
	?>
 -->
<!-- 	<a href="<?php echo get_site_url(); ?>/sample-supplies/?id=10"  class="rk_order_sample">Order Sample</a> -->
	<?php } ?>
	<?php if($slider_data_val['product_price'] !=""){ ?>
	<form action="<?php echo get_option('talent_payment_link'); ?>" target="_blank" enctype="multipart/form-data" method="post" id="registration" name="registration" class="registration_frm">
	<input type="hidden" name="cmd" value="_xclick">
	<input type="hidden" name="business" value="<?php echo get_option('talent_payment_email'); ?>">
	<input type="hidden" name="undefined_quantity" value="1">
	<input type="hidden" name="item_name" value="Raskin Product">
	<input type="hidden" name="item_number" value="dd01">
	<input type="hidden" name="amount" value="<?php echo $slider_data_val['product_price']; ?>" class="amount_number">
	<input type="hidden" name="custom" value="" id="custom_value">
	<input type="hidden" name="notify_url" value="http://progressivewavedesigns.com/raskinnew/success.php">
	<input type="hidden" name="return" value="http://progressivewavedesigns.com/raskinnew/success-page/">
	<input type="hidden" name="cancel_return" value="http://progressivewavedesigns.com/raskinnew/success-page/">
	<input type="image" name="submit" border="0"
	src="https://www.paypalobjects.com/en_US/i/btn/btn_viewcart_LG.gif"
	alt="PayPal - The safer, easier way to pay online">
	</form>
	<?php } ?>
	</h1>
	</div>
	<a href="#"><img src="<?php echo $slider_data_val['product_image']['url'];  ?>" data-large="<?php echo $slider_data_val['product_image']['url'];  ?>" alt="image01" data-description="Raskin" /></a>
	</li>
	<?php 
	$auto++;
	} } ?>
	<?php endwhile; ?>
	</ul>
	</div>
	</div>
	<!-- End Elastislide Carousel Thumbnail Viewer -->
	</div><!-- rg-thumbs -->
	</div>
	</div>
	</div>
	<!-- ******************** end front page contnt Display *************** -->	
	
	
	<!-- rg-gallery -->
	<div class="" style="clear:both"></div>
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.tmpl.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.elastislide.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/gallery.js"></script>
	
	<script>
	
	function open_sampleform(){
	$(".sample_order span").trigger('click');
	}
	</script>
	<?php include('newfooter.php'); ?>
	</body>
</html>					