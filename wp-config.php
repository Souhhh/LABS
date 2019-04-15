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
define( 'DB_NAME', 'LABS' );

/** MySQL database username */
define( 'DB_USER', 'admin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'admin' );

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
define( 'AUTH_KEY',         '$Y5)o1Fsbq,$@:kmB6*yV6!,R%Mn{Q)c=v(Nq1T,D3B|)$e^-TzP1K7AfE]IE[yw' );
define( 'SECURE_AUTH_KEY',  'O2J~ hVcuLSrQqy-/?ayU]#A.#[]<OuS`!T4.IT(qM(P7(|!ZX_4[k=t. ^D4V-`' );
define( 'LOGGED_IN_KEY',    '(AMAO`P}Vmwqdeq}`IFmaDI`;XVQ!lSCUWZZ*: nj oq8L{Lb;#z^>n*(__h4Gmm' );
define( 'NONCE_KEY',        '(A7/, #l~.@==^SK**uhdbuP+bp0k6SyJ<1Yt}I.6UPG:xg%ZH_x(29F5=!:Fs_>' );
define( 'AUTH_SALT',        '!LmR;.5X-6UF+W7;+;r*3+ON=](HN%3En;]m%w2+p^_9vW=mOF.a6;x3,tR=yq$a' );
define( 'SECURE_AUTH_SALT', ')a*x^Qb2YaTbKkJr[1H,I{mlqS[R%]yL,K(cY=ux.7^T2tqQG7Gy?..&<{%XKwy1' );
define( 'LOGGED_IN_SALT',   '#Wf?LOSm(B%V,y93/W5&vOhylm:q:U>je_o_ihp6E$x)J_T%>E&,&QT leOxFIf1' );
define( 'NONCE_SALT',       'pdJZNXpH|12?[JjJ?$H8ps@^pBMc` y~kl}}t)~fhqex3vw:(ThJ;gb+mr=(179F' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'mg_';

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
