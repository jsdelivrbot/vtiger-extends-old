<?php

namespace Javanile\VtigerExtends;

class VtigerContext
{
    public function __construnct()
    {

    }

    public function addCommonPatch()
    {
        require_once 'modules/com_vtiger_workflow/VTEntityMethodManager.inc';
        $emm = new VTEntityMethodManager($adb);
        $emm->addEntityMethod(
            'Contacts',
            'Action Title as method',
            'vtigerextends-class.php',
            'vtigerextends_class_loader'
        );
    }

    public function addPatch($name, )
    {

    }






}
