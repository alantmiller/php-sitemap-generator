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

// Add entry with video  
$video = [
  'thumbnail' => '/images/video1_thumbnail.jpg',
  'title' => 'Awesome Video'
];

$entry = new Entry('/video1', 0.9); 
$entry->setVideos([$video]);
$sitemap->addEntry($entry);

// Add entry with images
$images = [
  [
     'loc' => '/images/image1.jpg',
     'title' => 'Image 1'
  ],
  [
     'loc' => '/images/image2.jpg',
     'title' => 'Image 2'
  ]
];

$entry = new Entry('/page1', 0.8);
$entry->setImages($images);
$sitemap->addEntry($entry);

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
