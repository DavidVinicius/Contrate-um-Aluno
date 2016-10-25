<?php
    require_once "DataBase.class.php";
    require_once "HelperDataBase.class.php";
/**
 * Created by PhpStorm.
 * User: Desenvolvedor
 * Date: 22/09/2016
 * Time: 21:33
 */
    class ModelQualificacoes extends HelperDataBase
    {
        public function CreateQualificacoes($Data)
        {
            return parent::Create("qualificacoes", $Data);
        }

        public function ReadQualificacoes($Condition)
        {
            return parent::Read("qualificacoes", $Condition);
        }

        public function UpdateQualificacoes($Field, $NewValue, $Id)
        {
            return parent::Update("qualificacoes",$Field, $NewValue, $Id);
        }

        public function DeleteQualificacoes($Condition)
        {
            return parent::Delete("qualificacoes", $Condition);
        }
    }
?>