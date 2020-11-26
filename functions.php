<?php
add_theme_support( 'post-thumbnails' );

require_once ( get_template_directory() . '/helpers/theme-settings.php' );
require_once ( get_template_directory() . '/helpers/custom-post-types.php' );

function add_theme_scripts()
{
  wp_enqueue_style('app.css', get_template_directory_uri() . '/dist/css/app.css');
  wp_enqueue_script('app.js', get_template_directory_uri() . '/dist/js/app.js', array (), 1.1, true);
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );