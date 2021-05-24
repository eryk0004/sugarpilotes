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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'piotrmunk_dk' );

/** MySQL database username */
define( 'DB_USER', 'piotrmunk_dk' );

/** MySQL database password */
define( 'DB_PASSWORD', 'K3uilfqz#' );

/** MySQL hostname */
define( 'DB_HOST', 'piotrmunk.dk.mysql' );

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
define( 'AUTH_KEY',         '+qknD^Li87diT:I@+K5WM5+bZW.HQNfhQdX&6dh7#gw-syheW[^r#>1]MD!Ac4j9' );
define( 'SECURE_AUTH_KEY',  'fjv.j<{?(HEOs@Pf/M1~;~)Il]1SMI,6 ;C:Gs:[D25T|w3,OnTd)5O()5db-b:[' );
define( 'LOGGED_IN_KEY',    'Mv>!%gvjBxM9s*^ONZ.t[naD. qf,vs;Uf@CGA0wt!;IT:m)xJ)K!Qn~9*$:$Pda' );
define( 'NONCE_KEY',        '_.Wnue$(5HP(/E}vFJYz+4K*.O?<3m~@d*^8y IWZMeTka5Hij!h`R6*P8-bs8f9' );
define( 'AUTH_SALT',        '8rnsE;kDa`JK3+3?{8yvK .:.lF{y5-2O_O!q5p9Jnc<Z)i`aDY*F+xpyf@@V>;#' );
define( 'SECURE_AUTH_SALT', 'WN} %U:+W 2%|o/0^@9TeMv/jf&3ug]4,?I[u>F.iy3mvg2sd]yrku]U`,vpu!~h' );
define( 'LOGGED_IN_SALT',   't+P:-FDD6*=yL}kAn0dD1@LX<fr8K_0N0zWRw#DbU&z:Y1U0PAg1(3=q>DDUs,r~' );
define( 'NONCE_SALT',       'V)f$bux^4I>p@9kcmCIJNwm46aIH7v`/Q5grH$OZ7`_t@R>#cpwd;^l;n0=k)FFC' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'sugarpilots_wp_';

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
