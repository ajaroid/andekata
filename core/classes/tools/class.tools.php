<?php

class Tools
{
    const TYPE = 'tools';

    private $composer;
    private $console;
    private $ghostscript;
    private $git;
    // private $perl;
    
    public function __construct()
    {
    }
    
    public function update()
    {
        Util::logInfo('Update tools config');
        foreach ($this->getAll() as $tool) {
            $tool->update();
        }
    }
    
    public function getAll()
    {
        return array(
            $this->getComposer(),
            $this->getConsole(),
            $this->getGhostscript(),
            $this->getGit(),
            // $this->getPerl(),
        );
    }
    
    public function getComposer()
    {
        if ($this->composer == null) {
            $this->composer = new ToolComposer('composer', self::TYPE);
        }
        return $this->composer;
    }

    public function getConsole()
    {
        if ($this->console == null) {
            $this->console = new ToolConsole('console', self::TYPE);
        }
        return $this->console;
    }
    
    public function getGhostscript()
    {
        if ($this->ghostscript== null) {
            $this->ghostscript= new ToolGhostscript('ghostscript', self::TYPE);
        }
        return $this->ghostscript;
    }

    public function getGit()
    {
        if ($this->git == null) {
            $this->git = new ToolGit('git', self::TYPE);
        }
        return $this->git;
    }
 
    // public function getPerl()
    // {
        // if ($this->perl == null) {
            // $this->perl= new ToolPerl('perl', self::TYPE);
        // }
        // return $this->perl;
    // }
}
