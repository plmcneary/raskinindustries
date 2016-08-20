<?php
$site_path = get_site_url();
/**
 * Set the content width based on the theme's design and stylesheet.
 */
 if( !is_admin()){
wp_deregister_script('jquery');
wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"), false, '1.3.2');

wp_enqueue_script('jquery');
}
wp_deregister_script('jquery-cycle');
wp_deregister_script('ngg-slideshow');

if ( ! isset( $content_width ) )
	$content_width = 584;

/**
 * Tell WordPress to run TWY_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'TWY_setup' );

if ( ! function_exists( 'TWY_setup' ) ):
 
function TWY_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

    register_nav_menus( array(
		'header' => __( 'Header Navigation', 'TWYtheme' ),
		
	) );


	//register_nav_menus(array('header'=>'Header menu', 'footer'=>'Footer menu'));

	// Add support for a variety of post formats
	add_theme_support( 'post-formats', array( 'aside', 'link', 'gallery', 'status', 'quote', 'image' ) );

	// Add support for custom backgrounds
	add_custom_background();

	// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	add_theme_support( 'post-thumbnails' );

	// The next four constants set how Twenty Eleven supports custom headers.

	// The default header text color
	define( 'HEADER_TEXTCOLOR', '000' );

	// By leaving empty, we allow for random image rotation.
	define( 'HEADER_IMAGE', '' );

	// The height and width of your custom header.
	// Add a filter to TWY_header_image_width and TWY_header_image_height to change these values.
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'TWY_header_image_width', 1000 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'TWY_header_image_height', 288 ) );

	// We'll be using post thumbnails for custom header images on posts and pages.
	// We want them to be the size of the header image that we just defined
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

	// Add Twenty Eleven's custom image sizes
	add_image_size( 'large-feature', HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true ); // Used for large feature (header) images
	add_image_size( 'small-feature', 500, 300 ); // Used for featured posts if a large-feature doesn't exist

	// Turn on random header image rotation by default.
	add_theme_support( 'custom-header', array( 'random-default' => true ) );

	// Add a way for the custom header to be styled in the admin panel that controls
	// custom headers. See TWY_admin_header_style(), below.
}
endif; // TWY_setup


/**
 * Sets the post excerpt length to 40 words.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 */
function TWY_excerpt_length( $length ) {
	return 200;
}
add_filter( 'excerpt_length', 'TWY_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 */
function TWY_continue_reading_link() {
	return ' <a style="display:none;" href="'. esc_url( get_permalink() ) . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'TWY' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and TWY_continue_reading_link().
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 */
function TWY_auto_excerpt_more( $more ) {
	return ' &hellip;' . TWY_continue_reading_link();
}
add_filter( 'excerpt_more', 'TWY_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 */
function TWY_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= TWY_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'TWY_custom_excerpt_more' );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function TWY_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'TWY_page_menu_args' );


if ( ! function_exists( 'TWY_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function TWY_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?>">
			
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'TWY' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'TWY' ) ); ?></div>
		</nav><!-- #nav-above -->
	<?php endif;
}
endif; // TWY_content_nav

/**
 * Return the URL for the first link found in the post content.
 * @return string|bool URL or false when no link is present.
 */
function TWY_url_grabber() {
	if ( ! preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/is', get_the_content(), $matches ) )
		return false;

	return esc_url_raw( $matches[1] );
}



if ( ! function_exists( 'TWY_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own TWY_comment(), and that function will be used instead.
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function TWY_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'TWY' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'TWY' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 68;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 39;

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s on %2$s <span class="says">said:</span>', 'TWY' ),
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'TWY' ), get_comment_date(), get_comment_time() )
							)
						);
					?>

					<?php edit_comment_link( __( 'Edit', 'TWY' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'TWY' ); ?></em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'TWY' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div>
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for TWY_comment()

if ( ! function_exists( 'TWY_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 * Create your own TWY_posted_on to override in a child theme
 */
function TWY_posted_on() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'TWY' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'TWY' ), get_the_author() ) ),
		get_the_author()
	);
}
endif;

/**
 * Adds two classes to the array of body classes.
 * The first is if the site has only had one author with published posts.
 * The second is if a singular post being displayed
 */
function TWY_body_classes( $classes ) {

	if ( function_exists( 'is_multi_author' ) && ! is_multi_author() )
		$classes[] = 'single-author';

	if ( is_singular() && ! is_home() && ! is_page_template( 'showcase.php' ) && ! is_page_template( 'sidebar-page.php' ) )
		$classes[] = 'singular';

	return $classes;
}
add_filter( 'body_class', 'TWY_body_classes' );

include(TEMPLATEPATH.'/lib/includes.php');

/*
* Loading Jquery
*/

function TWY_theme_load_scripts(){ 
    $template_directory = get_bloginfo('template_directory');
    if (!is_admin()) {//load theme scripts
	   wp_deregister_script( 'jquery' );
	   wp_register_script('jquery','https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js'); 
	   wp_enqueue_script( 'jquery' ); 
    }
}
add_action('init', 'TWY_theme_load_scripts');


/* TWY-Theme Custom Paging for portfolio and products */
function TWY_custom_post_limits( $limits )
{
	if(is_category()){
		
		$cat=get_query_var('cat');
		
		$porfolio_gallery_categories=split(',',get_option('TWYtheme_portf_ex_cat[]'));
		foreach ($porfolio_gallery_categories as $p_cat){
			if ($p_cat==$cat){
				$post_per_page=get_option('TWYtheme_portf_pager');
			}
		}
		
		$product_gallery_categories=split(',',get_option('TWYtheme_product_list_ex_cat[]'));
		foreach ($product_gallery_categories as $p_cat){
			if ($p_cat==$cat){
				$post_per_page=get_option('TWYtheme_product_list_pager');
			}
		}
	
		$blogtem_categories=split(',',get_option('TWYtheme_blog_ex_cat[]'));
		foreach ($blogtem_categories as $p_cat){
			if ($p_cat==$cat){
				$post_per_page=get_option('TWYtheme_blog_pager');
			}
		}
		
		if($post_per_page>0){	
			$page=get_query_var('paged');
			
			if($page==0 || $page<0)  $page = 1; 
			$start=0;
			$end=0;
	 
			if($page=="" || $page<0){
				$start=0;
				$end=$post_per_page;
			}
			
			elseif($page && $page>1){
				$start=$post_per_page*$page-1;
				$end=$start;
			}else{
				$start=0;
				$end=1;
			}
			
			//  offset
			$offset = ($page - 1) * $post_per_page;
			//new limits
			$limits = " LIMIT $offset, $post_per_page"; 			
		}
	}
	
	return $limits; 
}

add_filter('post_limits', 'TWY_custom_post_limits' );
 

/*
TWY-Theme Dynamic Sidebar Function 
*/



		
register_sidebar(array(
'name' => __( 'social-icon' ),
'id' => 'sidebar_post',
'description' => __( 'Social icons' ),
'before_title' => '<h1>',
'after_title' => '</h1>'
));

register_sidebar(array(
'name' => __( 'altas-table' ),
'id' => 'sidebar_post1',
'description' => __( 'Altas Table' ),
'before_title' => '<h1>',
'after_title' => '</h1>'
));

register_sidebar(array(
'name' => __( 'altas-map' ),
'id' => 'sidebar_post2',
'description' => __( 'Altas Map' ),
'before_title' => '<h1>',
'after_title' => '</h1>'
));

/* Breadcrumb */
function TWY_breadcrumb($gecerli_sayfa){
	
	if ( is_page() ){
				$ust_id=$gecerli_sayfa->post_parent;
				$yeni_sorgu = get_post($ust_id);			 
			   if($yeni_sorgu->post_parent) {
				 TWY_breadcrumb($yeni_sorgu);
				 echo " \ ";
				}
				echo  "<a href=\"".get_permalink($yeni_sorgu->ID)."\" title=\"\" >". get_the_title($yeni_sorgu->ID) ."</a>";
	}
	elseif ( is_single() || is_category() && !is_archive()){
				$ust_id=$gecerli_sayfa->post_parent;
				$yeni_sorgu = get_post($ust_id);			 	
				$kategori= get_the_category($yeni_sorgu->ID);
				$ID = $kategori[0]->cat_ID;
				
				$ayrac=" &#92; ";

				if($ID)  echo get_category_parents($ID, TRUE, $ayrac , FALSE );

				   if($yeni_sorgu->post_parent) {
					 TWY_breadcrumb($yeni_sorgu);
						if (! is_category() )  echo " \ ";
					}
				
				if ( is_single() ){
					echo  "<a href=\"".get_permalink($yeni_sorgu->ID)."\" title=\"\" >". get_the_title($yeni_sorgu->ID) ."</a>";
				}
	}else{
			 echo  wp_title('');
	}
}
function twentyten_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'twentyten' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'contact widgt area', 'twentyten' ),
		'id' => 'contact-area',
		'description' => __( 'contact widgt area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );





	// Area 6, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', 'twentyten' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'The fourth footer widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}



function twentythirteen_setup() {
	/*
	 * Makes Twenty Thirteen available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Thirteen, use a find and
	 * replace to change 'twentythirteen' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'twentythirteen', get_template_directory() . '/languages' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'fonts/genericons.css', twentythirteen_fonts_url() ) );

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Switches default core markup for search form, comment form,
	 * and comments to output valid HTML5.
	 */
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

	/*
	 * This theme supports all available post formats by default.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
	) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Navigation Menu', 'twentythirteen' ) );

	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 604, 270, true );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
add_action( 'after_setup_theme', 'twentythirteen_setup' );


function twentythirteen_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	 * supported by Source Sans Pro, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$source_sans_pro = _x( 'on', 'Source Sans Pro font: on or off', 'twentythirteen' );

	/* Translators: If there are characters in your language that are not
	 * supported by Bitter, translate this to 'off'. Do not translate into your
	 * own language.
	 */
	$bitter = _x( 'on', 'Bitter font: on or off', 'twentythirteen' );

	if ( 'off' !== $source_sans_pro || 'off' !== $bitter ) {
		$font_families = array();

		if ( 'off' !== $source_sans_pro )
			$font_families[] = 'Source Sans Pro:300,400,700,300italic,400italic,700italic';

		if ( 'off' !== $bitter )
			$font_families[] = 'Bitter:400,700';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
	}

	return $fonts_url;
}


function twentythirteen_scripts_styles() {
	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Adds Masonry to handle vertical alignment of footer widgets.
	if ( is_active_sidebar( 'sidebar-1' ) )
		wp_enqueue_script( 'jquery-masonry' );

	// Loads JavaScript file with functionality specific to Twenty Thirteen.
	wp_enqueue_script( 'twentythirteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '2013-07-18', true );

	// Add Source Sans Pro and Bitter fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentythirteen-fonts', twentythirteen_fonts_url(), array(), null );

	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/fonts/genericons.css', array(), '2.09' );

	// Loads our main stylesheet.
	wp_enqueue_style( 'twentythirteen-style', get_stylesheet_uri(), array(), '2013-07-18' );

	// Loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentythirteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentythirteen-style' ), '2013-07-18' );
	wp_style_add_data( 'twentythirteen-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'twentythirteen_scripts_styles' );

function twentythirteen_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentythirteen' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'twentythirteen_wp_title', 10, 2 );



if ( ! function_exists( 'twentythirteen_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_paging_nav() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<nav class="navigation paging-navigation" role="navigation" id="nav-below">
	
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<div class="normalbtn">Load more...</div>', 'twentythirteen' ) ); ?></div>
	<?php

			endif;


			?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;



function string_limit_words($string, $word_limit)
{
$words = explode(' ', $string, ($word_limit + 1));
if(count($words) > $word_limit)array_pop($words);
return implode(' ', $words);
}

if ( ! function_exists( 'twentythirteen_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
*
* @since Twenty Thirteen 1.0
*
* @return void
*/
function twentythirteen_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	
	<div class="normalbtn">
	<nav class="navigation post-navigation" role="navigation">
		
		<div class="nav-links">

			<?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'twentythirteen' ) ); ?>
			<?php next_post_link( '%link', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'twentythirteen' ) ); ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	</div>
	<?php
}
endif;


if ( ! function_exists( 'twentythirteen_entry_meta' ) ) :
/**
 * Print HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own twentythirteen_entry_meta() to override in a child theme.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_entry_meta() {
	if ( is_sticky() && is_home() && ! is_paged() )
		echo '<span class="featured-post">' . __( 'Sticky', 'twentythirteen' ) . '</span>';

	if ( ! has_post_format( 'link' ) && 'post' == get_post_type() )
		twentythirteen_entry_date();

	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'twentythirteen' ) );
	if ( $categories_list ) {
		echo '<span class="categories-links">' . $categories_list . '</span>';
	}

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'twentythirteen' ) );
	if ( $tag_list ) {
		echo '<span class="tags-links">' . $tag_list . '</span>';
	}

	// Post author
	if ( 'post' == get_post_type() ) {
		printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'twentythirteen' ), get_the_author() ) ),
			get_the_author()
		);
	}
}
endif;



if ( ! function_exists( 'twentythirteen_entry_date' ) ) :
/**
 * Print HTML with date information for current post.
 *
 * Create your own twentythirteen_entry_date() to override in a child theme.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param boolean $echo (optional) Whether to echo the date. Default true.
 * @return string The HTML-formatted post date.
 */
function twentythirteen_entry_date( $echo = true ) {
	if ( has_post_format( array( 'chat', 'status' ) ) )
		$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'twentythirteen' );
	else
		$format_prefix = '%2$s';

	$date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( sprintf( __( 'Permalink to %s', 'twentythirteen' ), the_title_attribute( 'echo=0' ) ) ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
	);

	if ( $echo )
		echo $date;

	return $date;
}
endif;



if ( ! function_exists( 'twentythirteen_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_the_attached_image() {
	/**
	 * Filter the image attachment size to use.
	 *
	 * @since Twenty thirteen 1.0
	 *
	 * @param array $size {
	 *     @type int The attachment height in pixels.
	 *     @type int The attachment width in pixels.
	 * }
	 */
	$attachment_size     = apply_filters( 'twentythirteen_attachment_size', array( 724, 724 ) );
	$next_attachment_url = wp_get_attachment_url();
	$post                = get_post();

	/*
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ),
		the_title_attribute( array( 'echo' => false ) ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;


function twentythirteen_body_class( $classes ) {
	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	if ( is_active_sidebar( 'sidebar-2' ) && ! is_attachment() && ! is_404() )
		$classes[] = 'sidebar';

	if ( ! get_option( 'show_avatars' ) )
		$classes[] = 'no-avatars';

	return $classes;
}
add_filter( 'body_class', 'twentythirteen_body_class' );


function twentythirteen_content_width() {
	global $content_width;

	if ( is_attachment() )
		$content_width = 724;
	elseif ( has_post_format( 'audio' ) )
		$content_width = 484;
}
add_action( 'template_redirect', 'twentythirteen_content_width' );


function twentythirteen_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'twentythirteen_customize_register' );

/**
 * Enqueue Javascript postMessage handlers for the Customizer.
 *
 * Binds JavaScript handlers to make the Customizer preview
 * reload changes asynchronously.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_customize_preview_js() {
	wp_enqueue_script( 'twentythirteen-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20130226', true );
}
add_action( 'customize_preview_init', 'twentythirteen_customize_preview_js' );

/**
 * Add theme support for infinite scroll.
 *
 * @uses add_theme_support
 * @return void
 */
function twenty_twelve_infinite_scroll_init() {
    add_theme_support( 'infinite-scroll', array(
        'container' => 'content',
    ) );
}
add_action( 'after_setup_theme', 'twenty_twelve_infinite_scroll_init' );


/************ GET FEATURED IMAGE CAPTION *****************/
function get_the_feature_caption() {
  global $post;

  $thumbnail_id    = get_post_thumbnail_id($post->ID);
  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

  if ($thumbnail_image && isset($thumbnail_image[0])) {
    $caption = '<span>'.$thumbnail_image[0]->post_excerpt.'</span>';
  }
  return $caption;
}
/************ GET FEATURED IMAGE CAPTION *****************/

function change_role_name() {
    global $wp_roles;

   if ( ! isset( $wp_roles ) )
        $wp_roles = new WP_Roles();

    //You can list all currently available roles like this...
    //$roles = $wp_roles->get_names();
    //print_r($roles);

    //You can replace "administrator" with any other role "editor", "author", "contributor" or "subscriber"...
    //$wp_roles->roles['subscriber']['name'] = 'Client';
    //$wp_roles->role_names['subscriber'] = 'Client';
	
    $wp_roles->roles['author']['name'] = 'Agent - Author';
    $wp_roles->role_names['author'] = 'Agent';           
}
add_action('init', 'change_role_name');




// Function to actually output the meta box
function output_my_meta_box( $post ) {
	
	?>
   <style>
   .mf_field__listprice, .mf_field__city { display:none; }
   </style>
    <script>
	
	function myval(mpv)
	{
		document.getElementById('_listprice').value=mpv;
	}
	
	function myval2(mpv)
	{
		document.getElementById('_city').value=mpv;
	}
	
	function showcnt(str, str2)
	{
		//alert(str);
	var xmlhttp;
	if (str.length==0)
	  {
	  document.getElementById("st").innerHTML="";
	  return;
	  }
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		//document.getElementById("st").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("GET","<?php echo home_url('/'); ?>wp-admin/getoptions.php?q="+str+"&q1="+str2+"&iid="+<?php echo $_GET['post']; ?>,true);
	xmlhttp.send();
	}
	</script>
    
    <?php
	//echo '<div id="st"> </div>';
    echo 'Price: <input type="text" name="my_field" id="md" value="' . $post->my_field . '" onblur="myval(this.value)" />&nbsp;&nbsp;&nbsp;City: <input type="text" name="my_field_city" id="mc" value="' . $post->my_field_city . '" onblur="myval2(this.value)" />
			<label style="float:right; margin:0 0 0 5px" class="button-primary" onclick="showcnt(document.getElementById(\'md\').value, document.getElementById(\'mc\').value)">Save this section only</label>';
}



function teammore($post)
{
	?>
	<script>
	
	function showcnt(str1, str2, str3, str4, str5, str6, str7, str8, str9, str10, str11, str12)
	{
		//alert(str2);
	var xmlhttp;
	/*if (str.length==0)
	  {
	  document.getElementById("st").innerHTML="";
	  return;
	  }*/
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("st").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("GET","<?php echo home_url('/'); ?>wp-admin/getTeamoptions.php?i1="+str1+"&i1l="+str2+"&i2="+str3+"&i2l="+str4+"&i3="+str5+"&i3l="+str6+"&i4="+str7+"&i4l="+str8+"&i5="+str9+"&i5l="+str10+"&i6="+str11+"&i6l="+str12,true);
	xmlhttp.send();
	}
	</script>
    
    <?php

	echo 'Image1: <input type="text" name="image1" id="image1" /> Link (if any): <input type="text" name="image1link" id="image1link" /> <br />'.
		'Image2: <input type="text" name="image2" id="image2" /> Link (if any): <input type="text" name="image2link" id="image2link" /> <br />'.
		'Image3: <input type="text" name="image3" id="image3" /> Link (if any): <input type="text" name="image3link" id="image3link" /> <br />'.
		'Image4: <input type="text" name="image4" id="image4" /> Link (if any): <input type="text" name="image4link" id="image4link" /> <br />'.
		'Image5: <input type="text" name="image5" id="image5" /> Link (if any): <input type="text" name="image5link" id="image5link" /> <br />'.
		'Image6: <input type="text" name="image6" id="image6" /> Link (if any): <input type="text" name="image6link" id="image6link" /> <br />';	
		
		
	echo '<label style="float:right; margin:0 0 0 5px" class="button-primary" onclick="showcnt(document.getElementById(\'image1\').value, document.getElementById(\'image1link\').value, document.getElementById(\'image2\').value, document.getElementById(\'image2link\').value, document.getElementById(\'image3\').value, document.getElementById(\'image3link\').value, document.getElementById(\'image4\').value, document.getElementById(\'image4link\').value, document.getElementById(\'image5\').value, document.getElementById(\'image5link\').value, document.getElementById(\'image6\').value, document.getElementById(\'image6link\').value)">Save this section only</label> <br /> <br />';	
}

function count_list_posts(){
global $wpdb;
$table_name = $wpdb->prefix . "posts";
$sql="SELECT * FROM wp_posts WHERE post_status='publish' and post_type='post'  ";
$result=mysql_query($sql) or die (mysql_error().$sql);
$count=mysql_num_rows($result);
return $count;

}


function count_list_property($author_id){
global $wpdb;
$table_name = $wpdb->prefix . "posts";
$sql="SELECT * FROM wp_posts WHERE post_author='".$author_id."' and post_status='publish' and post_type='property-listing'  ";
$result=mysql_query($sql) or die (mysql_error().$sql);
$count=mysql_num_rows($result);
return $count;

}


function count_all_property(){
global $wpdb;
$table_name = $wpdb->prefix . "term_taxonomy";
$count_sql = mysql_query("SELECT * FROM wp_posts WHERE post_status='publish' and post_type='property-listing'");
$count_row = mysql_num_rows($count_sql);
return $count_row;

}

function count_all_videos(){
global $wpdb;
$count_sql = mysql_query("SELECT * FROM wp_posts WHERE post_status='publish' and post_type='video'");
$count_row = mysql_num_rows($count_sql);
return $count_row;

}

function count_community_property(){
global $wpdb;
$table_name = $wpdb->prefix . "term_taxonomy";
$count_sql = mysql_query("SELECT * FROM wp_posts WHERE post_status='publish' and post_type='communities'");
$count_row = mysql_num_rows($count_sql);
return $count_row;

}


function count_all_posts($category_id){
global $wpdb;
$table_name = $wpdb->prefix . "term_taxonomy";
$sql="SELECT * FROM wp_term_taxonomy where term_id ='".$category_id."'  ";
$result=mysql_query($sql) or die (mysql_error().$sql);
$count_posts = mysql_fetch_assoc($result);
$count = $count_posts['count'];
return $count;

}




function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


function get_content_post($post_id)
{
$sql           = mysql_query("SELECT * FROM wp_posts where ID='".$post_id."'");
$records       = mysql_fetch_assoc($sql);
$video_content = $records['post_content'];
return $video_content;
}


function get_post_category($post_id)
{
$sql           = mysql_query("SELECT * FROM wp_terms as wt inner join wp_term_relationships as wtr on wt.term_id=wtr.term_taxonomy_id where object_id='".$post_id."'");
$records       = mysql_fetch_assoc($sql);
$cat_name = $records['name'];
return $cat_name;
}



function post_type_get($post_id)
{
$sql           = mysql_query("SELECT * FROM wp_posts where ID='".$post_id."'");
$records       = mysql_fetch_assoc($sql);
$post_type     = $records['post_type'];
return $post_type;
}

function text_trims($text, $wrap=230) {
  $len = strlen($text);
  if ($len > $wrap)
   $str = substr($text,0,$wrap)."...";
  else 
   $str = $text;                                
  return $str;
}




add_action('init', 'do_output_buffer');
function do_output_buffer() {
        ob_start();
}

function textwraper($text, $wrap=230)	{
		$len = strlen($text);
		if ($len > $wrap)
			$str = substr($text,0,$wrap)."...";
		else 
			$str = $text;                                
		return $str;
}



function content_limit_rule($text, $wrap=230)	{
		$len = strlen($text);
		if ($len > $wrap)
			$str = substr($text,0,$wrap)."...";
		else 
			$str = $text;                                
		return $str;
}


add_filter( 'gform_submit_button', 'theme_t_wp_submit_button', 10, 4);

function theme_t_wp_submit_button( $button, $form ){
$form_id = $form["id"];
if($form_id==2){  $submit_btn_name = "SEND YOUR INQUIRY";}
if($form_id==3){  $submit_btn_name = "SUBMIT";}
if($form_id==4){  $submit_btn_name = "GO!";}
return "<button class='btn btn-default col-xs-12 submitbtn' id='gform_submit_button_{$form["id"]}'><span>".$submit_btn_name."</span></button>";

}


// get post custom field row data
function get_post_row($post_id,$field_title,$field_desc,$field_pdf)
{
global $wpdb;
$table_post_meta = $wpdb->prefix . "postmeta";
$row_details = $wpdb->get_results( "select * from $table_post_meta where post_id='".$post_id."' and (meta_key='$field_title' or meta_key='$field_desc' or meta_key='$field_pdf' )" );
return $row_details;
}

// get post custom field row data upload design room and pdf
function get_post_row_uploads($post_id,$design_img_field,$field_pdf_upload)
{
global $wpdb;
$table_post_meta = $wpdb->prefix . "postmeta";
$table_post = $wpdb->prefix . "posts";
$row_details = $wpdb->get_results("select wp.*,p.guid from $table_post_meta as wp inner join $table_post as p on p.ID=wp.meta_value where wp.post_id='".$post_id."' and (meta_key='$design_img_field' or meta_key='$field_pdf_upload' )" );
return $row_details;
}



// get post custom field background images
function get_post_row_background($post_id,$slide_1,$slide_2,$slide_3,$slide_4,$slide_5,$slide_6,$slide_7,$slide_8,$slide_9,$slide_10)
{
global $wpdb;
$table_post_meta = $wpdb->prefix . "postmeta";
$table_post = $wpdb->prefix . "posts";
$row_details = $wpdb->get_results("select wp.*,p.guid from wp_postmeta as wp inner join wp_posts as p on p.ID=wp.meta_value where wp.post_id='".$post_id."' and (meta_key='$slide_1' or meta_key='$slide_2' or meta_key='$slide_3' or meta_key='$slide_4' or meta_key='$slide_5' or meta_key='$slide_6' or meta_key='$slide_7' or meta_key='$slide_8' or meta_key='$slide_9' or meta_key='$slide_10' )" );
return $row_details;
}

?>
