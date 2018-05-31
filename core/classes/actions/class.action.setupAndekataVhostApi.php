<?php

class ActionSetupAndekataVhostApi
{
	const GAUGE_SAVE = 2;
	
    public function __construct($args)
    {
        global $neardBs, $neardBins, $neardLang, $neardOpenSsl, $neardWinbinder;
		
		//setup vhost api
		$apiServerName = 'andekata.api';
        $apiDocumentRoot = Util::formatWindowsPath($neardBs->getAppsPath()) . '\\andekata-api\\public';
		
		$this->setupVhost($apiServerName, $apiDocumentRoot);
		
		//setup vhost client
		$clientServerName = 'andekata.client';
		$clientDocumentRoot = Util::formatWindowsPath($neardBs->getAppsPath()) . '\\andekata-client\\build';
		
		$this->setupVhost($clientServerName, $clientDocumentRoot);
    }
	
	private function setupVhost($serverName, $documentRoot)
	{
		global $neardBs, $neardBins, $neardLang, $neardOpenSsl, $neardWinbinder;
		
		if ($neardOpenSsl->createCrt($serverName) && file_put_contents($neardBs->getVhostsPath() . '/' . $serverName . '.conf', $neardBins->getApache()->getVhostContent($serverName, $documentRoot)) !== false) {
			$neardBins->getApache()->getService()->restart();
			$neardWinbinder->messageBoxInfo(
				sprintf($neardLang->getValue(Lang::VHOST_CREATED), $serverName, $serverName, $documentRoot),
				$neardLang->getValue(Lang::ADD_VHOST_TITLE));
			$neardWinbinder->destroyWindow($window);
		} else {
			$neardWinbinder->messageBoxError($neardLang->getValue(Lang::VHOST_CREATED_ERROR), $neardLang->getValue(Lang::ADD_VHOST_TITLE));
			$neardWinbinder->resetProgressBar($this->wbProgressBar);
		}
	}
}
