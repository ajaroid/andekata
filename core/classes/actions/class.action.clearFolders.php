<?php

class ActionClearFolders
{
    public function __construct($args)
    {
        global $neardBs, $neardCore;
        
        Util::clearFolder($neardBs->getTmpPath(), array('cachegrind', 'composer''openssl', 'npm-cache', 'pip'));
        Util::clearFolder($neardCore->getTmpPath());
    }
}
