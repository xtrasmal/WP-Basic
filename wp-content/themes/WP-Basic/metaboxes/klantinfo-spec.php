<?php

$klantinfo_mb = new WPAlchemy_MetaBox(array
(
	'id' => '_klantinfo_meta',
	'title' => 'Klant informatie',
	'types' => array('klanten'),
	'template' => get_stylesheet_directory() . '/metaboxes/klantinfo-meta.php'
));

/* eof */