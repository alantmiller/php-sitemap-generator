<?php
// src/PhpSitemapGenerator/Sitemap.php 

namespace PhpSitemapGenerator;

class Sitemap
{

    protected $conf;
    protected $entries = array();
    
    public function __construct()
    {
        $this->conf = new Config();   
    }
    
    public function addEntry($loc, $priority, $changefreq="", $lastmod='')
    {
        $this->entries[] = new Entry($loc, $priority, $changefreq, $lastmod);   
    }
    
    public function setDomain($domain)
    {
        $this->conf->setDomain($domain); 
    }
    
    public function toString()
    {
        $this->conf->setEntries($this->entries);
        $generator = new Generator($this->conf);
        return $generator->toString();
    }

}
