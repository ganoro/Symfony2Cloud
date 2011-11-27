<?php
/* The script post_stage.php will be executed after the staging process ends. This will allow
 * users to perform some actions on the source tree or server before an attempt to
 * activate the app is made. For example, this will allow creating a new DB schema
 * and modifying some file or directory permissions on staged source files
 * The following environment variables are accessable to the script:
 */
require_once 'deploy_helpers.php';

$appLocation = getApplicationLocation ();

/*
 * set parameters file
 */
$ini_file = $appLocation . '/app/config/parameters.ini';
$ini_array = parse_ini_file ( $ini_file, true );

$ini_array ['parameters']['database_host'] = str_replace ( '<db-host>', getDbHost(), $ini_array ['parameters']['database_host'] );
$ini_array ['parameters']['database_name'] = str_replace ( '<db-name>', getDbName(), $ini_array ['parameters']['database_name'] );
$ini_array ['parameters']['database_user'] = str_replace ( '<username>', getDbUser(), $ini_array ['parameters']['database_user'] );
$ini_array ['parameters']['database_password'] = str_replace ( '<password>', getDbPassword(), $ini_array ['parameters']['database_password'] );
$ini_array ['parameters']['secret'] = str_replace ( '<secret-code>', getDbPassword(), $ini_array ['parameters']['secret'] );
write_ini_file ( $ini_array, $ini_file, true );

/*
 * modify htaccess
 */
$htaccess_file = $appLocation . '/web/.htaccess';
$explode = explode('/', $htaccess_file);
$appname = $explode[sizeof($explode) -2]; 
$content = file_get_contents($htaccess_file);
str_replace('<application-name>', $appname, $content);
file_put_contents($htaccess_file, $content);

/*
 * chmod cache and logs
 */
chmod ( $appLocation, 0777 );
chmod ( $appLocation . '/app/', 0777 );
chmod ( $appLocation . '/app/cache/', 0777 );
chmod ( $appLocation . '/app/logs/', 0777 );





