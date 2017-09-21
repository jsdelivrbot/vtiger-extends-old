<?php
/**
 *
 */

require_once __DIR__.'/vendor/autoload.php';

use Javanile\VtigerExtends\VtigerContext;

$context = new VtigerContext(__DIR__);

$context->injectGlobal();

/*
$context->addPatch('patch name', function () {

});

$context->addPatch('patch name', function () use ($adb) {

});
*/