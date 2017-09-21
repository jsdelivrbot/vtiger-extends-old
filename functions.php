<?php

//
function vtigerextends($name, $callable)
{
    $extends = (array) json_decode(file_get_contents(__DIR__.'/vtigerextends.json'), true);

    if (!isset($extends[$name])) {
        $extends[$name] = 1;
        file_put_contents(__DIR__.'/vtigerextends.json', json_encode($extends));
        call_user_func($callable);
        echo 'Extension installed: '.$name."\n";
    }
}

//
vtigerextends('Use action title as method name', function() use ($adb) {
    require_once 'modules/com_vtiger_workflow/VTEntityMethodManager.inc';
    $emm = new VTEntityMethodManager($adb);
    $emm->addEntityMethod(
        'Contacts',
        'Action Title as method',
        'vtigerextends-class.php',
        'vtigerextends_class_loader'
    );
});
