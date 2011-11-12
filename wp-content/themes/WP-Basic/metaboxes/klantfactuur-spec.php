<?php

$wpalchemy_media_access = new WPAlchemy_MediaAccess();
$klantfactuur_mb = new WPAlchemy_MetaBox(array
(
	'id' => '_klantfactuur_meta',
	'title' => 'Facturen',
	'types' => array('klanten'), 
	'template' => get_stylesheet_directory() . '/metaboxes/klantfactuur-meta.php',
));

/* eof */