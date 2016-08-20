<?php

get_header();
?>
<div class="container">
<div class="row">
<div class="col-md-7 col-sm-7 col-xs-12 left-content">


<?php 
while ( have_posts() ) : the_post();  ?>
<h1><?php the_title(); ?></h1>
<?php the_content(); ?>
<?php endwhile; ?>

</div>

<?php get_sidebar(); ?>
</div>
</div>

<?php get_footer(); ?>