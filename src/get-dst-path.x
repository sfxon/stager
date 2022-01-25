<?php

// Try to load the configuration.
$config_filename = 'devbuilder_config.php';

if(!file_exists($config_filename)) {
		die('error 1');
}

try {
		include_once($config_filename);
} catch(Exception $e) {
		die('error 2');
}

// Check if configuration is valid.

if(!isset($cnf) || !isset($cnf['folder_dst']) || strlen(trim($cnf['folder_dst'])) < 10) {
		die('error 3');
}

echo $cnf['folder_dst'] . '/dev/';