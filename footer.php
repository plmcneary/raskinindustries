<?php
/**
* The template for displaying the footer
*
* Contains footer content and the closing of the #main and #page div elements.
*
* @package WordPress
* @subpackage Talent Association
* @since Talent Association
*/
?>

<div class="after-promotions">
<footer class="main-footer main-footer--no-margin">
<div class="row">
<div class="medium-7 columns">
<div class="row">
<div class="medium-12 large-5 columns main-footer__section">
<div class="main-footer__header">
<h5 class="bold">Collections</h5>
</div>

<div class="row">

</div>

<div class="row">


<div class="medium-12 small-6 columns">
<ul>

<?php $args = array(
	'posts_per_page'   => 10,
	'category'         => '2',
	'order'            => 'ASC',
	'post_type'        => 'post',
	
	);
$posts_array = get_posts( $args ); 
//echo "<pre>";print_r($posts_array);
foreach($posts_array as $posts_array_val){
 ?>
<li><a href="<?php echo get_the_permalink($posts_array_val->ID) ?>" class="post_title_link"><?php echo $posts_array_val->post_title; ?></a>
</li>
<?php } ?>
</ul>
</div>
<div class="medium-4 small-6 columns">

</div>
</div>
<div class="row">
<ul class="main-header__submenu__list medium-12 columns">

</ul>
</div>
</div>
<div class="medium-12 large-5 columns main-footer__section">
<div class="main-footer__header">
<h5 class="bold">ABOUT US</h5>
</div>



<div class="row">
<div class="meduim-12 columns">
 <?php wp_nav_menu( array('menu' => 'footer_menu','menu_class' => 'foot_menu','menu_id' => '' )); ?>


</div>
<div class="small-6 columns">
<ul>
</ul>
</div>


</div>
</div>
</div>
<div class="row">
<div class="medium-12 columns main-footer__section">
<div class="main-footer__header">
<h5 class="bold">>Installation/Sales Videos</h5>
</div>
<div class="row">


<div class="medium-24 large-12 columns">
<ul>
<li>
<a href="../start/story-of-raskin.html">Raskin History - 3rd Generation Pioneers</a>
</li>
<li>
<a href="../start/story-of-raskin.html">South Korean Manufacturing Benefits</a>
</li>
</ul>
</div>
<div class="medium-12 large-6 columns">
<ul>

</ul>
</div>
</div>
</div>
</div>
</div>
<div class="medium-5 large-3 columns">
<div class="main-footer__logo icon-logo"></div>
</div>
</div>
</footer>

</div>


</body>

</html>
<?php wp_footer(); ?>
</body>
</html>
