<?php

defined('BASEPATH') or exit('No direct script access allowed');
include_once(APPPATH . 'config/app-config.php');

// Define APP_DB_DRIVER if not already defined
if (!defined('APP_DB_DRIVER')) {
    define('APP_DB_DRIVER', 'mysqli'); // Set the default driver as needed
}

$active_group  = 'default';
$query_builder = true;

global $app_db_encrypt;
$db_encrypt = false;

define('APP_DB_ENCRYPT', false); // Set the default value as needed
define('APP_DB_STRICTON', false); // Set the default value as needed

if (defined('APP_DB_ENCRYPT')) {
    $db_encrypt = APP_DB_ENCRYPT;
} elseif (!is_null($app_db_encrypt)) {
    $db_encrypt = $app_db_encrypt;
}

$db['default'] = array_merge([
    'dsn'           => '', 
    'hostname'      => APP_DB_HOSTNAME,
    'port'          => APP_DB_PORT, 
    'username'     => APP_DB_USERNAME,
    'password'     => APP_DB_PASSWORD,
    'database'     => APP_DB_NAME,
    'dbdriver'     => defined('APP_DB_DRIVER') ? APP_DB_DRIVER : 'mysqli',
    'dbprefix'     => db_prefix(),
    'pconnect'     => false,
    'db_debug'     => (ENVIRONMENT !== 'production'),  
    'cache_on'     => false,
    'cachedir'     => '',
    'char_set'     => defined('APP_DB_CHARSET') ? APP_DB_CHARSET : 'utf8',
    'dbcollat'     => defined('APP_DB_COLLATION') ? APP_DB_COLLATION : 'utf8_general_ci',
    'swap_pre'     => '',
    'encrypt'      => $db_encrypt,
    'compress'     => false,
    'failover'     => [],
    'save_queries' => true,
], defined('APP_DB_STRICTON') && APP_DB_STRICTON || !defined('APP_DB_STRICTON') ? ['stricton' => false] : []);

/**
 * APP_DB_STRICTON
 * @see  https://stackoverflow.com/questions/54235523/unknown-column-strict-all-tables-setting-up-codeigniter-db-connection
 */
