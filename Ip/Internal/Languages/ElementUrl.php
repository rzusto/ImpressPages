<?php
/**
 * @package		Library
 *
 *
 */
namespace Ip\Internal\Languages;


class ElementUrl extends \Ip\Lib\StdMod\Element\Text{

    function checkField($prefix, $action, $area){


        switch ($action){
            case 'insert':
                $tmpLanguage = Db::getLanguageByUrl($_REQUEST[''.$prefix]);
                if($tmpLanguage){
                    return __('Duplicate URL', 'ipAdmin');
                }

                break;
            case 'update':
                $tmpLanguage = Db::getLanguageByUrl($_REQUEST[''.$prefix]);
                if($tmpLanguage && $tmpLanguage['id'] != $area->currentId){
                    return __('Duplicate URL', 'ipAdmin');
                }
                break;
        }

        return parent::checkField($prefix, $action, $area);
    }


}