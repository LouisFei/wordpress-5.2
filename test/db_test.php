<?php

$array = array(
    '__FILE__' => __FILE__,         // 取得当前文件的绝对地址，结果：D:\www\test.php 
    'dirname(__FILE__)' => dirname(__FILE__), // 取得当前文件的绝对地址，结果：D:\www\test.php 
    'dirname(dirname(__FILE__))' => dirname(dirname(__FILE__))  //取得当前文件的上一层目录名，结果：D:\ 
);
echo "<pre>";
print_r($array);
echo "<pre>";

require_once( dirname(dirname(__FILE__)) . '/wp-load.php' );

if(!defined('ABSPATH')){
    exit('拒绝直接访问此脚本.');
}

// echo "<pre>";
// print_r($wpdb);
// echo "<pre>";



?>