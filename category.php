<?php get_header(); ?>
<div class="page-content__content-area clearfix">
<div class="page-content">
<div class="page-content__header">

<?php while ( have_posts() ) : the_post(); ?>
<h1 class="page-content__heading">

<?php  the_title(); ?>
</h1>

<div class="page-content__content__main-content--fixed-width">
<?php the_content(); ?>

<?php endwhile; ?>


</div>
</div>
</div>
</div>
<!--<li><a href="about-Raskin.html#">Sitemap</a></li>-->
</ul>
<?php get_footer(); ?>