<?php

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('extra', 1024, '', true); // Large Thumbnail
    add_image_size('large', 768, '', true); // Large Thumbnail
    add_image_size('medium', 560, '', true); // Medium Thumbnail
    add_image_size('small', 250, '', true); // Small Thumbnail
    add_image_size('logo', 120, '', true); // Small Thumbnail
    add_image_size('container', 1400,  788, true);
    add_image_size('fullscreen', 1920,  1024, true);
    add_image_size('ultra', 2560,  1440, true);

}
/*------------------------------------*\
	Functions
\*------------------------------------*/

// HTML5 Blank navigation
function customblank_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

/**
* Check if website is a Live website
*/
function kj_is_live_domain(){
    // If is Local (8888) or Subdomain / on kayilesen.dev
    if(!str_contains($_SERVER['HTTP_HOST'], ':8888') && !str_contains($_SERVER['HTTP_HOST'], '.local:') && (substr_count($_SERVER['HTTP_HOST'], '.') < 2 || !str_contains($_SERVER['HTTP_HOST'], 'kayjilesen.dev'))) return true;
    return false;
}

// Include Scripts
require 'inc/scripts.php';


// Register Custom Blank Navigation
function register_custom_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'Hoofdmenu'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'Hoofdmenu'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'Hoofdmenu') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

function pagination($pages = "", $range = 4){
    $showitems = $range * 2 + 1;
    global $paged;
    
    if(empty($paged)) $paged = 1;
    
    if($pages == ''){
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages){
            $pages=1;
        }
    }

    if(1 != $pages){
        echo '<div class="pagination">';
        //echo '<span>Page ' . $paged . ' of ' . $pages . '</span>';
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
        if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
        
        for ($i=1; $i <= $pages; $i++){
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
                echo ($paged == $i)? '<span class="current">' . $i . '</span>' : '<a href="' . get_pagenum_link($i) . '" class="inactive">' . $i . '</a>';
            }
        }
        if ($paged < $pages && $showitems < $pages) echo '<a href="'  . get_pagenum_link($paged + 1) . '">Next &rsaquo;</a>';
        if ($paged < $pages-1 && $pages + $range - 1< $pages && $showitems < $pages) echo '<a href="' . get_pagenum_link($pages) . '">Last &raquo;</a>';
        echo '</div>';
    }
}

// Custom Excerpts
function customwp_index($length) // Create 20 Word Callback for Index page Excerpts, call using customwp_excerpt('customwp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using customwp_excerpt('customwp_custom_post');
function customwp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function customwp_excerpt($length_callback = '', $addLink = false)
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if ($addLink) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function custom_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'register_custom_menu'); // Add HTML5 Blank Menu
add_action('init', 'pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'customblankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'custom_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Add ACF Pro Options
if( function_exists('acf_add_options_page') ) {

    $parent = acf_add_options_page(array(
        'page_title'  => __('Thema settings'),
        'menu_title'  => __('Thema'),
        'redirect'    => false,
    ));
}

add_action( 'admin_init', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}

function create_posttypes() {
	register_post_type( 'Projecten',
		array(
			'labels' => array(
				'name' => __( 'Projecten' ),
				'singular_name' => __( 'Project' ),
				'new_item' => __('Nieuw project'),
				'add_new' => 'Nieuw project'
			),
			'public' => true,
			'has_archive' => false,
			'menu_icon' => 'dashicons-admin-home',
			'rewrite' => array('slug' => 'project'),
			'taxonomies' => array('category'),
			'supports' => array( 'title', 'thumbnail', 'editor' )
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttypes' );

add_filter( 'wp_lazy_loading_enabled', '__return_false' );


?>
