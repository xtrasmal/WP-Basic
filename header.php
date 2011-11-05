<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html <?php language_attributes(); ?>> 
<head>
<title><?php bloginfo( 'name' );?></title>
<!-- Mimic Internet Explorer 7 -->
<meta charset=utf-8>
<meta name="description" content="Basic template" />
<meta name="keywords" content="basic, template, wordpress"/>
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" type="image/x-icon"/>
<!--[if lte IE 9]><link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/ie.css" type="text/css" media="screen" /><![endif]-->
<link type="text/css" href="<?php bloginfo('template_directory'); ?>/css/style.css" rel="stylesheet">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>