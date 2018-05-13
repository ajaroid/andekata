<?php

class TplAppApps
{
    const MENU = 'apps';
    
    public static function process()
    {
        global $neardLang;
        
        return TplApp::getMenu($neardLang->getValue(Lang::APPS), self::MENU, get_called_class());
    }
    
    public static function getMenuApps()
    {
        global $neardLang;
        
        return TplAestan::getItemLink(
                $neardLang->getValue(Lang::ADMINER),
                'adminer/',
                true
            );
    }
}
