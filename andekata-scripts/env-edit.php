<?php 
$path = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'apps' . DIRECTORY_SEPARATOR . 'andekata-api' . DIRECTORY_SEPARATOR . '.env';
if (file_exists($path)) {
	$oldConfig = exec('type ' . $path . ' | findstr ' . $argv[1]);
    file_put_contents($path, str_replace(
        $oldConfig , $argv[1] . '=' . $argv[2], file_get_contents($path)
    ));
}