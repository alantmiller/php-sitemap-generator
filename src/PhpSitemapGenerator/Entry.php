<?php 
<?php

namespace PhpSitemapGenerator;

/**
 * Class Entry
 *
 * @package PhpSitemapGenerator 
 */
class Entry
{

  private string $_loc;
  private string $_priority;
  private string $_changefreq;
  private string $_lastmod;

  private array $_frequencies = ['always','hourly','daily','weekly','monthly','yearly','never'];

  private array $_priorities = ['0.0','0.1','0.2','0.3','0.4','0.5','0.6','0.7','0.8','0.9','1.0'];

  /**
   * Constructor
   *
   * @param string $loc
   * @param string $priority
   * @param string $changefreq
   * @param string $lastmod 
   */
  public function __construct(
      string $loc,
      string $priority,
      string $changefreq = "",
      string $lastmod = ""
  )
  {
    $this->_setLoc($loc);
    $this->_setPriority($priority);

    if (strlen($changefreq) > 0) {
      $this->_setChangefreq($changefreq);
    }

    if (strlen($lastmod) > 0) {
      $this->_setLastmod($lastmod);
    }

  }

  /**
   * Get property
   * 
   * @param string $arg
   *
   * @return string|array
   */
  public function get(string $arg): string|array
  {
    switch($arg) {
      case 'loc':
        return $this->_getLoc();
      case 'priority':  
        return $this->_getPriority();
      case 'changefreq':
        return $this->_getChangefreq();
      case 'lastmod':
        return $this->_getLastmod();
      case 'frequencies':
        return $this->_frequencies;
      case 'priorities':
        return $this->_priorities;
      default:
        throw new \Exception('Invalid argument');  
    }
  }

  /**
   * Set location
   *
   * @param string $loc 
   * 
   * @return self
   */
  private function _setLoc(string $loc): self
  {
    $this->_loc = $loc;
    return $this;
  }

  /**
   * Set priority
   *
   * @param string $priority
   *  
   * @return self
   * @throws \Exception
   */
  private function _setPriority(string $priority): self
  {
    if (!in_array($priority, $this->_priorities)) {
      throw new \Exception('Invalid priority value');
    }
    
    $this->_priority = $priority;
    return $this;
  }

  /**
   * Set change frequency
   *
   * @param string $changefreq
   * 
   * @return self
   * @throws \Exception
   */
  private function _setChangefreq(string $changefreq): self
  {
    if (!in_array($changefreq, $this->_frequencies)) {
      throw new \Exception('Invalid changefreq');
    }
    
    $this->_changefreq = $changefreq;
    return $this; 
  }

  /**
   * Set last modified
   *
   * @param string $lastmod
   * 
   * @return self
   * @throws \Exception
   */
  private function _setLastmod(string $lastmod): self
  {
    $date = \DateTime::createFromFormat('Y-m-d', $lastmod);

    if (!$date) {
      throw new \Exception('Invalid date format');
    }

    $this->_lastmod = $lastmod;
    return $this;
  }

  /**
   * Get location
   *
   * @return string
   */
  private function _getLoc(): string
  {
    return $this->_loc;
  }

  /**
   * Get priority
   *
   * @return string 
   */
  private function _getPriority(): string
  {
    if (empty($this->_priority)) {
      return '0.5';
    }

    return $this->_priority;
  }

  /**
   * Get change frequency
   *
   * @return string
   */
  private function _getChangefreq(): string
  {
    if (empty($this->_changefreq)) {
      return 'monthly';
    }

    return $this->_changefreq;
  }

  /**
   * Get last modified
   *
   * @return string
   */
  private function _getLastmod(): string 
  {
    if (empty($this->_lastmod)) {
      return date('Y-m-d');  
    }

    return $this->_lastmod;
  }

}
