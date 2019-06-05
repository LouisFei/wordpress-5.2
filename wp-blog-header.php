<?php
/**
 * Loads the WordPress environment and template.
 *
 * @package WordPress
 */

if ( ! isset( $wp_did_header ) ) {

	//确保每次刷新时，wp-blog-header.php 文件只执行一次。
	$wp_did_header = true;

	// Load the WordPress library.
	// 初始化
	require_once( dirname( __FILE__ ) . '/wp-load.php' );

	// Set up the WordPress query.
	// 内容处理阶段，wp() 位于function.php中。
	wp();

	// Load the theme template.
	// 主题应用。
	require_once( ABSPATH . WPINC . '/template-loader.php' );

}
