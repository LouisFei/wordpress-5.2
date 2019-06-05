<?php
/**
 * Front to the WordPress application. 
 * 打开WordPress应用程序。
 * This file doesn't do anything, but loads wp-blog-header.php which does and tells WordPress to load the theme.
 * 这个文件不做任何事情，但是加载wp-blog-header.php去做，并告诉WordPress加载主题。
 *
 * @package WordPress
 */

// echo __FILE__; //F:\php\wordpress\index.php
// echo '<br/>';
// echo dirname( __FILE__ ); //F:\php\wordpress
// exit();

/**
 * Tells WordPress to load the WordPress theme and output it.
 * 告诉WordPress加载WordPress主题并输出它。
 *
 * @var bool
 */
define( 'WP_USE_THEMES', true );

/** Loads the WordPress Environment and Template */
// 加载环境变量和模板
require( dirname( __FILE__ ) . '/wp-blog-header.php' );
