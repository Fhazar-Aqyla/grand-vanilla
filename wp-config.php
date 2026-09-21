<?php
/**
 * The base configuration for WordPress
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'grand_vanilla_wp' );

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
 */
define( 'AUTH_KEY',         'v!7#qL*9xW@1p$ZkM~8sRtY2uV4bC6nE8wQ0zX3aD5fG7hJ9kL1mP3rT5vY7zB9' );
define( 'SECURE_AUTH_KEY',  'k@4mP9#wQ2zX7aD1fG5hJ3kL6nP8rT0vY2zB4cE6wQ8sR1uV3bC5nE7wQ9zX1a' );
define( 'LOGGED_IN_KEY',    't$6rT8vY0zB2cE4wQ6sR8uV0bC2nE4wQ6zX8aD0fG2hJ4kL6nP8rT0vY2zB4cE' );
define( 'NONCE_KEY',        'w!9sR1uV3bC5nE7wQ9zX1aD3fG5hJ7kL9nP1rT3vY5zB7cE9wQ1sR3uV5bC7nE' );
define( 'AUTH_SALT',        'z@2bC4nE6wQ8zX0aD2fG4hJ6kL8nP0rT2vY4zB6cE8wQ0sR2uV4bC6nE8wQ0zX' );
define( 'SECURE_AUTH_SALT', 'c#5nE7wQ9zX1aD3fG5hJ7kL9nP1rT3vY5zB7cE9wQ1sR3uV5bC7nE9wQ1zX3a' );
define( 'LOGGED_IN_SALT',   'f$8aD0fG2hJ4kL6nP8rT0vY2zB4cE6wQ8sR0uV2bC4nE6wQ8zX0aD2fG4hJ6k' );
define( 'NONCE_SALT',       'h%1kL3nP5rT7vY9zB1cE3wQ5sR7uV9bC1nE3wQ5zX7aD9fG1hJ3kL5nP7rT9v' );

/**#@-*/

/**
 * WordPress database table prefix.
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 */
define( 'WP_DEBUG', false );
define( 'FS_METHOD', 'direct' );

/* Support dynamic host for remote tunnel (Cloudflare/Ngrok) and local access */
if ( isset( $_SERVER['HTTP_X_FORWARDED_HOST'] ) || isset( $_SERVER['HTTP_HOST'] ) ) {
    $host = isset( $_SERVER['HTTP_X_FORWARDED_HOST'] ) ? $_SERVER['HTTP_X_FORWARDED_HOST'] : $_SERVER['HTTP_HOST'];
    $is_ssl = ( ( ! empty( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] !== 'off' ) || ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) );
    $proto = $is_ssl ? 'https://' : 'http://';

    if ( $is_ssl ) {
        $_SERVER['HTTPS'] = 'on';
    }

    define( 'WP_HOME', $proto . $host . '/grand-vanilla-id' );
    define( 'WP_SITEURL', $proto . $host . '/grand-vanilla-id' );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
