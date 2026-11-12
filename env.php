<?php
require __DIR__ .'\vendor\autoload.php';
# ------------------------------------------------------------------------------
# Pleiades
# ------------------------------------------------------------------------------
date_default_timezone_set('America/Belem');
$SERVER_NAME = 'bamboozerhrm';
$SYSTEM_VERSION = 'v1.0';
# ------------------------------------------------------------------------------
# Database config
# ------------------------------------------------------------------------------
$DB_SERVER = '127.0.0.1:3308';
$DB_USERNAME = 'root';
$DB_PASSWORD = '';
$DB = 'bamboozerhrm';

try{
    $CONNECTION_DB = mysqli_connect($DB_SERVER,$DB_USERNAME,$DB_PASSWORD,$DB);
}catch(Exception $edb){
    $errordb = $edb->getMessage();
}