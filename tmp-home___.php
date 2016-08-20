<?php
	/*
		template name:Home Page
	*/
	//include("commonFunctions.php");

	include("head.php");
	
?>
<style>

.main-header__top-links > ul {
  margin-top: 0 !important;
}
</style>
<body class="panel-bg" data-controller="anchor-links, selectivizr">
<h1  style="float: left; z-index: 2147483647;position:relative;margin-bottom:0px;position:absolute;width: 100px;" class="logo_header desktop-2 pull-left">
	<!--<a href="<?php echo home_url(); ?>" class="">
		<img src="<?php bloginfo('template_url'); ?>/images/raskin_logo_halfsize.jpg">
	</a>-->
	
	</h1>

	<?php include('newheader.php'); ?>
	<section class="promotions" <!-- testtesttesttmphome___ -->>
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
													
										  <li><a><span class="main-header__panel__items__hover-effect">Residential</span></a></li>
											<li><a><span class="main-header__panel__items__hover-effect">Commercial</span></a></li>
											<li><a><span class="main-header__panel__items__hover-effect">ABOUT US</span></a></li>
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
										foreach($slider_data as $slider_data_val1){
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
									<div class="home_description"> <?php print_r($slider_data_val['home_slider_description']);  ?>
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
			<a href="#after-promotions" class="promotions__skip"><span class="icon-arrow-down"></span></a>
		</section>
		<main id="after-promotions" data-controller="class-on-scroll,go-to-on-scroll" data-class="main-header--startpage--after-promotions" data-target="#main-header" data-prev-scroll-target="#promotion-2" data-disable-scroll-stopper class="after-promotions">
			<div class="row baseline-offset--12">
				<div class="columns text-center">
					<a href="<?php echo get_permalink(10); ?>" class="button button--vert-borders">See All Floors</a>
				</div>
			</div>
		</main>
		
		<?php include('newfooter.php'); ?>
	</body>
</html>