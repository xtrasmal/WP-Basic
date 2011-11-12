<?php
include_once WP_CONTENT_DIR . '/wpalchemy/MetaBox.php';

include_once WP_CONTENT_DIR . '/wpalchemy/MediaAccess.php';

if (is_admin()) wp_enqueue_style('wpalchemy-metabox', get_stylesheet_directory_uri() . '/metaboxes/meta.css');

/* eof */