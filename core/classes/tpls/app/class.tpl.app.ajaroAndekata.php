<?php

class TplAppAjaroAndekata
{
    const MENU = 'ajaroAndekata';
	
	//batchFile constant
	const BAT_CLIENT_SETUP 	= 'client-setup';
	const BAT_CLIENT_UPDATE = 'client-update';
	const BAT_API_SETUP 	= 'api-setup';
	const BAT_API_UPDATE 	= 'api-update';
    
    public static function process()
    {
        global $neardLang;
        
        return TplApp::getMenu($neardLang->getValue(Lang::AJARO_ANDEKATA), self::MENU, get_called_class());
    }
    
	/**
	 * @author Yuana
 	 */
    public static function getMenuAjaroAndekata()
    {
        $resultItems = $resultActions = '';
   
        // $resultItems .= self::executeBatch(
			// 'Andekata Client Setup',
			// self::BAT_CLIENT_SETUP
		// ) . PHP_EOL;
        
        $resultItems .= self::executeBatch(
			'Andekata Client Update',
			self::BAT_CLIENT_UPDATE
		) . PHP_EOL;
		
		$resultItems .= TplAestan::getItemSeparator(). PHP_EOL;
		
        // $resultItems .= self::executeBatch(
			// 'Andekata API Setup',
			// self::BAT_API_SETUP
		// ) . PHP_EOL;
        
        $resultItems .= self::executeBatch(
			'Andekata API Update',
			self::BAT_API_UPDATE
		) . PHP_EOL;
        
        return $resultItems . PHP_EOL . $resultActions;
    }
	
	public static function executeBatch($caption, $batchFile)
    {
		global $neardLang, $neardCore, $neardTools;
		global $neardBs;
		
        return 'Type: item; ' .
			'Caption: "' . $caption . '"; ' .
			'Action: shellexecute; ' .
			'FileName: "' . $neardBs->getAjaroAndekataScriptsPath() . '/andekata-' . $batchFile . '.bat' . '"; ' .
			'Glyph: ' . TplAestan::GLYPH_CONSOLE . '; ' .
			'WorkingDir: "' . $neardBs->getAppsPath() . '"; ' .
			'ShowCmd: normal; ';
    }
}
