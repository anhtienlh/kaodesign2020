<?php
define('WP_AUTO_UPDATE_CORE', 'minor');// This setting is required to make sure that WordPress updates can be properly managed in WordPress Toolkit. Remove this line if this WordPress website is not managed by WordPress Toolkit anymore.
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'dannytua_kao_2020' );

/** MySQL database username */
define( 'DB_USER', 'dannytua_kao_2020' );

/** MySQL database password */
define( 'DB_PASSWORD', 'dannytua_kao_a@2020' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         '6} vp93UvL9wdz8?#!zBnzm0GJNG&aJvl|LJoOEY/aMp[i|~(hh_~_ M5;2rD2qd');
define('SECURE_AUTH_KEY',  '|.5AX]x@m:%hKDm|Mst`2S=l~{*Ztm8m9?]qT&<,z$}4`LcQtt4=zlgcz/[V[WET');
define('LOGGED_IN_KEY',    '}hD#~1{3{.62Vl|MQQ5E$kKgk*AD|#H&lswT}3:Y=2eQgo=@=@jX%XVe0q;8%|wg');
define('NONCE_KEY',        'pfMxX%EisYD*z+-B^d3KB={&DZ8T{ (cT4+5P~h*z??Ww.rU>DR*hnt  #gfvZ|?');
define('AUTH_SALT',        '|Z@vK/Kms`q/~y)%I,Q9apEi*Vme$cP[qk<_lH{rf83>upoq=<ODKv}t6=}Q[m,0');
define('SECURE_AUTH_SALT', 'ZJPFg|xX_{rUIFd7%L4St )8mFtphK&>w<@a+^Z@kGmSA1b[be(CZnD;p4654-n)');
define('LOGGED_IN_SALT',   '=|I|3sZyn4Tm@ngz@qwICDUD6)ntuWKj:eWO$hyo!-.9(i]O6HW4[, [K_XF6fe~');
define('NONCE_SALT',       'Q+U~%C2)nJeq0`M4rzaUw_6Iv.C]to&?oFz!fTtXM /;UtR_vy>-|p|@XY&#%>_;');
define('FS_METHOD', 'direct');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
