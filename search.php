<?php

include("head.php");
?>
<body class="index_01 " data-controller="anchor-links, selectivizr">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/style.css" />
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.tmpl.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/india.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/design.css" />

<?php include('newheader.php'); ?>
	<div class="mobile_top_area">
<!------------------------>
<a href="#after-promotions" style="padding-bottom: 0 !important" class="promotions__skip"><span class="icon-arrow-down"></span></a>
<main id="after-promotions" style="padding-bottom: 0 !important" data-controller="class-on-scroll,go-to-on-scroll" data-class="main-header--startpage--after-promotions" data-target="#main-header" data-prev-scroll-target="#promotion-2" data-disable-scroll-stopper class="after-promotions">
</main>


<div class="es-carousel page_div_main">
<div class="page-content__content-area clearfix">
<div class="page-content">
<div class="page-content__header">
<?php
if ( have_posts() ) :
 while ( have_posts() ) : the_post(); ?><div class="page-content__content__main-content--fixed-width"><div class="content_page main_search"><div class="search_inner_page"><h3 class="search_heading"><a href="<?php the_permalink(); ?>"><?php  the_title(); ?></a></h3>
<?php $post_id = get_the_id();
$content = get_field('short_description',$post_id );
if($content !=""){echo content_limit_rule($content, $wrap=200); ?> 
<a href="<?php the_permalink(); ?>" class="read_more">Read More</a>
<?php }?>
</div></div>
<?php endwhile;
else : ?>
<div class="search_content"> Not found Search Creteria</div>
<?php endif; ?></div></div></div></div></div>
<!-- End Elastislide Carousel Thumbnail Viewer -->


</div></div>
<!-- rg-gallery -->
<div class="" style="clear:both"></div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.tmpl.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/validation.js"></script>

<?php include('newfooter.php'); ?>
</body>
</html>		