<?php

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
            return parent::Create("mensagens", $Data);
        }

        public function ReadMensagens($Condition)
        {
            return parent::Read("mensagens", $Condition);
        }

        public function UpdateMensagens($Field, $NewValue, $Id)
        {
            return parent::Update("mensagens", $Field, $NewValue, $Id);
        }

        public function DeleteMensagens($Condition)
        {
            return parent::Delete("mensagens", $Condition);
        }
    }

?>