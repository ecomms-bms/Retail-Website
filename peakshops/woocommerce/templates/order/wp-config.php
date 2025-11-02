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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'dbifwxqdcpczvd' );

/** Database username */
define( 'DB_USER', 'uafgccbcj78ql' );

/** Database password */
define( 'DB_PASSWORD', 'zsekvcc3ij3q' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
define('FORCE_SSL_ADMIN', true);

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
define( 'AUTH_KEY',          'a.A=1+C$)Z7p`{F`&1:d^5VmvVc_K? _Ftv7pumlT`rEMql_x.^V`AC~tEG,KcUa' );
define( 'SECURE_AUTH_KEY',   '#H.)F$9D>%8Cgg9&EeoW]Y*_qnkbK]NnjRQGP#jas> ~#OP,G9F8OR_,wAt@+5(h' );
define( 'LOGGED_IN_KEY',     'h;rQ>NO--Ib&{NFS+`p(yWc0|,N)~N4<!2+AAc:=K:|.n})4D97=HZ]L{DgO~FcL' );
define( 'NONCE_KEY',         'o*8{hn46PWV4+`bCQuO.wM8:9k`*gO11/w[N6b:D;ej`,m*mx#Eg5(kN$paTBd_1' );
define( 'AUTH_SALT',         'iPnuqc+&7 ESdC3y>pVS=.:gR=TH9gob %[9LU6LV$WO$d!n#GmcpK{+^6Cy]]H0' );
define( 'SECURE_AUTH_SALT',  'n*/ZvKAfrOR1D@x0:UR.kgmgrQyK?Lv/W!WY#I5;p9KRe+e4%SiCo)EAwVU8+*zq' );
define( 'LOGGED_IN_SALT',    '^f?e-)+DGyBEYUFu9w<R.oV@q]H^}NX:eZ3U`0Dx<67m}S+gN!Lv|kqtY5.1-3bZ' );
define( 'NONCE_SALT',        '|H5d^}I|v~Kz.=MkG{xDWP)XK@u)KNHGDneaF|_^>@9v]-R99<pwdg!=mGb*%adl' );
define( 'WP_CACHE_KEY_SALT', 'yIN_?}6S%WG>6ZjNR|X!Xw*UynwIzWjYKC^ G71jFI&_hB{L;Q5^#irlp+ScU1AO' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ksz_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
@include_once('/var/lib/sec/wp-settings-pre.php'); // Added by SiteGround WordPress management system
require_once ABSPATH . 'wp-settings.php';
@include_once('/var/lib/sec/wp-settings.php'); // Added by SiteGround WordPress management system
