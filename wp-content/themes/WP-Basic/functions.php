<?php
//*********************************************************
// CPT
//*********************************************************
include_once 'cpt/cpt-client.php';
//*********************************************************
// WP alchemey stuff
//*********************************************************

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
//*********************************************************
// Style stuff
//*********************************************************
// Logo login
function custom_login_logo() {
	echo '<style type="text/css">
	h1 a { background-image: url('.get_bloginfo('template_directory').'/images/custom-login-logo.png) !important; }
	</style>';
}
add_action('login_head', 'custom_login_logo');
// Icon admin
function my_custom_logo() {
echo '
<style type="text/css">
#header-logo { 
background-image: url('.get_bloginfo('template_directory').'/images/custom-admin-logo.png) !important;
height: 35px;width: 51px;
margin: 0px !important;
display:none !important;
}
#wphead {
padding-bottom: 4px;
}
</style>
';
}
add_action('admin_head', 'my_custom_logo');
// Admin css
function custom_css() {
   echo '<style type="text/css">@import url("'?><?php bloginfo('template_directory');?><?php echo '/css/admin.css");</style>';
}
add_action('admin_head', 'custom_css');	
//*********************************************************	
// Tweaks
//*********************************************************
// Media bieb altijd 
add_filter('get_media_item_args', 'allow_img_insertion');
function allow_img_insertion($vars) {
    $vars['send'] = true; // 'send' as in "Send to Editor"
    return($vars);
}
// WP versie weg
remove_action('wp_head', 'wp_generator');  
//*********************************************************
// Activatie . menu . sidebars
//*********************************************************
// Menu registratie
add_action( 'init', 'register_my_menu' );

function register_my_menu() {
	register_nav_menu( 'primary-menu', __( 'Primary Menu' ) );
}
//*********************************************************
// Javascripts
//*********************************************************
//*********************************************************
// CSS
//*********************************************************
include_once 'metaboxes/setup.php';
include_once 'metaboxes/klantinfo-spec.php';
include_once 'metaboxes/klantfactuur-spec.php';
//include_once 'metaboxes/simple-spec.php';
//include_once 'metaboxes/checkbox-spec.php';
//include_once 'metaboxes/radio-spec.php';
//include_once 'metaboxes/select-spec.php';
?>