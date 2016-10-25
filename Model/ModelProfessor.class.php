<?php
    require_once "DataBase.class.php";
    require_once "HelperDataBase.class.php";
/**
 * Created by PhpStorm.
 * User: Desenvolvedor
 * Date: 22/09/2016
 * Time: 21:32
 */
    class ModelProfessor extends HelperDataBase
    {
        public function CreateProfessor($Data)
        {
            return parent::Create("professor", $Data);
        }

        public function ReadProfessor($Condition)
        {
            return parent::Read("professor", $Condition);
        }

        public function UpdateProfessor($Field, $NewValue, $Id)
        {
            return parent::Update("professor", $Field, $NewValue, $Id);
        }

        public function DeleteProfessor($Condition)
        {
            return parent::Delete("professor", $Condition);
        }
    }

?>