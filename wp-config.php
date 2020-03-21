<?php
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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'amit_airi_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'K@oGJaAyok@r+2RP#%3!T>C$V0mM+G;a$jF3)4+n4bM}L#bX`LM+k-;^(V4KdfpE' );
define( 'SECURE_AUTH_KEY',  '$R!XrC}~l/3@}~@V1_<69CUxA&mvoN-Shz?X-F;a05i:+R1u:>*]>|SNC<!k>c,*' );
define( 'LOGGED_IN_KEY',    'CN^&pA$eS_rr%WIr3V68%D]YM5qxC_N>Bya5L0watncuakA_JYa.#AG:u=#.oJju' );
define( 'NONCE_KEY',        'ZBfl!qaAOFk7~<tRyPr%4RP1b$XkTw3FfAckH-:=H>]30+_GALg~ytM^FN9wktW ' );
define( 'AUTH_SALT',        'G[c}>Y#h[ax8$IRJ-L -]IrYK;#}WX.TJ1x)HW`K?w7$,LUTCF;;7=n/2bR$/?jg' );
define( 'SECURE_AUTH_SALT', 'H*&&+]WbCOc!*`+<y*=x&Df%cEG3B~@/|aeR`XW~hkX})#+%A/ on%6!.Sed}9!*' );
define( 'LOGGED_IN_SALT',   '{mNy${IDPEAs/%an*e^D$|w-O3YP_I.sliZKb)gAV/jm&<CY(XY~1%Jz(w[m}<b@' );
define( 'NONCE_SALT',       '1n<bZ6]sgP98C,x+K,6Ywur,,6ZN7w;[y2SY&>~iW~n@/d(+Mxa_90dhE%z^(i!o' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'pc911_';

/**
 * For developers: WordPress debugging mode.
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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
