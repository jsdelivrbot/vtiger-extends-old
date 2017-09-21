<?php
/**
 *
 */

//
set_include_path(__DIR__.'/../');
require_once __DIR__.'/vendor/autoload.php';

//
vtiger_extends_init();
vtiger_extends_load_modules();

//
vtiger_extends_patch('My Patch', function() use ($adb) {

});
