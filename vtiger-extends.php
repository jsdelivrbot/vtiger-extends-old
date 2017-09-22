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
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
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
            $moduleName = basename($module, '.php');
            $class = '\\VtigerExtends\\Modules\\'.$moduleName;
            $reflect = new ReflectionClass($class);
            foreach ($reflect->getMethods() as $method) {
                $doc = $reflect->getMethod($method->name)->getDocComment();
                preg_match_all('#@(.*?)\n#s', $doc, $annotations);

                if (in_array("Action", $annotations[1])) {
                    vtiger_extends_patch_action($moduleName, $method->name);
                }

                if (in_array("Extend", $annotations[1])) {
                    vtiger_extends_patch_extend($moduleName, $method->name);
                }
            }
        }
    }
}

/**
 *
 */
function vtiger_extends_patch_action($module, $method)
{
    global $adb;

    $json = vtiger_extends_load_json();
    $actionName = $module.'::'.$method;

    if (!isset($json['action'][$actionName])) {
        echo 'Register action: '.$method."\n";

        $json['action'][$actionName] = time();
        require_once 'modules/com_vtiger_workflow/VTEntityMethodManager.inc';
        $emm = new VTEntityMethodManager($adb);
        $emm->addEntityMethod($module, $method, 'extends/autoload.php', 'vtiger_extends_capture_action');
        vtiger_extends_save_json($json);
    }
}

/**
 *
 */
function vtiger_extends_patch_extend($method)
{
    echo 'Register extend: '.$method."\n";
}

/**
 *
 */
function vtiger_extends_load_json()
{
    return json_decode(file_get_contents(__DIR__.'/vtiger-extends.json'), true);
}

/**
 *
 */
function vtiger_extends_save_json($json)
{
    return file_put_contents(
        __DIR__.'/vtiger-extends.json',
        json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
    );
}