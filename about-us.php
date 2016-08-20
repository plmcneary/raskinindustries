<?php
/*
template name:About us Page
*/



include("head.php");
?>
<body class="index_01 " data-controller="anchor-links, selectivizr">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/style.css" />
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.tmpl.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/elastislide.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/india.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/design.css" />
<style>.page_content_main{width:100%;}</style>


<?php include('newheader.php'); ?>

<div class="mobile_top_area testtesttestaaboutus">
<!------------------------>
<!-- <a href="#after-promotions" style="padding-bottom: 0 !important" class="promotions__skip"><span class="icon-arrow-down"></span></a> -->
<main id="after-promotions" padding-bottom: 0 !important" data-controller="class-on-scroll,go-to-on-scroll" data-class="main-header--startpage--after-promotions" data-target="#main-header" data-prev-scroll-target="#promotion-2" data-disable-scroll-stopper class="after-promotions">
</main>
<div id="rg-gallery" class="rg-gallery front_page" style="margin-top: 138px;">
<div class="rg-thumbs">
<!-- Elastislide Carousel Thumbnail Viewer -->
<div class="es-carousel-wrapper" style="border-top:1px solid #ddd;">

<!-- ******************** front page contnt Display *************** -->	

<div class="page_content_main clearfix">


<aside class="submenu_new">
<h3 class="submenu__heading" style="font-size:18px;padding:4px 0 0 12px;">Raskin Industries</h3>
<ul class="submenu_itemlist">
<?php while ( have_posts() ) : the_post();
$page_id = get_the_id();
$get_link = get_field('page_title_and_lnk',$page_id);
if(is_array($get_link) and count($get_link)>0){
foreach($get_link as $link){	
 ?>
<li class='submenu__item'>
<a class="submenu__item__title" href="<?php echo $link['about_link']; ?>"><?php echo $link['about_title']; ?></a>
</li>

<?php } } ?>
</ul>
</aside>


<div class="page_content_right">
<div class="page-content__header">
<h1 class="page-content__heading"><?php  the_title(); ?></h1>

<div class="page-content__content__main-content--fixed-width">
<?php the_content(); ?>
<?php endwhile; ?>


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