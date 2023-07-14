<?php 
// src/PhpSitemapGenerator/Entry.php

namespace PhpSitemapGenerator;

class Entry
{
    private $_loc;
    private $_priority;
    private $_changefreq;
    private $_lastmod;

    private $_frequencies = array('always','hourly','daily','weekly','monthly','yearly','never');
    private $_priorities = array('0.0','0.1','0.2','0.3','0.4','0.5','0.6','0.7','0.8','0.9','1.0');

    public function __construct($loc, $priority, $changefreq="", $lastmod='')
    {
        $this->_setLoc($loc);
        $this->_setPriority($priority);

        if (strlen($changefreq)> 0) {
            $this->_setChangefreq($changefreq);
        }
        if (strlen($lastmod)> 0) {
            $this->_setLastmod($lastmod);
        }
    }

    public function get($arg)
    {
        // Additional code removed for brevity
        
    }

    private function _setLoc($loc)
    {
        $this->_loc = $loc;
        return $this;
    }

    private function _setPriority($priority)
    {
         // Additional code removed for brevity
         
    }

    private function _setChangefreq($changefreq)
    {
       // Additional code removed for brevity
       
    }

    private function _setLastmod($lastmod)
    {
       // Additional code removed for brevity
       
    }

   // Additional methods removed for brevity

}
