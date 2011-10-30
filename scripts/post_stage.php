<?php
/* The script post_stage.php will be executed after the staging process ends. This will allow
 * users to perform some actions on the source tree or server before an attempt to
 * activate the app is made. For example, this will allow creating a new DB schema
 * and modifying some file or directory permissions on staged source files
 * The following environment variables are accessable to the script:
 */
require_once 'deploy_helpers.php';

/*
 * set parameters file
 */
$ini_file = getApplicationLocation () . 'app/config/parameters.ini';
$ini_array = parse_ini_file ( $ini_file, true );
$ini_array ['database_host'] = str_replace ( '<container-name>', getContainerName (), $ini_array ['database_host'] );
$ini_array ['database_name'] = str_replace ( '<container-name>', getContainerName (), $ini_array ['database_name'] );
$ini_array ['database_user'] = str_replace ( '<container-name>', getContainerName (), $ini_array ['database_user'] );
$ini_array ['database_password'] = str_replace ( '<password>', getContainerName (), $ini_array ['database_password'] );
$ini_array ['secret'] = str_replace ( '<secret-code>', getContainerName (), $ini_array ['secret'] );
write_ini_file ( $ini_array, $path, true );

/*
 * chmod cache
 */
chmod ( getApplicationLocation () . 'app/cache', 777 );

/*
 * chmod log
 */
chmod ( getApplicationLocation () . 'app/log', 777 );





