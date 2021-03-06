
<?php
// start session
// if (!session_id()){
//  session_start();
// }
 
defined('wodpress_env') || define('wodpress_env', (getenv('wodpress_env') ? getenv('wodpress_env') : 'local'));
 
//Wordpress Env
switch(wodpress_env) {
  case 'production':
    $db_name     = 'x';
    $db_user     = 'x';
    $db_password = 'x';
    $db_host     = 'x.x.x';

    @ini_set('log_errors', 'On');
    @ini_set('display_errors', 'Off');
    define( 'WP_DEBUG', false );

    define('COMPRESS_CSS', true);
    define('COMPRESS_SCRIPTS', true);
    define('ENFORCE_GZIP', true);
    define('WP_CACHE', false );

    break;

  case 'local':
    $db_name     = 'navikenz-wp';
    $db_user     = 'root';
    $db_password = 'root';
    $db_host     = 'localhost:8889';

    @ini_set('log_errors', 'On');
    @ini_set('display_errors', 'On');
    @error_reporting(E_NOTICE ^ E_DEPRECATED);
    
    define( 'AUTOMATIC_UPDATER_DISABLED', true );
    define('WP_DEBUG', true);
    define('WP_DEBUG_LOG', true);
    define('WP_DEBUG_DISPLAY', true);
    define('SCRIPT_DEBUG', true);
    // define('SAVEQUERIES', true);
	  // define( 'DISALLOW_FILE_EDIT', true );
    // /* Autosave. In Seconds*/
    define('AUTOSAVE_INTERVAL', 300 );
    // define( 'WP_MEMORY_LIMIT', '256M' );
    /* Specify maximum number of Revisions. */
    define( 'WP_POST_REVISIONS', '4' );

    /* Media Trash. */
    define( 'MEDIA_TRASH', true );

    break;

  default:
    break;
}

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', $db_name);
 
/** MySQL database username */
define('DB_USER', $db_user);
 
/** MySQL database password */
define('DB_PASSWORD', $db_password);
 
/** MySQL hostname */
define('DB_HOST', $db_host);
 
/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');
 
/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
 
/** Facebook Keys */
define('FB_APPID', 'x');
define('FB_SECRET', 'x');
define('FB_REDIRECT', 'x');

define('ALLOW_UNFILTERED_UPLOADS', true);
/**#@+
 * Authentication Unique Keys and Salts. (Change For each Website)
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
  define('AUTH_KEY',         '+bd;stt-0v~-~nqHUyl>V~Tvb2s/46p,;3MYz8^QGfHKJ8HY|=`X6KJ80J-nb3Hl');
  define('SECURE_AUTH_KEY',  ',)=[|F*?%.O&6ACx#1m}-a16X[[PodgH+b:e||HL<+sz4- y*pdn[]bs$v4&H1M=');
  define('LOGGED_IN_KEY',    '%A5JXErx-+(ea+;4L-|tkEhmVg;wd;Rp*-/<xu@Rn|ncZ+TRga||&(nTK-(2(+`_');
  define('NONCE_KEY',        '+)00ld@.ffq{y< 00Z*zk)*muy5K&f(P=IS4*9:Mno:b,JCA||0]5? D-L;*[uI=');
  define('AUTH_SALT',        ' ^iAId(I+L3JeoAcg&e-_|:lg^DUn#3blzD>jP?x:+Ttg8+6(rLr>PZ%_5bZtsV6');
  define('SECURE_AUTH_SALT', '$faIm,/47|0t-:WCRT$b-K6$dE68f4F$PaSv!wiIb#|^2=YdzYFzEHgyIi~w5W&;');
  define('LOGGED_IN_SALT',   '@;{@c^l)5r.Aa6PFA2RR_cbuz2taSiUoS.@HYUwuvzKzXG@0;X(Ki=d0beZgh|o5');
  define('NONCE_SALT',       'w7AV3Ee}mZL=$|T #L|>Oh,UD~ZAr;:U*W%AE>v v@?(, K@Z!d[u3rAYO.A$W.[');
/** **/
 
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';
 
/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
// define('WPLANG', 'en_US');

/* That's all, stop editing! Happy publishing. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
  define( 'ABSPATH', dirname(__FILE__) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
