<?php
/**
 *
 */

set_include_path(__DIR__.'/../');
require_once __DIR__.'/vendor/autoload.php';


// load modules
foreach (scandir(__DIR__.'/src/Modules') as $module) {
    if ($module[0] != '.' && file_exists($file = __DIR__.'/src/Modules/'.$module)) {
        require_once $file;
        $class = '\\VtigerExtends\\Modules\\'.basename($module, '.php');

    }
}

$extension->addPatch('patch name', function () {

});



*/