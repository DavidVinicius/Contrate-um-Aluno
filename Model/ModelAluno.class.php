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
        public function CreateAluno($Data)
        {
            return parent::Create("aluno", $Data);
        }

        public function ReadAluno( $Condition)
        {
            return parent::Read("aluno", $Condition);
        }

        public function UpdateAluno($Field, $NewValue, $Id)
        {
            return parent::Update("aluno",$Field, $NewValue, $Id);
        }

        public function DeleteAluno($Condition)
        {
            return parent::Delete("aluno", $Condition);
        }

    }
?>