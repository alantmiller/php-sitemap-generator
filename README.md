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
$config->setDomain('www.example.com');
$config->setFilename('sitemap.xml');

// Sitemap
$sitemap = new Sitemap($config);

$dateTime = new DateTime(); // current date
$sitemap->addEntry('/page1', 0.8, 'weekly', $dateTime);

// Create random dates
for($i = 0; $i < 8; $i++) {

  $dateTime = new DateTime("+$i days");  
  $page = "/page$i";
  
  $sitemap->addEntry($page, 0.5, 'monthly', $dateTime);
}

// Generate
$generator = new Generator($config);
$xmlSitemap = $generator->toString();

// Output sitemap
echo $xmlSitemap;
```
