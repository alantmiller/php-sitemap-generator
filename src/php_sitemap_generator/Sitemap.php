<?php
namespace alantmiller\php_sitemap_generator;

class Sitemap 
{

  // Properties
  protected Config $config;

  protected array $entries = [];

  // Constructor
  public function __construct()
  {
    $this->config = new Config();
  }

  // Methods
  public function addEntry(string $loc, string $priority, string $changefreq = '', string $lastmod = ''): void
  {
    $entry = new Entry($loc, $priority, $changefreq, $lastmod);
    $this->entries[] = $entry;
  }

  public function setDomain(string $domain): void
  {
    $this->config->setDomain($domain);
  }

  public function toString(): string
  {
    $this->config->setEntries($this->entries);
    
    $generator = new Generator($this->config);
    return $generator->toString();
  }

  // Getters
  public function getConfig(): Config
  {
    return $this->config;
  }

  public function getEntries(): array
  {
    return $this->entries;
  }

}
