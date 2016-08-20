<div class="main-header__top-links hide-desktop-menu" data-scroll-method="middle" data-target="body" data-class="after-top-links" data-controller="class-on-scroll" o-controller-initiated="initiated">	
<ul class="mobile_post_menuss">
<?php 
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
//echo "<pre>";print_r($posts_array);
foreach($posts_array as $posts_array_val){
?>
<li><a href="<?php echo get_the_permalink($posts_array_val->ID) ?>"  class="post_title_link <?php if($id==$posts_array_val->ID){ echo "active"; } ?>"><?php echo $posts_array_val->post_title; ?></a></li>
<?php } 
?>
</ul>
</div>	