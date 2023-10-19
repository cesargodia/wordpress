<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'wordpress' );

/** Database password */
define( 'DB_PASSWORD', 'wordpress' );

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
define( 'AUTH_KEY',         '. Sx?#T&^z+%oQ;iP/E9X*e1(v2VBcWkoZ#mqvm{zk eaI:9C%YZW7g[XZT]LTF@' );
define( 'SECURE_AUTH_KEY',  'h7pP+rhQf@Whu3M7WvxkeigT:O)vcjg,`MW@D.y4.fKcqb5EiP1#,Qj;OJ*{k$`b' );
define( 'LOGGED_IN_KEY',    '?zZTf`5{jw<rBakkbnI/g$^NT0]IZMDd[iGPZM} ~dqFr?]`1-yVWt,qOCi>f<?@' );
define( 'NONCE_KEY',        'i*}@BmmnR ;#xC2UD[P6:~A$3c`?TEUN[U8g^@[9n|8<*{ 4^>!kO&6Ioa(2e`0q' );
define( 'AUTH_SALT',        'H`JX_O T}9lf.[b_j[Q$v@,L9{qfy9,0QyFk&gkfBK}wo5PCe}d}4q0I(]R 5%BT' );
define( 'SECURE_AUTH_SALT', 'o/&%7@y}HqYVgL]hN(1_$.e^Ay5m|V?9nU6^FVp{~MoD.[dLBwyU2M^D;B724|#u' );
define( 'LOGGED_IN_SALT',   'Fb0wh`6!Ol(s}ea?yJdQ{):3JtE fLznBMzQ@[P hV5CxQ?#UP{o[9}K>,v4a-i)' );
define( 'NONCE_SALT',       '@S%d$PH >8hhg(J}o*0r*2aUgFD8,fXZK%&+K?A~IK?EVCyKXS=uffE=+Pl+%ZgR' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
