<?php
    require_once "DataBase.class.php";
    require_once "HelperDataBase.class.php";
/**
 * Created by PhpStorm.
 * User: Desenvolvedor
 * Date: 22/09/2016
 * Time: 21:33
 */
    class ModelNotificacoesCandidatouse extends HelperDataBase
    {
        public function CreateNotificacoesCandidatouse($Data)
        {
            return parent::Create("notificacoesCandidatouse", $Data);
        }

        public function ReadNotificacoesCandidatouse($Condition)
        {
            return parent::Read("notificacoesCandidatouse", $Condition);
        }

        public function UpdateNotificacoesCandidatouse($Field, $NewValue, $Id)
        {
            return parent::Update("notificacoesCandidatouse",$Field, $NewValue, $Id);
        }

        public function DeleteNotificacoesCandidatouse($Condition)
        {
            return parent::Delete("notificacoesCandidatouse", $Condition);
        }
    }
?>