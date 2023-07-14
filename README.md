# php-sitemap-generator
A refactored version of my old XML Stemap Generator application that predated PHP Namespaces to a new version compatible with PHP 8.0

```php
// autoload.php

require 'vendor/autoload.php';

use alantmiller\PhpSitemapGenerator\Sitemap;
use alantmiller\PhpSitemapGenerator\Entry;
use alantmiller\PhpSitemapGenerator\Generator;
use alantmiller\PhpSitemapGenerator\Config;

// Create and populate config 
$config = new Config();

// Domain regex allows alphanumeric, dashes, dot 
$domainRegex = '/^[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/';
$domain = 'www.example.com';

if (preg_match($domainRegex, $domain)) {
  // Valid domain, use it
  $config->setDomain($domain);
} else {
  // Invalid domain, throw error
  throw new Exception('Invalid domain format');
}

$config->setFilename('sitemap.xml');

// Sitemap
$sitemap = new Sitemap($config);

$dateTime = new DateTime(); // current date
$sitemap->addEntry('/page1', 0.8, 'weekly', $dateTime);

// Create random dates
for($i = 0; $i < 8; $i++) {

  $dateTime = new DateTime("+$i days");  
  $page = "/page$i";
  $priority = mt_rand(10, 20) / 10;
  
  $sitemap->addEntry($page, $priority, 'monthly', $dateTime);
}

// Generate
$generator = new Generator($config);
$xmlSitemap = $generator->toString();

// Output sitemap
echo $xmlSitemap;
```
