<?php
    require_once "DataBase.class.php";
    require_once "HelperDataBase.class.php";
/**
 * Created by PhpStorm.
 * User: Desenvolvedor
 * Date: 22/09/2016
 * Time: 21:28
 */
    class Mensagens extends HelperDataBase
    {
        public function CreateMensagens($Data)
        {
            return parent::Create("notificacoes", $Data);
        }

        public function ReadMensagens($Condition)
        {
            return parent::Read("notificacoes", $Condition);
        }

        public function UpdateMensagens($Field, $NewValue, $Id)
        {
            return parent::Update("notificacoes", $Field, $NewValue, $Id);
        }

        public function DeleteMensagens($Condition)
        {
            return parent::Delete("notificacoes", $Condition);
        }
    }

?>
