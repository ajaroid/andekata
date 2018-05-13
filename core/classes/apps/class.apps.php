<?php

class Apps
{
    const TYPE = 'apps';

    private $adminer;
    
    public function __construct()
    {
    }

    public function update()
    {
        Util::logInfo('Update apps config');
        foreach ($this->getAll() as $tool) {
            $tool->update();
        }
    }
    
    public function getAll()
    {
        return array(
            $this->getAdminer(),
        );
    }
    
    public function getAdminer()
    {
        if ($this->adminer == null) {
            $this->adminer = new AppAdminer('adminer', self::TYPE);
        }
        return $this->adminer;
    }
}
