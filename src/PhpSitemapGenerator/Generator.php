<?php
namespace PhpSitemapGenerator;

class Generator  
{

  // Properties
  
  private Config $_config;
  
  private string $_xml;
  
  private string $_blocks;

  // Constructor 
  
  public function __construct(Config $config)
  {
    $this->_config = $config;
  }

  // Getters
  
  public function getConfig(): Config
  {
    return $this->_config;
  }

  public function getXml(): string
  {
    return $this->_xml;
  }

  public function getBlocks(): string
  {
    return $this->_blocks;
  }

  // Main methods

  public function build(): void 
  {
    $this->_build();
  }
  
  public function getXml(): string
  {
    $this->_build();
    return $this->_xml;
  }
  
  public function __toString(): string
  {
    $this->_build();
    return $this->_xml;
  }
  
  public function write(): void
  {
    $this->_build();
    
    file_put_contents($this->_config->getFilename(), $this->_xml) 
      or throw new \Exception('Could not write file');
  }

  // Internal methods

  private function _build(): void
  {
    $this->_config->sanityCheck();
    
    $this->_xml = '';
    $this->_xml .= $this->_buildHeader();
    $this->_xml .= $this->_buildBody();
    $this->_xml .= $this->_buildFooter();
  }

  private function _append(string $xml): void 
  {
    $this->_xml .= $xml;
  }

  private function _buildHeader(): string
  {
    $header = '<?xml version="1.0" encoding="UTF-8"?>';
    $header .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    return $header;
  }

  private function _buildFooter(): string
  {
    return '</urlset>';
  }

  private function _buildBody(): string
  {
    $this->_blocks = '';
    
    foreach ($this->_config->getEntries() as $entry) {
      $this->_blocks .= $this->_buildEntry($entry);  
    }

    return $this->_blocks;
  }

  private function _buildEntry(Entry $entry): string 
  {
    $loc = $this->_buildLoc($entry->getLoc());

    return '<url>'
         . $this->_buildLine('loc', $loc)  
         . $this->_buildLine('priority', $entry->getPriority())
         . $this->_buildLine('changefreq', $entry->getChangefreq())
         . $this->_buildLine('lastmod', $entry->getLastmod())
         . '</url>';
  }

  private function _buildLoc(string $loc): string
  {
    return 'http://' . $this->_config->getDomain() . $loc;
  }

  private function _buildLine(string $name, string $content): string
  {
    if (!$this->_isUtf8($content)) {
      $content = utf8_encode($content);
    }
    
    return "<$name>$content</$name>";
  }

  private function _isUtf8(string $str): bool 
  {
    return preg_match('//u', $str); 
  }

}
