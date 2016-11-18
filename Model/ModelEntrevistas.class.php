<?php
    require_once "DataBase.class.php";
    require_once "HelperDataBase.class.php";
/**
 * Created by PhpStorm.
 * User: Desenvolvedor
 * Date: 22/09/2016
 * Time: 21:36
 */
    class ModelEntrevistas extends HelperDataBase
    {
        public function CreateEntrevista($Data)
        {
            return parent::Create("entrevistas", $Data);
        }

        public function ReadEntrevista( $Condition)
        {
            return parent::Read("entrevistas", $Condition);
        }

        public function UpdateEntrevista($Field, $NewValue, $Id)
        {
            return parent::Update("entrevistas",$Field, $NewValue, $Id);
        }

        public function DeleteEntrevista($Condition)
        {
            return parent::Delete("entrevistas", $Condition);
        }
    }
?>
