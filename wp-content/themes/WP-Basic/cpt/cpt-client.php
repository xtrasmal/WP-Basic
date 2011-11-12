<?php
// CPT AANMAKEN
add_action( 'init', 'maak_klanten_cpt' );
function maak_klanten_cpt() {
  $labels = array(
    'name' => _x('Klanten', 'post type general name'),
    'singular_name' => _x('Klant', 'post type singular name'),
    'add_new' => _x('Klant toevoegen', 'klanten'),
    'add_new_item' => __('Voeg klant toe'),
    'edit_item' => __('Bewerk klant'),
    'new_item' => __('Nieuw klant'),
    'all_items' => __('Alle klanten'),
    'view_item' => __('Bekijk klant'),
    'search_items' => __('Zoek klant'),
    'not_found' =>  __('Geen klanten gevonden'),
    'not_found_in_trash' => __('Geen klanten in de prullenbak'), 
    'parent_item_colon' => '',
    'menu_name' => 'Klanten'

  );
    $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array('slug' => 'klanten'),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => 20,
    'supports' => array('title','thumbnail')
  ); 
  register_post_type('klanten',$args);
}
// CPT COLUMNS

// CPT ICON TOEVOEGEN
add_action( 'admin_head', 'cpt_icons' );
function cpt_icons() {?>
	<style type="text/css" media="screen">
		.js.folded #adminmenuwrap{
		background-image: url("http://www.extrasmal.nl/extrasmal_1.png");
		background-position: left top;
		background-repeat: no-repeat;
		padding-top:62px;
	}	
	#adminmenuwrap {
		background-image: url("http://www.extrasmal.nl/test.png");
		background-position: center top;
		background-repeat: no-repeat;
		padding-top: 59px;
		position: relative;
	}	
	div.icon32-posts-klanten{
		background: url(<?php bloginfo('template_url') ?>/cpt/cpt-icons/crown.png) no-repeat 6px -17px !important;
	}
	#menu-posts-klanten .wp-menu-image {
		background: url(<?php bloginfo('template_url') ?>/cpt/cpt-icons/crown.png) no-repeat 6px -17px !important;
	}
	#menu-posts-klanten:hover .wp-menu-image, #menu-posts-klanten.wp-has-current-submenu .wp-menu-image {
		background-position:6px 7px!important;
	}
    </style>
<?php } ?>