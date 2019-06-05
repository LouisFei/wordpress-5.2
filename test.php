<?php

require_once( dirname( __FILE__ ) . '/wp-load.php' );

if(!defined('ABSPATH')){
    exit('拒绝直接访问此脚本.');
}

// echo get_theme_root_uri(); // 存放主题的目录  /wp-content/themes
// echo get_theme_root(); // 存放主题的目录的服务器绝对路径 F:\php\wordpress/wp-content/themes
// echo get_theme_roots(); // /themes

$array = array(
    'title' => '常用路径函数',
    'home_url()' => home_url(),
    'home_url(\'/images/\')' => home_url('/images/'),
    'site_url()' => site_url(),
    'admin_url()' => admin_url(),
    'content_url()' => content_url(),
    'includes_url()' => includes_url(),
    'includes_url(\'/js/\')' => includes_url('/js/'),
    'wp_upload_dir()' => wp_upload_dir(),
    'get_theme_root_uri()' => get_theme_root_uri(),
    'get_theme_root()' => get_theme_root(),
    'get_theme_roots()' => get_theme_roots(),
    'get_stylesheet_directory()' => get_stylesheet_directory(),
    'get_stylesheet()' => get_stylesheet(),
    'get_template()' => get_template(),
    'get_stylesheet_directory_uri()' => get_stylesheet_directory_uri(),
    'GET_TEMPLATE_DIRECTORY_URI()' => GET_TEMPLATE_DIRECTORY_URI(),
    'GET_TEMPLATE_DIRECTORY()' => GET_TEMPLATE_DIRECTORY(),
    'plugins_url()' => plugins_url(),
    'WP_CONTENT_DIR' => WP_CONTENT_DIR,
    //'WP_SETUP_CONFIG' => WP_SETUP_CONFIG
);

echo "<pre>";
print_r($array);
echo "<pre>";

// echo "<pre>";
// print_r($wp);
// echo "<pre>";


//https://www.w3cschool.cn/php/php-isset.html
//isset() — 检测变量是否设置。
$var1 = '';
$var2;
$array2 = array(
    '$var1' => isset($var1),
    '$var2' => isset($var2),
);
echo '<pre>';
print_r($array2);
echo '</pre>';

$user = wp_get_current_user();
echo '<pre>';
print_r($user);
echo '</pre>';