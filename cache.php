<?php
require_once './vendor/autoload.php';
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
$cachePool = new FilesystemAdapter('', 0, "cache");
$cachePool->clear() ;
print "cache clear success !! \n";