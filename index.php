<?php
require_once './vendor/autoload.php';



/*---------------------------------------------------------------*/
/*
    Titre : Calcul et retourne le temps de chargement des pages

    URL   : https://phpsources.net/code_s.php?id=166
    Auteur           : TommyWeb
    Date édition     : 03 Mars 2006
    Date mise à jour : 15 Aout 2019
    Rapport de la maj:
    - fonctionnement du code vérifié
*/
/*---------------------------------------------------------------*/
    function getmicrotime(){
        list($usec, $sec) = explode(" ",microtime());
        return ((float)$usec + (float)$sec);
    }
    $debut = getmicrotime();



use Symfony\Component\Cache\Adapter\FilesystemAdapter;

// init cache pool of file system adapter
$cachePool = new FilesystemAdapter('', 0, "cache");



if ($cachePool->hasItem('demo_string'))
{
    $demoString = $cachePool->getItem('demo_string');
    $variable =  $demoString->get();
}else{
    sleep(1) ;
    $demoString = $cachePool->getItem('demo_string');
    $demoString->set('Hello World!');
    $demoString->expiresAfter(5);
    $cachePool->save($demoString);
}


echo "<h1>hello Cache/Symfony 4ss 8589898  </h1>" ;


    $fin = getmicrotime();
    echo "Page générée en ".round($fin-$debut, 3) ." secondes.<br />";

//$cachePool->clear() ;