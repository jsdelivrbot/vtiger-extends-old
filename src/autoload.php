<?php

require_once __DIR__.'/extends/vendor/autoload.php';

function vtigerextends_class_loader($a, $b, $c)
{


    echo '<pre>';
    $backtrace = debug_backtrace();

    var_dump($backtrace);



    die();

}
