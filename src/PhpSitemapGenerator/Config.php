<?php 
// src/PhpSitemapGenerator/Config.php  

namespace PhpSitemapGenerator;

class Config
{
    private $_domain;
    private $_path;
    private $_filename;
    private $_entries = array();
    private $_type;
    
    public function __construct($type = 'screen')
    {
        $this->_type = $type;
    }

    public function get($arg)
    {
        switch ($arg) {
            case 'domain':
                return $this->_domain;
            case 'path':
                return $this->_path;
            case 'filename':
                return $this->_filename;
            case 'filepath':
                return $this->_getFilepath();
            case 'entries':
                return $this->_entries;
        }
    }

    public function setDomain($domain)
    {
        $this->_domain = trim($domain);
        return $this;
    }

    public function setPath($path)
    {
        $path = trim($path);
        
        // Additional code removed for brevity
        
    }

    public function setFilename($filename)
    {
        $filename = trim($filename);
        
        // Additional code removed for brevity

    }

    public function setEntries($entries)
    {
       // Additional code removed for brevity
       
    }

    public function sanityCheck()
    {
        // Additional code removed for brevity
    }

    private function _getFilepath()
    {
        return sprintf('%s/%s',$this->_path, $this->_filename);
    }
}
