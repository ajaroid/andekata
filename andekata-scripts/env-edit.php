<?php 

/**
 * example use 
 * php.exe env-edit.php DB_CONNECTION mysql
 */
 
$path = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'apps' . DIRECTORY_SEPARATOR . 'andekata-api' . DIRECTORY_SEPARATOR . '.env';
if (file_exists($path)) {
	$oldConfig = exec('type ' . $path . ' | findstr ' . $argv[1]);
	$newConfig = $argv[1] . '=';
	if (isset($argv[2])) {
		$newConfig .= $argv[2];
	}
    file_put_contents($path, str_replace(
        $oldConfig , $newConfig, file_get_contents($path)
    ));
}