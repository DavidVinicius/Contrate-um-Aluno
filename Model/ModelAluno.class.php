<?php
    include_once("DataBase.class.php");
    include("HelperDataBase.class.php");
    $DB = new DataBase();
/**
 * Created by PhpStorm.
 * User: Desenvolvedor
 * Date: 22/09/2016
 * Time: 21:36
 */
    class ModelAluno extends HelperDataBase
    {
        public function CreateAluno($Table, $Data)
        {
            return parent::Create($Table, $Data);
        }

        public function ReadAluno($Table, $Condition)
        {
            return parent::Read($Table, $Condition);
        }

        public function UpdateAluno($Field, $NewValue, $Id)
        {
            return parent::Update($Field, $NewValue, $Id);
        }

        public function DeleteAluno($Table, $Condition)
        {
            return parent::Delete($Table, $Condition);
        }

    }
?>