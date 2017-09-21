<?php
/**
 *
 *
 */

function vtiger_extends_load_modules() use ($adb)
{
    require_once 'modules/com_vtiger_workflow/VTEntityMethodManager.inc';

    foreach (scandir(__DIR__.'/modules') as $module) {
        if ($module[0] != '.' && file_exists($file = __DIR__.'/modules/'.$module)) {
            $class = '\\VtigerExtends\\Modules\\'.basename($module, '.php'));
            foreach (get_class_methods($class) as $method) {
                vtiger_extends_patch("load module method: {$class}::{$method}", function() use ($adb) {
                    $emm = new VTEntityMethodManager($adb);
                    $emm->addEntityMethod(
                        'Contacts',
                        'Action Title as method',
                        'vtigerextends-class.php',
                        'vtigerextends_class_loader'
                    );
                });
            }
        }
    }
}

/**
 *
 */
function vtiger_extends_patch()
{

}

