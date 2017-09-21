<?php
/**
 *
 */

set_include_path(__DIR__.'/../');
require_once __DIR__.'/vendor/autoload.php';
use Javanile\VtigerExtends\Extension;

$extension = new Extension(__DIR__);

$o = new \Javanile\VtigerExtends\Modules\Contacts();

/*
// load modules
foreach (scandir(__DIR__.'/src/Modules') as $module) {
    if ($module[0] != '.' && file_exists($file = __DIR__.'/src/Modules/'.$module)) {
        include_once $file;
        $class = '\\Javanile\\VtigerExtends\\Modules\\'.basename($module, '.php');
        new $class();
    }
}

$extension->addPatch('patch name', function () {

});



*/