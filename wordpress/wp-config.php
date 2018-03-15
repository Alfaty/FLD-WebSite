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
define('DB_NAME', 'fldDb');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'HF:)a~zm2LK%$]:k;0$S:7LzG@ylnJ@AV4{L)<g{4*8%3W~$7a|;t1+:ADkpc)XQ');
define('SECURE_AUTH_KEY',  '`9kTurYo2z5ddIWTf0j_`|wmFW}mdb%*T1y>heb63>$|YW)>wiL^(]>j$^v@%6{T');
define('LOGGED_IN_KEY',    ',Nky0rx3RVa;RE*?4z-h8=JLJ{XsH5cE[GDl&Cqv6vf#/Aw[Hh73NZined26_*66');
define('NONCE_KEY',        'Pm/uma2?1emrWn]v3z)RVls+5`*1or$U+5a;f^HRB_k_uR5ec`x(%#H aMZ%l ^K');
define('AUTH_SALT',        '&:-rNmckD_=G]e*MYNd1Q#DFscmY_NeM|/xlF2`iR$.HrHjZ(iZ]6pLi7T]@Aw[j');
define('SECURE_AUTH_SALT', 'K,&T6HL+{:`&QkS?Bf7^:7wodps:62/o{Anw*f1NAS=p]IvpnVp0}RSxULslc.=3');
define('LOGGED_IN_SALT',   'XaxqjSt27^==+6pNd^C*bL(UrG>u&z?tGXgAGY?SQeJYgL+Ew~z&7Qe1FE?aV(QU');
define('NONCE_SALT',       'zhkzxi5ba{^cwQa/TK-oS0]6q_)-~bc,HufvY^VWH3d8HzHCm`r&.0@KBdg(X{P`');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'fld_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
