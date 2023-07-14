<?php
namespace PhpSitemapGenerator;

class Entry
{

  // Properties
  private string $_loc;
  private string $_priority;
  private string $_changefreq;
  private string $_lastmod;
  
  private array $_frequencies = ['always', 'hourly', 'daily', 'weekly', 'monthly', 'yearly', 'never'];

  private array $_priorities = ['0.0', '0.1', '0.2', '0.3', '0.4', '0.5', '0.6', '0.7', '0.8', '0.9', '1.0'];

  // Constructor
  public function __construct(string $loc, string $priority, string $changefreq = '', string $lastmod = '')
  {
    $this->_setLoc($loc);
    $this->_setPriority($priority);
    $this->_setChangefreq($changefreq);
    $this->_setLastmod($lastmod);
  }

  // Getters
  public function getLoc(): string
  {
    return $this->_loc;
  }

  public function getPriority(): string
  {
   return $this->_priority;
  }

  public function getChangefreq(): string
  {
    return $this->_changefreq;
  }

  public function getLastmod(): string
  {
    return $this->_lastmod;
  }

  // Setters
  private function _setLoc(string $loc): void
  {
    $this->_loc = $loc;
  }
  
  private function _setPriority(string $priority): void
  {
    $this->_validatePriority($priority);
    $this->_priority = $priority;
  }

  private function _setChangefreq(string $changefreq): void
  {
    $this->_validateChangefreq($changefreq);
    $this->_changefreq = $changefreq;
  }

  private function _setLastmod(string $lastmod): void
  {
    $this->_validateLastmod($lastmod);
    $this->_lastmod = $lastmod;
  }

  // Validation methods
  private function _validatePriority(string $priority): void
  {
    // Validate priority
  }

  private function _validateChangefreq(string $changefreq): void 
  {
    // Validate changefreq
  }

  private function _validateLastmod(string $lastmod): void
  {
    // Validate lastmod
  }

}
