<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'african aviation advocates' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'sCm]/XTJ;21p*>/4G|uS3SDVxxU{r7o596{~]:Dbvk+F-c~VVevLwjV&]Wt@1vp2' );
define( 'SECURE_AUTH_KEY',  'xLW$Zfdq69htupYM? #b5}lEDnDI,)L[u!=/<uN[-ISB/o2AN[]aWy:92e#u.A=u' );
define( 'LOGGED_IN_KEY',    'b<thHWufBu-Y%2|FzH!PpH<u$f3]$|@C/|%})}418y!PC|DL9/81%z!p]:25RU+ ' );
define( 'NONCE_KEY',        '7zPxN[g~p]GCjR%rTVsIxf/WH{4plH+Qx3(8&o%Ozw$$h}!s)8vA)q1:bg{B,voB' );
define( 'AUTH_SALT',        '7P!Ta}[cgZ^LVfH|_LTX>7F>{b{Hb~  Sx?&3! gc2bHZ<Vv5]*IAZ:!C4 nN1h8' );
define( 'SECURE_AUTH_SALT', '^7Ng^q^KnPU`A`;,nE#iWB[?P+~hY]/p=7J5%0dWvYh,dQOSI7#Z-}?`EdS7}qt2' );
define( 'LOGGED_IN_SALT',   'G,aTi1O8bVDb3^r@]:|o.t^_]&V2^&`JBT,^?zr?AUS+lm.]8(7E]1#TyAGZCfl.' );
define( 'NONCE_SALT',       'wr@y# Q=;[i(hc=@vumO,4a|t7`j,t20-jN5@:-Gkt@wZ)Rp/9AeCj+~{@`yjb=4' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
