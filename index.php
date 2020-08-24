<?php
require './vendor/autoload.php' ; 


use Symfony\Contracts\Cache\ItemInterface;

// The callable will only be executed on a cache miss.
$value = $cache->get('my_cache_key', function (ItemInterface $item) {
    $item->expiresAfter(3600);
    $computedValue = 'foobar';

    return $computedValue;
});
echo $value; // 'foobar'
$cache->delete('my_cache_key');

$build = new PharColletions\FoukaCMS\Builder() ; 

?>

