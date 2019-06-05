<?php
/**
 * The base configuration for WordPress
 * WordPress的基本配置
 *
 * The wp-config.php creation script uses this file during the installation. 
 * 在安装过程中，使用到这个脚本文件
 * 
 * You don't have to use the web site, you can copy this file to "wp-config.php" and fill in the values.
 * 您不必使用该网站，您可以将此文件复制到“wp-config”。并填写值。
 *
 * This file contains the following configurations:
 * 此文件包含以下配置:
 *
 * * MySQL settings  MySQL的设置
 * * Secret keys 密钥
 * * Database table prefix 数据库表前缀
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress1' );

/** MySQL database username */
define( 'DB_USER', 'wpuser' );

/** MySQL database password */
define( 'DB_PASSWORD', 'wp@123' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '&u-uV}|:VDFeLtk?2jg E~+%55MfE>+#ySL4L:wvC_w%t{OwX1wPCd5Mnj`G)5@5' );
define( 'SECURE_AUTH_KEY',  'r1ub*C*0WEX<WH5Ru.!X7w]Q:F>RIKmKLJK>K57^I6Iw:EoC-sz(GBqc{uFZP|bc' );
define( 'LOGGED_IN_KEY',    'ijS[iYnu718>*)16ISi)`]z.dM|Q6w!/^A3EMKN#RZKr=6UKospJHl-)s%V5^roX' );
define( 'NONCE_KEY',        'SDDl[?X?I&!J4Sj%)9mpdF7;fZ(8WP2_Y33ak;4;ioH:;CLu 66+Qlj>t9q-me=O' );
define( 'AUTH_SALT',        'lWN60A*tZ.1u;{|Cpcm+_B| k:*gbzFhNIcZh|zG)>$U|vt};e7[~Tw3!9U/8F,U' );
define( 'SECURE_AUTH_SALT', 'Rt1#<$46r/+Mw[BF )-.8-3el(Cp_tz6=c}x2N+jG[:qGJ,s$jG#)QobpEX(E A/' );
define( 'LOGGED_IN_SALT',   '9mv5RtB%).Z&Xlv&Bs&M4!41YX^`k)hd{x5F%21NE3/@x=Jqz.MnHE@5{*W^ozAF' );
define( 'NONCE_SALT',       'w5a_:%rdUGc2=<{4=)dKP4iJy[U!!u?}c;_tgj0/CYe#0 K$MWhPO(M]gb%imv&8' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 * WordPress数据库表前缀。
 *
 * You can have multiple installations in one database if you give each a unique prefix. 
 * 如果给每个数据库一个惟一的前缀，则可以在一个数据库中安装多个安装。
 * Only numbers, letters, and underscores please!
 * 只允许数字、字母和下划线!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 * 开发人员:WordPress调试模式。
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', true );

//实现绑定多个域名，即取消域名绑定限制的方法，支持http,https
if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
	$uri = 'https://';	
} else {
	$uri = 'http://';
}
define('WP_SITEURL', $uri . $_SERVER['HTTP_HOST']);
define('WP_HOME', $uri . $_SERVER['HTTP_HOST']);
//修改静态文件地址
define('WP_CONTENT_URL', '/wp-content');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );

/** 强制后台和登录使用 SSL **/
// define('FORCE_SSL_LOGIN', true);
// define('FORCE_SSL_ADMIN', true);