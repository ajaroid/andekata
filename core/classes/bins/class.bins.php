<?php

class Bins
{
    const TYPE = 'bins';

    private $apache;
    private $php;
    private $mysql;
    private $mariadb;
    private $postgresql;
    private $nodejs;
	private $redis;
    
    public function __construct()
    {
        Util::logInitClass($this);
    }
    
    public function reload()
    {
        Util::logInfo('Reload bins');
        foreach ($this->getAll() as $bin) {
            $bin->reload();
        }
    }
    
    public function update()
    {
        Util::logInfo('Update bins config');
        foreach ($this->getAll() as $bin) {
            $bin->update();
        }
    }
    
    public function getAll()
    {
        return array(
            $this->getMariadb(),
            $this->getPostgresql(),
            $this->getMysql(),
            $this->getPhp(),
            $this->getNodejs(),
			$this->getRedis()
        );
    }
	
	public function getRedis()
	{
		if ($this->redis == null) {
			$this->redis = new BinRedis('redis', self::TYPE);
		}
		
		return $this->redis;
	}

    public function getApache()
    {
        if ($this->apache == null) {
            $this->apache = new BinApache('apache', self::TYPE);
        }
        return $this->apache;
    }

    public function getPhp()
    {
        if ($this->php == null) {
            $this->php = new BinPhp('php', self::TYPE);
        }
        return $this->php;
    }

    public function getMysql()
    {
        if ($this->mysql == null) {
            $this->mysql = new BinMysql('mysql', self::TYPE);
        }
        return $this->mysql;
    }

    public function getMariadb()
    {
        if ($this->mariadb == null) {
            $this->mariadb = new BinMariadb('mariadb', self::TYPE);
        }
        return $this->mariadb;
    }
  
    public function getPostgresql()
    {
        if ($this->postgresql == null) {
            $this->postgresql = new BinPostgresql('postgresql', self::TYPE);
        }
        return $this->postgresql;
    }

    public function getNodejs()
    {
        if ($this->nodejs == null) {
            $this->nodejs = new BinNodejs('nodejs', self::TYPE);
        }
        return $this->nodejs;
    }

    public function getLogsPath()
    {
        return array(
            
        );
    }

    public function getServices()
    {
        $result = array();
        
        if ($this->getApache()->isEnable()) {
            $result[BinApache::SERVICE_NAME] = $this->getApache()->getService();
        }
        if ($this->getMysql()->isEnable()) {
            $result[BinMysql::SERVICE_NAME] = $this->getMysql()->getService();
        }
        if ($this->getMariadb()->isEnable()) {
            $result[BinMariadb::SERVICE_NAME] = $this->getMariadb()->getService();
        }
        if ($this->getPostgresql()->isEnable()) {
            $result[BinPostgresql::SERVICE_NAME] = $this->getPostgresql()->getService();
        }
		
		if ($this->getRedis()->isEnable()) {
			$result[BinRedis::SERVICE_NAME] = $this->getRedis()->getService();
		}			
    
        return $result;
    }
}
