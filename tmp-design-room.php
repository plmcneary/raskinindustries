<?php
	global $wpdb;
	$table_post = $wpdb->prefix . "posts";
	$table_post_meta = $wpdb->prefix . "postmeta";
	$post_id            = $_GET['id'];
	$design_img_id      = $_GET['view'];
	$design_img_field   = "slider_product_".$design_img_id."_design_image";
	$slide_1   = "slider_product_".$design_img_id."_design_background_1";
	$slide_2   = "slider_product_".$design_img_id."_design_background_2";
	$slide_3   = "slider_product_".$design_img_id."_design_background_3";
	$slide_4   = "slider_product_".$design_img_id."_design_background_4";
	$slide_5   = "slider_product_".$design_img_id."_design_background_5";
	$slide_6   = "slider_product_".$design_img_id."_design_background_6";
	$slide_7   = "slider_product_".$design_img_id."_design_background_7";
	$slide_8   = "slider_product_".$design_img_id."_design_background_8";
	$slide_9   = "slider_product_".$design_img_id."_design_background_9";
	$slide_10   = "slider_product_".$design_img_id."_design_background_10";

$field_title      = "slider_product_".$design_img_id."_product_title";
$field_desc       = "slider_product_".$design_img_id."_slider_description";
$field_pdf        = "slider_product_".$design_img_id."_pdf_title";
$field_pdf_upload = "slider_product_".$design_img_id."_pdf_upload";



$row_details    =  get_post_row($post_id,$field_title,$field_desc,$field_pdf); // get row title,desc, and pdf link
$design_room    =  get_post_row_uploads($post_id,$design_img_field,$field_pdf_upload); // get upload rows
$all_slides  =  get_post_row_background($post_id,$slide_1,$slide_2,$slide_3,$slide_4,$slide_5,$slide_6,$slide_7,$slide_8,$slide_9,$slide_10); // get upload backgroun image rows



	 $bg_image = '../images/room_04.jpg' ; 
	if($design_room[0]->guid !=""){
           $bg_image = $design_room[0]->guid ;

         }

	include("head.php");
?>
<body class="index_01 design_a_room" data-controller="anchor-links, selectivizr">
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


<!------------------------>
	<div class="mobile_top_area">

	<?php include('mobile-post-menu.php'); ?>

<a href="#after-promotions" style="padding-bottom: 0 !important" class="promotions__skip"><span class="icon-arrow-down"></span></a>
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

						if(is_array($all_slides) and count($all_slides)>0){
							foreach($all_slides as $slider_result){
							?>
							<li>
								<div class="text_image">
									<h1>
							<?php if($slider_result->guid !=""){ ?>
								<a target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/raskin_logo_halfsize.jpg" data-large="<?php echo $slider_result->guid;  ?>" alt="image01" data-description="Raskin" /></a>
								<br>
							<?php } ?>



					<!--  *****************  Row title *********  -->
					<?php if($row_details[1]->meta_value !=""){ ?>
					<a class="heading_is" target="_blank"><FONT COLOR="#0000"><?php echo $row_details[1]->meta_value; ?></FONT></a>
					<br>
					<?php } ?>

					<!--  *****************  Row pdf title and link *********  -->
					<?php if($row_details[0]->meta_value !=""){ ?>
					<a href="<?php echo $design_room[1]->guid; ?>" target="_blank" class="rk_pdf_links"><?php echo $row_details[0]->meta_value; ?></a>
					<br>
					<?php } ?>

					<!--  *****************  Row Description *********  -->
					<?php if($row_details[2]->meta_value !=""){ ?>
					<?php $slide_desc =  $row_details[2]->meta_value;
                    echo '<p class="order_sample order_sample_new" onClick="open_sampleform()">'.$slide_desc.'</p>';
					?>
					<a href="<?php echo get_site_url(); ?>/sample-supplies/?id=10"  class="rk_order_sample">Order Sample</a>

					<?php } ?>






									</h1>
								</div>
								<a href="#"><img src="<?php echo $slider_result->guid;  ?>" data-large="<?php echo $slider_result->guid;  ?>" alt="image01" data-description="Raskin" /></a>
							</li>
							<?php
								$auto++;
							} } ?>

				</ul>
			</div>
		</div>
		<!-- End Elastislide Carousel Thumbnail Viewer -->
	</div><!-- rg-thumbs -->
</div>
<!-- ******************** end front page contnt Display *************** -->
</div>

<!-- rg-gallery -->
<div class="" style="clear:both"></div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.tmpl.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.elastislide.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/gallery.js"></script>
<script>

	var slider_path =  '<?php echo $bg_image; ?>' ;


</script>



<script>

	function open_sampleform(){
		$(".sample_order span").trigger('click');
	}
</script>
<?php include('newfooter.php'); ?>
</body>
</html>
