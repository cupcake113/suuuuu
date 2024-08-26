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
define( 'DB_NAME', 'asd' );

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
define( 'AUTH_KEY',         '.*5h{7G*Hc7-MqjFJ`sH/@s4y$yqeW.,]v_g}N>{8[I+(YwEKZiM;VEX`5-Y5:P,' );
define( 'SECURE_AUTH_KEY',  ')OJ9,XR}=A9NqM^|?]&jtaqn_vj5_6hK;ghayhy#6GF*j/Z-=j0[<3:Z;! pa/#z' );
define( 'LOGGED_IN_KEY',    'C/*|n6umtL}K+H%Vw$If^M--xfU}F6Ur9Z ;B%Yu_{ff}*It?ntJeMEi}(2n278a' );
define( 'NONCE_KEY',        'GG[al[8>ijSvZC&B=-bvO;qN(lG3m:T06Lx>a*,S@ew3wh2fT0tk8KoCX,V@XR0x' );
define( 'AUTH_SALT',        'y&HS02iVmk*u3k(e<Y(P/yXR}.Ta9va(hOP6snP(XL^n#S:{80=Whi}&M&ylSsDf' );
define( 'SECURE_AUTH_SALT', 'h2r3mJ`-5#R1kjQ8$U<l_K$`~Pr~2bCR7cDfA#~Y|+**)Yq9u?<_doArt_a1;>?W' );
define( 'LOGGED_IN_SALT',   '+qYxls,,H$omEQq?,FBgr6|rSQoq3=[!L}c=yzAAV#-y+gvFh/j2(q-wx~*iS9da' );
define( 'NONCE_SALT',       ')@@@o.`F|pzx2n.hdP_|h{<v2#x:B|`ma2r3OZ ;bgb02/3#@vUuWH2}N) Z* dz' );

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
