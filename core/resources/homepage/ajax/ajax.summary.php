<?php

$result = array(
    'binapache' => '',
    'binmariadb' => '',
    'binmysql' => '',
    'binpostgresql' => '',
    'binnodejs' => '',
    'binphp' => '',
);

$dlMoreTpl = '<a href="' . Util::getWebsiteUrl('modules/%s', '#releases') . '" target="_blank" title="' . $neardLang->getValue(Lang::DOWNLOAD_MORE) . '"><span style="float:right;margin-left:8px;"><i class="fa fa-download"></i></span></a>';

// Bin Apache
$apachePort = $neardBins->getApache()->getPort();
$apacheSslPort = $neardBins->getApache()->getSslPort();
$apacheLabel = 'label-default';

if ($neardBins->getApache()->isEnable()) {
    $apacheLabel = 'label-danger';
    if ($neardBins->getApache()->checkPort($apachePort)) {
        if ($neardBins->getApache()->checkPort($apacheSslPort, true)) {
            $apacheLabel = 'label-success';
        } else {
            $apacheLabel = 'label-warning';
        }
    }
}



$result['binapache'] = sprintf($dlMoreTpl, 'apache');
$result['binapache'] .= '<span style="float:right;font-size:12px" class="label ' . $apacheLabel . '">' . $neardBins->getApache()->getVersion() . '</span>';

// Bin MariaDB
$mariadbPort = $neardBins->getMariadb()->getPort();
$mariadbLabel = 'label-default';

if ($neardBins->getMariadb()->isEnable()) {
    $mariadbLabel = 'label-danger';
    if ($neardBins->getMariadb()->checkPort($mariadbPort)) {
        $mariadbLabel = 'label-success';
    }
}

$result['binmariadb'] = sprintf($dlMoreTpl, 'mariadb');
$result['binmariadb'] .= '<span style="float:right;font-size:12px" class="label ' . $mariadbLabel . '">' . $neardBins->getMariadb()->getVersion() . '</span>';

// Bin MySQL
$mysqlPort = $neardBins->getMysql()->getPort();
$mysqlLabel = 'label-default';

if ($neardBins->getMysql()->isEnable()) {
    $mysqlLabel = 'label-danger';
    if ($neardBins->getMysql()->checkPort($mysqlPort)) {
        $mysqlLabel = 'label-success';
    }
}

$result['binmysql'] = sprintf($dlMoreTpl, 'mysql');
$result['binmysql'] .= '<span style="float:right;font-size:12px" class="label ' . $mysqlLabel . '">' . $neardBins->getMysql()->getVersion() . '</span>';

// Bin PostgreSQL
$postgresqlPort = $neardBins->getPostgresql()->getPort();
$postgresqlLabel = 'label-default';

if ($neardBins->getPostgresql()->isEnable()) {
    $postgresqlLabel = 'label-danger';
    if ($neardBins->getPostgresql()->checkPort($postgresqlPort)) {
        $postgresqlLabel = 'label-success';
    }
}

$result['binpostgresql'] = sprintf($dlMoreTpl, 'postgresql');
$result['binpostgresql'] .= '<span style="float:right;font-size:12px" class="label ' . $postgresqlLabel . '">' . $neardBins->getPostgresql()->getVersion() . '</span>';

// Bin Node.js
$nodejsLabel = 'label-default';
if ($neardBins->getNodejs()->isEnable()) {
    $nodejsLabel = 'label-primary';
}

$result['binnodejs'] = sprintf($dlMoreTpl, 'nodejs');
$result['binnodejs'] .= '<span style="float:right;font-size:12px" class="label ' . $nodejsLabel .'">' . $neardBins->getNodejs()->getVersion() . '</span>';

// Bin PHP
$phpLabel = 'label-default';
if ($neardBins->getPhp()->isEnable()) {
    $phpLabel = 'label-primary';
}

$result['binphp'] = sprintf($dlMoreTpl, 'php');
$result['binphp'] .= '<span style="float:right;font-size:12px" class="label ' . $phpLabel .'">' . $neardBins->getPhp()->getVersion() . '</span>';

echo json_encode($result);
