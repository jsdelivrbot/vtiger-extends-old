<?php
/**
 *
 */

require_once __DIR__.'/vendor/autoload.php';

use Javanile\VtigerExtends\Extension;

$extension = new Extension(__DIR__);

$extension->addCommonPatch();

$extension->addPatch('patch name', function () use ($adb) {



});
