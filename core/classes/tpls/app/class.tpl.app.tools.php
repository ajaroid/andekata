<?php

class TplAppTools
{
    const MENU = 'tools';
    
    const ACTION_GEN_SSL_CERTIFICATE = 'genSslCertificate';
    
    public static function process()
    {
        global $neardLang;
        
        return TplApp::getMenu($neardLang->getValue(Lang::TOOLS), self::MENU, get_called_class());
    }
    
    public static function getMenuTools()
    {
        global $neardLang, $neardCore, $neardTools;
        $resultItems = $resultActions = '';
        
        // Git
        $tplGit = TplAppGit::process();
        $resultItems .= $tplGit[TplApp::SECTION_CALL] . PHP_EOL;
        $resultActions .= $tplGit[TplApp::SECTION_CONTENT] . PHP_EOL;
        
        // Composer
        $resultItems .= TplAestan::getItemConsole(
            $neardLang->getValue(Lang::COMPOSER),
            TplAestan::GLYPH_COMPOSER,
            $neardTools->getConsole()->getTabTitleComposer()
        ) . PHP_EOL;
        
        // Ghostscript
        $resultItems .= TplAestan::getItemConsole(
            $neardLang->getValue(Lang::GHOSTSCRIPT),
            TplAestan::GLYPH_GHOSTSCRIPT,
            $neardTools->getConsole()->getTabTitleGhostscript()
        ) . PHP_EOL;
        
		// Pear
        // $resultItems .= TplAestan::getItemConsole(
            // $neardLang->getValue(Lang::PEAR),
            // TplAestan::GLYPH_PEAR,
            // $neardTools->getConsole()->getTabTitlePear()
        // ) . PHP_EOL;
        
        // Perl
        // $resultItems .= TplAestan::getItemConsole(
            // $neardLang->getValue(Lang::PERL),
            // TplAestan::GLYPH_PERL,
            // $neardTools->getConsole()->getTabTitlePerl()
        // ) . PHP_EOL;
        
        $resultItems .= TplAestan::getItemSeparator() . PHP_EOL;
        
        // Console
        $resultItems .= TplAestan::getItemConsole(
            $neardLang->getValue(Lang::CONSOLE),
            TplAestan::GLYPH_CONSOLE
        ) . PHP_EOL;
        
        // HostsEditor
        $resultItems .= TplAestan::getItemExe(
            $neardLang->getValue(Lang::HOSTSEDITOR),
            $neardCore->getHostsEditorExe(),
            TplAestan::GLYPH_HOSTSEDITOR
        ) . PHP_EOL;
        
        // Generate SSL Certificate
        $tplGenSslCertificate = TplApp::getActionMulti(
            self::ACTION_GEN_SSL_CERTIFICATE, null,
            array($neardLang->getValue(Lang::MENU_GEN_SSL_CERTIFICATE), TplAestan::GLYPH_SSL_CERTIFICATE),
            false, get_called_class()
        );
        $resultItems .= $tplGenSslCertificate[TplApp::SECTION_CALL] . PHP_EOL;
        $resultActions .= $tplGenSslCertificate[TplApp::SECTION_CONTENT];
        
        return $resultItems . PHP_EOL . $resultActions;
    }
    
    public static function getActionGenSslCertificate()
    {
        return TplApp::getActionRun(Action::GEN_SSL_CERTIFICATE);
    }
}
