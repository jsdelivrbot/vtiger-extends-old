<?php
/**
 *
 *
 */

/**
 *
 */
function vtiger_extends_init()
{

}

/**
 *
 */
function vtiger_extends_load_modules()
{
    require_once 'modules/com_vtiger_workflow/VTEntityMethodManager.inc';

    foreach (scandir(__DIR__.'/modules') as $module) {
        if ($module[0] != '.' && file_exists($file = __DIR__.'/modules/'.$module)) {
            require_once $file;
            $class = '\\VtigerExtends\\Modules\\'.basename($module, '.php');
            $reflect = new ReflectionClass($class);
            foreach ($reflect->getMethods() as $method) {
                $doc = $reflect->getMethod($method->name)->getDocComment();
                preg_match_all('#@(.*?)\n#s', $doc, $annotations);

                if (in_array("Action", $annotations[1])) {
                    vtiger_extends_patch_action($method->name);
                }

                if (in_array("Extend", $annotations[1])) {
                    vtiger_extends_patch_extend($method->name);
                }
            }
        }
    }
}

/**
 *
 */
function vtiger_extends_patch_action($method)
{
    echo 'Register action: '.$method."\n";
}

/**
 *
 */
function vtiger_extends_patch_extend($method)
{
    echo 'Register extend: '.$method."\n";
}

