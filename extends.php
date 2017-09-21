<?php
/**
 *
 */

set_include_path(__DIR__.'/../');
require_once __DIR__.'/vendor/autoload.php';

$extension = new Extension(__DIR__);

// load modules
foreach (scandir(__DIR__.'/src/Modules') as $module) {
    require_once __DIR__.'/src/Modules/'.$module.'.php';

    $class = new ReflectionClass('\\Javanile\\VtigerExtends\\Modules\\'.$module);
    $methods = $class->getMethods();
    var_dump($methods);
}

$extension->addPatch('patch name', function () {

});



