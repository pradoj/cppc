<?php
$localHosts = array(
    'localhost',
    '10.0.0.101',
    '192.168.2.50',
);
if ( in_array($_SERVER['HTTP_HOST'], $localHosts) ) {
    $url = 'http://' . $_SERVER['HTTP_HOST'] . '/cppc/';    
} else {
    $url = 'http://' . $_SERVER['HTTP_HOST'] . '/apps/cppc/';
}

define('BASE_URL',  $url);
