<?php
/**
 * Bootstrap file for setting the ABSPATH constant and loading the wp-config.php file. 
 * 引导文件，用于设置ABSPATH常量并加载wp-config.php文件。
 * The wp-config.php file will then load the wp-settings.php file, which will then set up the WordPress environment.
 * wp-config.php文件将加载wp-settings.php文件，该文件将设置WordPress环境。
 *
 * If the wp-config.php file is not found then an error will be displayed asking the visitor to set up the wp-config.php file.
 * 如果没有找到wp-config.php文件，则会显示一个错误，要求访问者设置wp-config.php文件。
 *
 * Will also search for wp-config.php in WordPress' parent directory to allow the WordPress directory to remain untouched.
 * 还将在WordPress的父目录中搜索wp-config.php，以保持WordPress目录不变。
 *
 * @package WordPress
 */

/** Define ABSPATH as this file's directory */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

error_reporting( E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_ERROR | E_WARNING | E_PARSE | E_USER_ERROR | E_USER_WARNING | E_RECOVERABLE_ERROR );

// echo ABSPATH; //F:\php\wordpress/
// echo '<br/>'; 
// echo dirname( ABSPATH );//F:\php
// exit();

/*
 * If wp-config.php exists in the WordPress root, or if it exists in the root and wp-settings.php doesn't, load wp-config.php. 
 * 如果wp-config.php存在于WordPress根目录中，或者它存在于根目录中而wp-settings.php不存在，则加载wp-config.php。
 * The secondary check for wp-settings.php has the added benefit of avoiding cases where the current directory is a nested installation, e.g. / is WordPress(a) and /blog/ is WordPress(b).
 * php的第二个检查还有一个额外的好处，可以避免当前目录是嵌套安装的情况，例如/ is WordPress(a)和/blog/ is WordPress(b)。
 *
 * If neither set of conditions is true, initiate loading the setup process.
 * 如果这两组条件都不为真，则启动加载安装过程。
 */
if ( file_exists( ABSPATH . 'wp-config.php' ) ) {

	/** The config file resides in ABSPATH */
	require_once( ABSPATH . 'wp-config.php' );

} elseif ( @file_exists( dirname( ABSPATH ) . '/wp-config.php' ) && ! @file_exists( dirname( ABSPATH ) . '/wp-settings.php' ) ) {

	/** The config file resides one level above ABSPATH but is not part of another installation */
	//配置文件位于ABSPATH之上的一层，但不属于其他安装的一部分
	require_once( dirname( ABSPATH ) . '/wp-config.php' );

} else {

	// A config file doesn't exist
	// 配置文件不存在

	define( 'WPINC', 'wp-includes' );
	require_once( ABSPATH . WPINC . '/load.php' );

	// Standardize $_SERVER variables across setups.
	wp_fix_server_vars();

	require_once( ABSPATH . WPINC . '/functions.php' );

	$path = wp_guess_url() . '/wp-admin/setup-config.php';

	/*
	 * We're going to redirect to setup-config.php. While this shouldn't result
	 * in an infinite loop, that's a silly thing to assume, don't you think? If
	 * we're traveling in circles, our last-ditch effort is "Need more help?"
	 */
	if ( false === strpos( $_SERVER['REQUEST_URI'], 'setup-config' ) ) {
		header( 'Location: ' . $path );
		exit;
	}

	define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
	require_once( ABSPATH . WPINC . '/version.php' );

	wp_check_php_mysql_versions();
	wp_load_translations_early();

	// Die with an error message
	$die = sprintf(
		/* translators: %s: wp-config.php */
		__( "There doesn't seem to be a %s file. I need this before we can get started." ),
		'<code>wp-config.php</code>'
	) . '</p>';
	$die .= '<p>' . sprintf(
		/* translators: %s: Codex URL */
		__( "Need more help? <a href='%s'>We got it</a>." ),
		__( 'https://codex.wordpress.org/Editing_wp-config.php' )
	) . '</p>';
	$die .= '<p>' . sprintf(
		/* translators: %s: wp-config.php */
		__( "You can create a %s file through a web interface, but this doesn't work for all server setups. The safest way is to manually create the file." ),
		'<code>wp-config.php</code>'
	) . '</p>';
	$die .= '<p><a href="' . $path . '" class="button button-large">' . __( 'Create a Configuration File' ) . '</a>';

	wp_die( $die, __( 'WordPress &rsaquo; Error' ) );
}
