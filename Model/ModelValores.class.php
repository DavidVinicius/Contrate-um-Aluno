<?php
    require_once "DataBase.class.php";
    require_once "HelperDataBase.class.php";
/**
 * Created by PhpStorm.
 * User: Desenvolvedor
 * Date: 22/09/2016
 * Time: 21:33
 */
    class Valores extends HelperDataBase
    {
        public function CreateValores($Data)
        {
            return parent::Create("valores", $Data);
        }

        public function ReadValores($Condition)
        {
            return parent::Read("valores", $Condition);
        }

        public function UpdateValores($Field, $NewValue, $Id)
        {
            return parent::Update("valores",$Field, $NewValue, $Id);
        }

        public function DeleteQualificacoes($Condition)
        {
            return parent::Delete("valores", $Condition);
        }
    }
?>
