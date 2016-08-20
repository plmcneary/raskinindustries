<?php
error_reporting(0);

include("mail.php");

?>
<?php //include('mobile-header.php'); ?>
<header id="main-header" class="main-header main-header--startpage testtesttestnewheader">
    <?php
if(is_home() || is_front_page()) { ?>
    <?php } else { ?>
    <h1  style="float: left; z-index: 2147483647;position:relative;width: 140px;" class="logo_header desktop-2 pull-left 
        <?php echo the_title(); ?>">
        <a href="
            <?php echo home_url(); ?>" class="">
            <img src="
                <?php bloginfo('template_url'); ?>/images/raskin_logo_halfsize.jpg">
            </a>
        </h1>
        <?php } ?>
<!--
        <div data-controller="class-on-scroll" data-class="after-top-links" data-target="body" data-scroll-method="middle" class="main-header__top-links">
            <ul class="top_nav_menus">
                <li>
                    <a data-controller="toggle,focus-input,open" data-open-selector="#main-header" data-open-class="main-header--startpage--visible" data-setup-close-listeners=".main-header__search" data-toggle-selector=".main-header__search" data-toggle-class="main-header__search--open" data-focus-input=".main-header__search input" data-focus-input-clear>Search</a>
                </li>
                <li class="show-for-medium-up mob_accessary">
                    <a href="
                        <?php echo get_site_url(); ?>/order-accessories" class="post_title_link 
                        <?php if(get_the_ID()=="399"){ echo "active";} ?>">Order Accessories 
                    </a>
                </li>
                <li>
                    <a href="
                        <?php echo  get_site_url(); ?>/elevations/">Design a Room
                    </a>
                </li>
                <?php if(is_front_page() || is_home() ) {  ?>
                <?php }  


if ( is_singular('post') or $_GET['id'] !="" ) {


if($_GET['id'] !=""){
$id = $_GET['id'];
}else {

$id = get_the_ID() ;
}
$data = wp_get_post_categories($id);
$cat_id = $data[0];
$args = array(
'posts_per_page'   => 10,
'category'         => $cat_id,
'order'            => 'ASC',
'post_type'        => 'post',
);
$posts_array = get_posts( $args ); 
//echo "                <pre>";print_r($posts_array);
foreach($posts_array as $posts_array_val){
?>
                    <li class="head_top_nav">
                        <a href="
                            <?php echo get_the_permalink($posts_array_val->ID) ?>"  class="post_title_link 
                            <?php if($id==$posts_array_val->ID){ echo "active"; } ?>">
                            <?php echo $posts_array_val->post_title; ?>
                        </a>
                    </li>
                    <?php } 


} else {?>
                    <?php } ?>
                </ul> 
            </div> -->
            <div data-controller="sticky" data-sticky="main-header--sticky" data-sticky-target="#main-header" data-invisible-on-load-class="main-header--sticky--transition-in" class="main-header__container">
                <section id="sample-request-added" class="text-center slide-in">
                    <div class="panel panel--nested panel--seamless panel--border-bottom">
                        <a data-controller="toggle" data-toggle-selector="#sample-request-added" data-toggle-class="slide-in--open" data-toggle-height-selector="" class="icon-cross-large icon--right right no-underline-link"></a>
                        <h6 data-sample-request-text="A sample of '%s' was added to &lt;a class=&quot;regular&quot; href=&quot;/en/floors/request-samples/&quot;&gt;sample requests.&lt;/a&gt;" data-sample-request-text-multiple="%s samples were added to &lt;a class=&quot;regular&quot; href=&quot;/en/floors/request-samples/&quot;&gt;sample requests.&lt;/a&gt;" class="normal-case light"></h6>
                    </div>
                </section>
                <div id="about-menu" class="main-header__about">
                    <div class="row">
                        <!-- ********************About us section *******************   -->
                        <div class="medium-6 columns main-header__about__links">
                            <div class="row">
                                <?php $args = array(
'posts_per_page'   => 10,
'order'            => 'ASC',
'post_type'        => 'about-us',
);
$posts_array = get_posts( $args ); 
//echo "                                <pre>";print_r($posts_array);
foreach($posts_array as $posts_array_val){ ?>
                                    <article class="medium-6 columns main-header__about__links__link">
                                        <a href="
                                            <?php echo get_the_permalink($posts_array_val->ID) ?>">
                                            <h4 class="main-header__about__links__link__header verlag verlag--bold">
                                                <?php echo $posts_array_val->post_title; ?>
                                            </h4>
                                            <h5>
                                                <?php echo $posts_array_val->post_excerpt; ?>
                                            </h5>
                                        </a>
                                    </article>
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- ******************** End About us section *******************   -->
                            <div class="medium-6 columns main-header__about__social-media">
                                <a href="
                                    <?php echo get_site_url(); ?>/about-raskin/" style="background-image: none; background: black;">
                                    <h2 class="austin austin--bold">News</h2>
                                    <div class="main-header__about__social-media__subheader">
                                        <h4 class="verlag verlag--bold">Latest News</h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="main-header__panel menu_header_section">
                        <div class="row header_top_menu">
                            <div class="desktop-4 columns">
                                <a data-controller="toggle,lock-body" data-toggle-selector=".main-header__mobile-menu" data-toggle-class="main-header__mobile-menu--open" class="main-header__panel__mobile">
                                    <span class="icon-menu"></span>
                                </a>
                                <div class="main-header__panel__logo">
                                    <a href="
                                        <?php echo  get_site_url(); ?>">
                                        <span class="icon-logo"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="desktop-8 columns">
                                <a href="../start/request-samples.html" o-controller="request-sample-count" o-count-hidden-class="main-header__panel__cart--hidden" class="icon-cart right main-header__panel__cart main-header__panel__cart--hidden">
                                    <sup data-count class="main-header__panel__cart__items">0</sup>
                                </a>
                                <ul class="main-header__panel__items">
                                    <li>
                                        <a data-controller="toggle,open"
data-open-selector="#main-header"
data-open-class="main-header--startpage--visible"
data-setup-close-listeners="#floors-menu"
data-toggle-selector="#floors-menu"
data-toggle-height-selector=""
data-toggle-class="main-header__submenu--open"
data-close-selector="#projects-menu,#about-menu"
data-close-toggle-class="main-header__submenu--open,main-header__about--open"
data-close-toggle-height-selector=""
data-toggle-conditional-selector='body,.main-header__container'
data-toggle-conditional-class='menu-open,overflow-auto'
data-toggle-conditional-watch-selector='#main-header'
data-toggle-conditional-watch-class='main-header--startpage--visible'>
                                            <span class="main-header__panel__items__hover-effect">Residential</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-controller="toggle,open"
data-open-selector="#main-header"
data-open-class="main-header--startpage--visible"
data-setup-close-listeners="#projects-menu"
data-toggle-selector="#projects-menu"
data-toggle-height-selector=""
data-toggle-class="main-header__submenu--open"
data-close-selector="#floors-menu,#about-menu"
data-close-toggle-class="main-header__submenu--open,main-header__about--open"
data-close-toggle-height-selector=""
data-toggle-conditional-selector='body,.main-header__container'
data-toggle-conditional-class='menu-open,overflow-auto'
data-toggle-conditional-watch-selector='#main-header'
data-toggle-conditional-watch-class='main-header--startpage--visible'>
                                            <span class="main-header__panel__items__hover-effect">Commercial</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-controller="toggle,open" data-open-selector="#main-header" data-open-class="main-header--startpage--visible" data-setup-close-listeners="#about-menu" data-toggle-selector="#about-menu" data-toggle-class="main-header__about--open"
data-close-selector="#floors-menu,#projects-menu" data-close-toggle-class="main-header__submenu--open,main-header__submenu--open" data-close-toggle-height-selector=",">
                                            <span class="main-header__panel__items__hover-effect">About Us</span>
                                        </a>
                                    </li> <!--
                                    <li class="sample_order">
                                        <a data-controller="toggle,open"
data-open-selector="#main-header"
data-open-class="main-header--startpage--visible"
data-setup-close-listeners="#sample-menu"
data-toggle-selector="#sample-menu"
data-toggle-height-selector=""
data-toggle-class="main-header__submenu--open"
data-close-selector="#floors-menu,#about-menu"
data-close-toggle-class="main-header__submenu--open,main-header__about--open"
data-close-toggle-height-selector=""
data-toggle-conditional-selector='body,.main-header__container'
data-toggle-conditional-class='menu-open,overflow-auto'
data-toggle-conditional-watch-selector='#main-header'
data-toggle-conditional-watch-class='main-header--startpage--visible'>
                                            <span class="main-header__panel__items__hover-effect">Samples/Supplies</span>
                                        </a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="floors-menu" class="main-header__submenu">
                        <div class="main-header__submenu__body panel">
                            <div class="row">
                                <!-- **********************  Residential code start *****************-->
                                <section class="main-header__submenu__subnavigation">
                                    <ul data-controller="subnavigation" data-toggle-class="main-header__submenu__content--open" data-subnav-items-selector="[data-subnav-item]" data-subnav-items-active-class="main-header__submenu__subnavigation__item--active">
                                        <?php
$auto_incree = 0 ;
$args = array(
'posts_per_page'   => 15,
'order'            => 'ASC',
'post_type'        => 'residential',
);
$posts_array = get_posts( $args ); 
//echo "                                        <pre>";print_r($posts_array);echo "</pre>";
foreach($posts_array as $posts_array_val){ ?>
                                        <li data-subnav-item data-toggle-selector="#display_section
                                            <?php echo $auto_incree; ?>" class="main-header__submenu__subnavigation__item 
                                            <?php if($auto_incree==0){ echo "main-header__submenu__subnavigation__item--active";} ?>">
                                            <a>
                                                <h5 class="verlag">
                                                    <?php echo $posts_array_val->post_title; ?>
                                                </h5>
                                            </a>
                                        </li>
                                        <?php
$auto_incree++;
} ?>
                                    </ul>
                                </section>
                                <?php
$auto_increements = 0 ;
$args = array(
'posts_per_page'   => 15,
'order'            => 'ASC',
'post_type'        => 'residential',
);
$posts_array = get_posts( $args ); 
//echo "                                <pre>";print_r($posts_array);echo "</pre>";
foreach($posts_array as $posts_array_val){ ?>
                                <section id="display_section
                                    <?php echo $auto_increements; ?>" class="main-header__submenu__content 
                                    <?php if($auto_increements==0){ echo "main-header__submenu__content main-header__submenu__content--open";} ?>">
                                    <div class="row baseline-offset--1">
                                        <?php echo $posts_array_val->post_content; ?>
                                    </div>
                                    <div class="row baseline-offset--1"></div>
                                </section>
                                <?php 
$auto_increements++;
} ?>
                                <!-- ********************** End Residential code start *****************-->
                            </div>
                        </div>
                    </div>
                    <div id="projects-menu" class="main-header__submenu">
                        <div class="main-header__submenu__body panel">
                            <div class="row">
                                <section class="main-header__submenu__subnavigation ">
                                    <ul data-controller="subnavigation" data-toggle-class="main-header__submenu__content--open" data-subnav-items-selector="[data-subnav-item]" data-subnav-items-active-class="main-header__submenu__subnavigation__item--active">
                                        <!--************************   Commercial code ******************  -->
                                        <?php
$auto_incred = 0 ;
$args = array(
'posts_per_page'   => 15,
'order'            => 'ASC',
'post_type'        => 'commercials',
);
$posts_array = get_posts( $args ); 
//echo "                                        <pre>";print_r($posts_array);echo "</pre>";
foreach($posts_array as $posts_array_val){ ?>
                                        <li data-subnav-item data-toggle-selector="#commercial_section
                                            <?php echo $auto_incred; ?>" class="main-header__submenu__subnavigation__item 
                                            <?php if($auto_incred==0){ echo "main-header__submenu__subnavigation__item--active";} ?>">
                                            <a>
                                                <h5 class="verlag">
                                                    <?php echo $posts_array_val->post_title; ?>
                                                </h5>
                                            </a>
                                        </li>
                                        <?php
$auto_incred++;
} ?>
                                    </ul>
                                </section>
                                <?php
$auto_increementd = 0 ;
$args = array(
'posts_per_page'   => 15,
'order'            => 'ASC',
'post_type'        => 'commercials',
);
$posts_array = get_posts( $args ); 
//echo "                                <pre>";print_r($posts_array);echo "</pre>";
foreach($posts_array as $posts_array_val){ ?>
                                <section id="commercial_section
                                    <?php echo $auto_increementd; ?>" class="main-header__submenu__content 
                                    <?php if($auto_increementd==0){ echo "main-header__submenu__content main-header__submenu__content--open";} ?>">
                                    <div class="row baseline-offset--1">
                                        <?php echo $posts_array_val->post_content; ?>
                                    </div>
                                    <div class="row baseline-offset--1"></div>
                                </section>
                                <?php 
$auto_increementd++;
} ?>
                                <!--************************  End Commercial code ******************  -->
                            </div>
                        </div>
                    </div>
                    <div id="sample-menu" class="main-header__submenu">
                        <div class="main-header__submenu__body panel">
                            <div class="row">
                                <form method="post" name="contact_form" id="contact_form" class="contact_form_area">
                                    <div class="contact_div one_block">
                                        <label>Name</label>
                                        <span>
                                            <input type="text" name="first_name" id="first_name" required>
                                            </span>
                                        </div>
                                        <div class="contact_div one_block">
                                            <label>Email</label>
                                            <span>
                                                <input type="email" name="email" id="email" required>
                                                </span>
                                            </div>
                                            <div class="contact_div one_block">
                                                <label>Message</label>
                                                <span>
                                                    <textarea id="message" name="message" required></textarea>
                                                </span>
                                            </div>
                                            <div class="contact_div">
                                                <ul id="cat_list" class="list_sample_product">
                                                    <!--************************   Commercial code ******************  -->
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
//echo "                                                    <pre>";print_r($posts_array);
foreach($posts_array as $posts_array_val){
?>
                                                        <li class="cat_list">
                                                            <a href="javascript:void(0)" class="post_title_link" onclick="display_post_id('
                                                                <?php echo $posts_array_val->ID; ?>');" id="post_title_link_
                                                                <?php echo $posts_array_val->ID; ?>">
                                                                <?php echo strtoupper ( $posts_array_val->post_title) ; ?>
                                                            </a>
                                                        </li>
                                                        <?php } }  ?>
                                                    </ul>
                                                    <div class="main_list_product">
                                                        <ul class="list_sample_product list_product">
                                                            <?php 

if($_POST['post_id'] !="")
{
$post_id = $_POST['post_id'];
} else {
$post_id = 12;
}
$slider_data = get_field('slider_product',$post_id);
//echo "                                                            <pre>";print_r($slider_data);echo "</pre>";
if(is_array($slider_data) and count($slider_data)>0){
foreach($slider_data as $slider_data_val){
?>
                                                            <?php if($slider_data_val['product_image']['url'] !=""){ ?>
                                                            <li>
                                                                <!--<h5 class="verlag">
                                                                <?php echo $slider_data_val['product_title']; ?></h5>-->
                                                                <p>
                                                                    <?php echo $slider_data_val['product_title']; ?>
                                                                </p>
                                                                <img src="
                                                                    <?php echo $slider_data_val['product_image']['url'];  ?>" data-large="
                                                                    <?php echo $slider_data_val['product_image']['url'];  ?>" alt="image01" data-description="Raskin" />
                                                                    <label>
                                                                        <input type="checkbox" name="product[]" value="
                                                                            <?php echo $slider_data_val['product_title']; ?>" class="product_checkbox">
                                                                        </label>
                                                                    </li>
                                                                    <?php } } } ?>
                                                                    <input type="hidden" id="post_title" name="post_title" value="
                                                                        <?php echo get_the_title($post_id); ?>">
                                                                    </ul>
                                                                </div>
                                                                <script>
function display_post_id(id) {
var post_id = id;
$(".list_product").html('  
                                                                    <img style="text-align: center; width: 300px; position: fixed; left: 40%; top: 33%;" src="
                                                                        <?php bloginfo('template_url'); ?>/images/loading.gif"/>');
$.ajax({
type: "POST",
url: "",
data: {post_id:post_id} ,
success: function(data) {

$(".post_title_link").attr("style","color:#fff;");
$("#post_title_link_"+id).attr("style","color:#fdd12e;");
var list_product = $(data).find('.list_product').html();
jQuery('.list_product').html(list_product);

//$('.center').html(data); 
}
});
}

                                                                    </script>
                                                                </div>
                                                                <div class="contact_div" style="margin-top:18px;">
                                                                    <label></label>
                                                                    <span>
                                                                        <button style="background: rgb(0, 0, 0) none repeat scroll 0% 0%; color: rgb(255, 255, 255); font-weight: bold;" type="submit" name="send_email">Submit</button>
                                                                    </span>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php include('mobile-menu.php'); ?>
                                            <div data-controller="overlay" data-overlay-open-class="main-header__search--open" class="main-header__search">
                                                <div class="row">
                                                    <div class="columns">
                                                        <form action="
                                                            <?php bloginfo('siteurl'); ?>" id="searchform" method="get">
                                                            <h5 class="bold">Search Raskin.com</h5>
                                                            <input type="search" id="s" name="s" placeholder="Type here..." required />
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </header>										
