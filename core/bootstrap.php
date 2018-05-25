<?php

define('APP_TITLE', 'Andekata');
define('APP_WEBSITE', 'http://ajaro.id');
define('APP_GITHUB_USER', 'ajaroid');
define('APP_GITHUB_REPO', 'andekata');
define('APP_AUTHOR_NAME', 'Yuana');

define('RETURN_TAB', '	');

// Bootstrap
require_once dirname(__FILE__) . '/classes/class.bootstrap.php';
$neardBs = new Bootstrap(dirname(__FILE__));
$neardBs->register();

// Process action
$neardAction = new Action();
$neardAction->process();

// Stop loading
if ($neardBs->isBootstrap()) {
    Util::stopLoading();
}
