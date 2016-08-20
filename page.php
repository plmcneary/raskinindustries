<?php

include("head.php");
?>
<body class="index_01 " data-controller="anchor-links, selectivizr">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/style.css" />
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.tmpl.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/elastislide.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/india.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/design.css" />


<?php include('newheader.php'); ?>
<div class="mobile_top_area testtesttestpage">
<!------------------------>
<a href="#after-promotions" style="padding-bottom: 0 !important" class="promotions__skip"><span class="icon-arrow-down"></span></a>
<main id="after-promotions" style="padding-bottom: 0 !important" data-controller="class-on-scroll,go-to-on-scroll" data-class="main-header--startpage--after-promotions" data-target="#main-header" data-prev-scroll-target="#promotion-2" data-disable-scroll-stopper class="after-promotions">
</main>
<div id="rg-gallery" class="rg-gallery front_page" style="margin-top: 138px;">
<div class="rg-thumbs super_mob_div">
<!-- Elastislide Carousel Thumbnail Viewer -->
<div class="es-carousel-wrapper search_main main_mob_div">

<!-- ******************** front page contnt Display *************** -->	
<div class="es-carousel">
<div class="page-content__content-area clearfix">
<div class="page-content">
<div class="page-content__header">

<?php while ( have_posts() ) : the_post(); ?>


<div class="page-content__content__main-content--fixed-width">
<?php the_content(); ?>

<?php endwhile; ?>


</div>
</div>
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