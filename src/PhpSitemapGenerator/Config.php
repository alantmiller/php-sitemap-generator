<?php

namespace PhpSitemapGenerator;

/**
 * Class Config
 *
 * @package PhpSitemapGenerator
 */
class Config 
{

  private string $_domain;
  private string $_path;
  private string $_filename;
  
  private array $_entries = [];
  
  private string $_type;

  /**
   * Config constructor
   *
   * @param string $type
   */
  public function __construct(string $type = 'screen')
  {
    $this->_type = $type;
  }

  /**
   * Get config value
   *
   * @param string $arg
   *
   * @return string|array
   */
  public function get(string $arg): string|array
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

  /**
   * Set domain
   *
   * @param string $domain
   *
   * @return self
   */
  public function setDomain(string $domain): self
  {
    $this->_domain = trim($domain);
    
    return $this;
  }

  /**
   * Set path
   *
   * @param string $path
   *
   * @return self
   */
  public function setPath(string $path): self
  {
    // Validate and sanitize path
    
    $this->_path = $path;
    
    return $this;
  }

  /**
   * Set filename
   *
   * @param string $filename
   *
   * @return self
   */
  public function setFilename(string $filename): self
  {
    // Validate filename
    
    $this->_filename = $filename;
    
    return $this;
  }

  /**
   * Set entries
   *
   * @param Entry[] $entries
   *
   * @return self
   * @throws \Exception
   */
  public function setEntries(array $entries): self
  {
    // Validate entries 
    
    $this->_entries = $entries;
    
    return $this;
  }

/**
   * Validate configuration
   *
   * @throws \Exception
   */
  public function sanityCheck(): void
  {
    if ($this->_type === 'file' && empty($this->_filename)) {
      throw new \Exception('Filename not set');
    }
    
    if (empty($this->_domain)) {
      throw new \Exception('Domain not set');
    }
  }

  /**
   * Get domain
   *
   * @return string
   */
  public function getDomain(): string
  {
    return $this->_domain;
  }

  /**
   * Get entries
   *
   * @return Entry[]
   */
  public function getEntries(): array
  {
    return $this->_entries;
  }
    
  /**
   * Get path
   * 
   * @return string
   */
  public function getPath(): string
  {
    return $this->_path;
  }
    
  /**
   * Get file path
   *
   * @return string
   */
  private function _getFilepath(): string
  {
    return $this->_path . '/' . $this->_filename;
  }

    
  /**
   * Get filename
   *
   * @return string
   */
  public function getFilename(): string
  {
    return $this->_filename;
  }


}
