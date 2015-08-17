<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'zZ|o0*sYaU]eA5(kHQhZBCNj^;$C-b/9DENLO9<=qJj:TKrn@Dne]/&-Y)0j-UAo');
define('SECURE_AUTH_KEY',  'mjJUY!d7+S<Afz l0{@%EHwZo@$Dopxr,OPfnoR.|z:/SuM~c*IV|c*Nzz+Y!2:j');
define('LOGGED_IN_KEY',    'u!HAMy@- (.!|I-iE.`(]6J%]f+M~1HO[XX2B5sQH5mxE`Vs+c{xt|Y#d-rkHXPl');
define('NONCE_KEY',        's33{2JiAl/gF|CVa1+X9v3P4EB9#,}rQ<DSvO<d~|!B^B2ROmXCg*s /dCy~Q_;}');
define('AUTH_SALT',        'h[l0xCLtm0h9ysd^q2Uif1ciXpy$FkHqZ.G?vRKLh&ni{yc#oUTK}G-:#<!UIJiG');
define('SECURE_AUTH_SALT', 'V7;urcgaT2)WA%{/!8dS]y`<;k^h*2JdE|icC,;YfBB@Tx@a,+!FR !%|=tpuJS1');
define('LOGGED_IN_SALT',   'vuO*ZQj*vhcC*J->rLKoG&#~@>kQK|/f28:xrl,@|wJY}L7UC+@_+s@7G+0?`93{');
define('NONCE_SALT',       'IZ{hp9)+PFm2`oDw,sptG)&vLAHN*}|a@ylw|oOK~.%P&OVFgR#5MIn-xkv8,8AH');

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
