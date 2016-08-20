<section data-controller="mobile-menu,overlay" data-mobile-item="main-header__mobile-menu__list__item" data-overlay-open-class="main-header__mobile-menu--open" class="main-header__mobile-menu"><a data-back data-back-visible-class="main-header__mobile-menu__back--visible" class="main-header__mobile-menu__back"><span class="icon-arrow-back"></span></a><a data-controller="toggle,unlock-body" data-toggle-selector=".main-header__mobile-menu"
data-toggle-class="main-header__mobile-menu--open" class="main-header__mobile-menu__close"><span class="icon-cross-large"></span></a>
<ul class="main-header__mobile-menu__list">


<li class="main-header__mobile-menu__list__item">
<section class="main-header__mobile-menu__list__item__section">
<a href="<?php echo get_site_url(); ?>" class="underline-link">
<h3 class="light">Home</h3>
</a>
</section>
</li>


<li class="main-header__mobile-menu__list__item">
<section class="main-header__mobile-menu__list__item__section">
<a data-header class="underline-link">
<h3 class="light">Residential</h3>
</a>
<div class="main-header__mobile-menu__list__item__section__body">
<section id="collections-mobile-menu">
</section>
<section>

<!-- ************** Residential product tab ***********  -->
<ul class="unstyled-list mobile_residential_col">
<?php
$auto_incree = 0;
$args = array(
'posts_per_page'   => 15,
'order'            => 'ASC',
'post_type'        => 'residential',
);
$posts_array = get_posts( $args ); 
//echo "<pre>";print_r($posts_array);echo "</pre>";
foreach($posts_array as $posts_array_val){ ?>
<li><a class="residential_menu_<?php echo $auto_incree;  ?>" onclick="display_menu(<?php echo $auto_incree; ?>);"><h5 class="verlag"><?php echo $posts_array_val->post_title; ?></h5></a></li>
<?php $auto_incree++;  } ?>
</ul>


<?php
$auto_increement = 0;
$args = array(
'posts_per_page'   => 15,
'order'            => 'ASC',
'post_type'        => 'residential',
);
$posts_array = get_posts( $args ); 
//echo "<pre>";print_r($posts_array);echo "</pre>";
foreach($posts_array as $posts_array_val){ ?>
<div class="small-12 columns redential_sub residential_sub_menu_<?php echo $auto_increement; ?>" style="display:none;">
<ul class="back_buttons">
<li class="product_tab_back"><span class="icon-arrow-back back_btn_arrow" onclick="back_button();"></span><a href="javascript:void(0)" class="underline-link" onclick="back_button();">Back</a></li>

</ul>
<?php echo get_field('modile_menu',$posts_array_val->ID); ?>
</div>
<?php  $auto_increement++; } ?>




</section>



</div>
</section>
</li>
<li class="main-header__mobile-menu__list__item">
<section class="main-header__mobile-menu__list__item__section">
<a data-header class="underline-link">
<h3 class="light">Commercial</h3>
</a>
<div class="main-header__mobile-menu__list__item__section__body">
<section id="collections-mobile-menu">
</section>
<section>



<!-- ************** Commercial product tab ***********  -->
<ul class="unstyled-list mobile_residential_col">
<?php
$auto_incre = 0;
$args = array(
'posts_per_page'   => 15,
'order'            => 'ASC',
'post_type'        => 'commercials',
);
$posts_arrs = get_posts( $args ); 
//echo "<pre>";print_r($posts_array);echo "</pre>";
foreach($posts_arrs as $posts_array_value){ ?>
<li><a class="residential_menu_<?php echo $auto_incre;  ?>" onclick="display_menu(<?php echo $auto_incre; ?>);"><h5 class="verlag"><?php echo $posts_array_value->post_title; ?></h5></a></li>
<?php $auto_incre++;  } ?>
</ul>


<?php
$auto_increements = 0;
$args = array(
'posts_per_page'   => 15,
'order'            => 'ASC',
'post_type'        => 'commercials',
);
$posts_arr = get_posts( $args ); 
//echo "<pre>";print_r($posts_array);echo "</pre>";
foreach($posts_arr as $posts_array_vals){ ?>
<div class="small-12 columns redential_sub residential_sub_menu_<?php echo $auto_increements; ?>" style="display:none;">
<ul class="back_buttons">
<li class="product_tab_back">
<span class="icon-arrow-back back_btn_arrow" onclick="back_button();"></span>
<a href="javascript:void(0)" class="underline-link" onclick="back_button();">Back</a></li>
</ul>
<?php echo get_field('mobile_menu',$posts_array_vals->ID); ?>
</div>
<?php  $auto_increements++; } ?>
<!-- ************** Commercial product tab end ***********  -->


</section>
</li>
<li class="main-header__mobile-menu__list__item">
<section class="main-header__mobile-menu__list__item__section">
<a data-header class="underline-link">
<h3 class="light">ABOUT US</h3>
</a>
<div class="main-header__mobile-menu__list__item__section__body">
<ul class="unstyled-list">
<li><a href="<?php echo get_site_url(); ?>/?about-us=friends" class="underline-link"><h4 class="light">Our Company</h4></a></li>
<li><a href="" class="underline-link"><h4 class="light">Press</h4></a></li>
<li><a href="<?php echo get_site_url(); ?>/?about-us=contact" class="underline-link"><h4 class="light">Contact</h4></a></li>
<li><a href="<?php echo get_site_url(); ?>/?about-us=friends" class="underline-link"><h4 class="light">Friends</h4></a></li>
<li><a href="<?php echo get_site_url(); ?>/?about-us=news-and-social-media" class="underline-link"><h4 class="light">News and social media</h4></a></li>
</ul>
</div>
</section>
</li>


<li class="main-header__mobile-menu__list__item">
<section class="main-header__mobile-menu__list__item__section">
<a data-header class="underline-link">
<h3 class="light">SAMPLES/SUPPLIES</h3>
</a>
<div class="main-header__mobile-menu__list__item__section__body">
<ul class="unstyled-list mobile_post_menu">

<?php
$categories= get_all_category_ids() ;
foreach($categories as $cat_id)
{
$args = array(
'posts_per_page'   => 10,
'category'         => $cat_id,
'order'            => 'ASC',
'post_type'        => 'post',
);
$posts_array = get_posts( $args ); 
//echo "<pre>";print_r($posts_array);
foreach($posts_array as $posts_array_val){
?>
<li class="cat_list"><a href="<?php echo get_site_url(); ?>/sample-supplies?id=<?php echo $posts_array_val->ID; ?>" class="post_title_link"><?php echo strtoupper ( $posts_array_val->post_title) ; ?></a></li>
<?php } }  ?>



</ul>
</div>
</section>
</li>


</ul>


</section>