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

// Add entries
$sitemap->addEntry('/page1', '0.8');
$sitemap->addEntry('/page2', '0.5');

for ($i = 0; $i < 8; $i++) {
  $page = '/page' . ($i + 3);
  $priority = rand(1, 10) / 10;

  $sitemap->addEntry($page, $priority);
}

// Generate
$generator = new Generator($config);
$xmlSitemap = $generator->toString();

// Output sitemap
echo $xmlSitemap;
```
