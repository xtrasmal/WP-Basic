<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html <?php language_attributes(); ?>> 
<head>
<title><?php bloginfo( 'name' );?></title>
<meta name="description" content="Basic template" />
<meta name="keywords" content="basic, template, wordpress"/>
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" type="image/x-icon"/>
<!--[if lte IE 9]><link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/ie.css" type="text/css" media="screen" /><![endif]-->
<link type="text/css" href="<?php bloginfo('template_directory'); ?>/css/style.css" rel="stylesheet">
<script type="text/javascript">/* <![CDATA[ */
pathArray = window.location.pathname.split( '/' );
var adminURL = pathArray[0]+'/'+pathArray[1]+'/'+pathArray[2]+'/wp-admin';
if(document.addEventListener)document.addEventListener('onkeypress',alertkey,true);function alertkey(e){if(window.event)if(window.event.keyCode==26){if(confirm("Wil je de inhoud van deze website bewerken?"))parent.top.location=adminURL}if(!window.event)if((e&&e.which)||e.keyCode==26){if(e.keyCode==26||(e.which==122&&e.ctrlKey))if(confirm("Wil je de inhoud van deze website bewerken?"))parent.top.location=adminURL}}document.onkeypress=alertkey;
/* ]]> */
</script>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>