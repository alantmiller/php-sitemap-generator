<?php

namespace alantmiller\php_sitemap_generator;

class Config
{

  // Properties
  private string $_domain;
  private string $_path;
  private string $_filename;
  private array $_entries = [];
  private string $_type;

  // Constructor
  public function __construct(string $type = 'screen')
  {
    $this->_type = $type;
  }

  // Getters
  public function getDomain(): string
  {
    return $this->_domain;
  }

  public function getPath(): string
  {
    return $this->_path;
  }

  public function getFilename(): string
  {
    return $this->_filename; 
  }

  public function getEntries(): array
  {
    return $this->_entries;
  }

  // Setters
  public function setDomain(string $domain): self
  {
    $this->_domain = trim($domain);
    return $this;
  }

  public function setPath(string $path): self 
  {
    $this->_validatePath($path);
    $this->_path = $path;
    return $this;
  }

  public function setFilename(string $filename): self
  {
    $this->_validateFilename($filename);
    $this->_filename = $filename;
    return $this;
  }

  public function setEntries(array $entries): self
  {
    $this->_validateEntries($entries); 
    $this->_entries = $entries;
    return $this;
  }

  // Main methods
  public function get(string $arg): string|array
  {
    // Return property based on $arg
  }
  
  public function sanityCheck(): void
  {
    // Validate configuration
  }

  // Util methods
  private function _validatePath(string $path): void
  {
    // Validate path
  }

  private function _validateFilename(string $filename): void
  {
    // Validate filename 
  }

  private function _validateEntries(array $entries): void
  {
    // Validate entries
  }

}
