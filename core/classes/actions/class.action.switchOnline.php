<?php

class ActionSwitchOnline
{
    public function __construct($args)
    {
        global $neardConfig;
        
        if (isset($args[0]) && $args[0] == Config::ENABLED || $args[0] == Config::DISABLED) {
            Util::startLoading();
            $putOnline = $args[0] == Config::ENABLED;
            
            $this->switchApache($putOnline);
            $this->switchAlias($putOnline);
            $this->switchVhosts($putOnline);
            $neardConfig->replace(Config::CFG_ONLINE, $args[0]);
        }
    }
    
    private function switchApache($putOnline)
    {
        global $neardBins;
        $neardBins->getApache()->refreshConf($putOnline);
    }
    
    private function switchAlias($putOnline)
    {
        global $neardBins;
        $neardBins->getApache()->refreshAlias($putOnline);
    }
    
    private function switchVhosts($putOnline)
    {
        global $neardBins;
        $neardBins->getApache()->refreshVhosts($putOnline);
    }
}
