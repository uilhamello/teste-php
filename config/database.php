<?php

/**
 * Database Configuration:
 * That Project is using PDO extesion to stablish a database connection
 * @var [type]
 */

$LIB_XX_CONFIG_DB = NULL;

if(file_exists('config/config.ini')) {

    $ini_array = parse_ini_file("config.ini", true);

    $LIB_XX_CONFIG_DB  = [
        "default" => $ini_array['server']['driver'],
        "mysql" => [
            "default" => true,
            "DRIVER" => "mysql",
            "HOST" => $ini_array[$ini_array['server']['env']]['host'],
            "DBNAME" => $ini_array[$ini_array['server']['env']]['db_name'],
            "USER" => $ini_array[$ini_array['server']['env']]['username'],
            "PASSWORD" => $ini_array[$ini_array['server']['env']]['password']
        ],
        "pgsql" => [
            "DRIVER" => "pgsql",
            "HOST" => "",
            "DBNAME" => "",
            "USER" => "",
            "PASSWORD" => ""
        ],
    ];
}

/**
 * Keeps the database configuration at a session avoiding to open this file more than once
 */
$_SESSION['LIB_XX_CONFIG_DB'] = $LIB_XX_CONFIG_DB;