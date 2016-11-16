<?php
    require_once "DataBase.class.php";
    require_once "HelperDataBase.class.php";
/**
 * Created by PhpStorm.
 * User: Desenvolvedor
 * Date: 22/09/2016
 * Time: 21:36
 */
    class Respostas extends HelperDataBase
    {
        public function CreateRespostas($Data)
        {
            return parent::Create("respostas", $Data);
        }

        public function ReadRespostas( $Condition)
        {
            return parent::Read("respostas", $Condition);
        }

        public function UpdateRespostas($Field, $NewValue, $Id)
        {
            return parent::Update("respostas",$Field, $NewValue, $Id);
        }

        public function DeleteRespostas($Condition)
        {
            return parent::Delete("respostas", $Condition);
        }
    }
?>
