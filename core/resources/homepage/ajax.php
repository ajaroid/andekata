<?php

include_once '../../bootstrap.php';

$procs = array(
    'summary',
    'latestversion',
    'apache',
    'mariadb',
    'mysql',
    'nodejs',
    'php',
    'postgresql'
);

$proc = Util::cleanPostVar('proc');

if (in_array($proc, $procs)) {
    include 'ajax/ajax.' . $proc . '.php';
}
