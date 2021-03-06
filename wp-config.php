<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

if (strpos($_SERVER['REMOTE_ADDR'],"10.0.15")>-1 || strpos($_SERVER['REMOTE_ADDR'],"192.168.6")>-1) {
    define('WP_ENV', 'dev');
} else {
    define('WP_ENV', 'prod');
}
if (WP_ENV == 'dev') {
    define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] . '/wordpress');
    define('WP_HOME',    'http://' . $_SERVER['SERVER_NAME']);
    define('WP_CONTENT_DIR', $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/wp-content');
    define('WP_CONTENT_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/wp-content');

    define('DB_NAME', 'iei');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_HOST', 'localhost');
} else {
    define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] . '/wordpress');
    define('WP_HOME',    'http://' . $_SERVER['SERVER_NAME']);
    define('WP_CONTENT_DIR', $_SERVER['DOCUMENT_ROOT'] . '/wp-content');
    define('WP_CONTENT_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/wp-content');

	if($_SERVER['SERVER_NAME'] == "iei3c.org"){
		define('DB_NAME', 'iei');
		define('DB_USER', 'ieiadmin');
		define('DB_PASSWORD', 'Z9$rJ0CM@TFSR@d');
	}else{
		define('DB_NAME', 'iel');
		define('DB_USER', 'ieladmin');
		define('DB_PASSWORD', 'Z9$rJ0CM@TFSR@d');	
	}
	define('DB_HOST', 'localhost');	
}

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
