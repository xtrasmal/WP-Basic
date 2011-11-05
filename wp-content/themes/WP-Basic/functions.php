<?php
// Menu items verbergen
function remove_menus () {
global $menu;
	//$restricted = array(__('Dashboard'), __('Posts'), __('Links'),  __('Appearance'), __('Tools'), __('Users'), __('Settings'), __('Comments'), __('Plugins'));
	//$restricted = array(__('Dashboard'), __('Appearance'), __('Links'), __('Tools'), __('Users'), __('Settings'), __('Comments'), __('Plugins'));
	$restricted = array(__('Links'), __('Comments'), __('Tools'));	
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
	}
}
add_action('admin_menu', 'remove_menus');

// custom admin login logo
function custom_login_logo() {
	echo '<style type="text/css">
	h1 a { background-image: url('.get_bloginfo('template_directory').'/images/custom-login-logo.png) !important; }
	</style>';
}
add_action('login_head', 'custom_login_logo');
// Custom admin header logo
function my_custom_logo() {
echo '
<style type="text/css">
#header-logo { background-image:
url(http://localhost/Wordpress/Reesinkhorses/wp-content/themes/reesink/images/adminicon.png)
!important; }
</style>
';
}
add_action('admin_head', 'my_custom_logo');
// Admin css
function custom_css() {
   echo '<style type="text/css">@import url("'?><?php bloginfo('template_directory');?><?php echo '/css/admin.css");</style>';
}
add_action('admin_head', 'custom_css');	
	
// Media library column
function upload_columns($columns) {
	unset($columns['parent']);
	$columns['better_parent'] = "Parent";
	return $columns;
}
 function media_custom_columns($column_name, $id) {

	$post = get_post($id);

	if($column_name != 'better_parent')
		return;

		if ( $post->post_parent > 0 ) {
			if ( get_post($post->post_parent) ) {
				$title =_draft_or_post_title($post->post_parent);
			}
			?>
			<strong><a href="<?php echo get_edit_post_link( $post->post_parent ); ?>"><?php echo $title ?></a></strong>, <?php echo get_the_time(__('Y/m/d')); ?>
			<br />
			<a class="hide-if-no-js" onclick="findPosts.open('media[]','<?php echo $post->ID ?>');return false;" href="#the-list"><?php _e('Opnieuw koppelen aan'); ?></a>

			<?php
		} else {
			?>
			<?php _e('(Unattached)'); ?><br />
			<a class="hide-if-no-js" onclick="findPosts.open('media[]','<?php echo $post->ID ?>');return false;" href="#the-list"><?php _e('Koppelen aan'); ?></a>
			<?php
		}
}
add_filter("manage_upload_columns", 'upload_columns');
add_action("manage_media_custom_column", 'media_custom_columns', 0, 2);

// Verwijderen van post,page editor options
function remove_post_type_support_for_pages() 
{
    // UNCOMMENT if you want to remove some stuff
    // Replace 'page' with 'post' or a custom post/content type
    # remove_post_type_support( 'page', 'title' );
    # remove_post_type_support( 'page', 'editor' );
    # remove_post_type_support( 'page', 'thumbnail' );
    # remove_post_type_support( 'page', 'page-attributes' );
    # remove_post_type_support( 'page', 'excerpt' );
}
add_action( 'admin_init', 'remove_post_type_support_for_pages' );

// Menu registratie
add_action( 'init', 'register_my_menu' );

function register_my_menu() {
	register_nav_menu( 'primary-menu', __( 'Primary Menu' ) );
}

// Sidebars
if ( function_exists('register_sidebar') )
	register_sidebar( array(
		'name' => __( 'Recent Nieuws'),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area'),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));

// Gallerij styling weghalen
add_filter( 'gallery_style', 'my_gallery_style', 99 );
function my_gallery_style() {
    return "<div class='impressiebox'>";
}
// Submenu items weghalen
function delete_submenu_items() {
		//remove_submenu_page( 'themes.php', 'widgets.php' );
		//remove_submenu_page( 'themes.php', 'themes.php' );
		//remove_submenu_page( 'themes.php', 'theme-editor.php');
}
add_action( 'admin_init', 'delete_submenu_items' );
// Breadcrumbs
function the_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
		echo get_option('home');
		echo '">';
		bloginfo('name');
		echo "</a>";
		echo '<p>&nbsp;»&nbsp;</p>';
		if (is_category() || is_single()) {
			single_cat_title();
			if (is_single()) {
				the_category();
				echo '<ul class="post-categories"><li>';
				echo "&nbsp;»&nbsp;";	
				the_title();
				echo " </li></ul>";
			}					
		}
		elseif (is_page()) {
			echo the_title();
		}
		elseif (is_tag()) {single_tag_title();}
		elseif (is_day()) {the_time('F jS, Y');}
		elseif (is_month()) {the_time('Y » F');}
		elseif (is_year()) {the_time('Y');}
		elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "Blog Archives";}
	}
	else {
		echo '<a href="';
		echo get_option('home');
		echo '">';
		bloginfo('name');
		echo "</a>";
		echo '<p>&nbsp;»&nbsp;</p>';	
		wp_title('');	
	}
}
// User redirect naar home
add_filter("login_redirect", "subscriber_login_redirect", 10, 3);  
    function wp_demo_login_redirect($redirect_to, $request, $user){  
      if(is_array($user->roles)){  
        if(in_array('administrator', $user->roles)) return home_url('/wp-admin/');  
      }  
      return home_url();  
    } 
// WP versie weg
remove_action('wp_head', 'wp_generator');   
// Scripts laden in de footer
function add_scripts(){
$jquery_url = 'http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js';
$script_url = get_template_directory_uri() . '/js/scripts.js';
$prettyphoto_url = get_template_directory_uri() . '/js/jquery.prettyPhoto.js';
$mediaquery_url = get_template_directory_uri() . '/js/css3-mediaqueries.js';
$imgpreload_url = get_template_directory_uri() . '/js/jquery.imgpreload.min.js';
// Bestaande jQuery uitschakelen
wp_deregister_script('jquery');
wp_register_script('jquery');
wp_enqueue_script('jquery');
// Mijn scripts
wp_enqueue_script('do_jquery', $jquery_url, array('jquery'),null, true );
wp_enqueue_script('do_pretty', $prettyphoto_url, array('jquery'),null, true );
wp_enqueue_script('do_mediaquery', $mediaquery_url, array('jquery'),null, true );
wp_enqueue_script('do_imgpreload', $imgpreload_url, array('jquery'),null, true );
wp_enqueue_script('do_scripts', $script_url, array('jquery'),null, true );
}
add_action('init','add_scripts');
?>