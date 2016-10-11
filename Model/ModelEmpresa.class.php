<?php

/**
 * Created by PhpStorm.
 * User: Desenvolvedor
 * Date: 22/09/2016
 * Time: 21:29
 */
    class ModelEmpresa extends HelperDataBase
    {
        public function CreateEmpresa($Data)
        {
            return parent::Create("empresa",$Data);
        }

        public function ReadEmpresa($Condition)
        {
            return parent::Read("empresa",$Condition);
        }

        public function UpdateEmpresa($Field, $NewValue, $Id)
        {
            return parent::Update("empresa", $Field, $NewValue, $Id);
        }

        public function DeleteEmpresa($Condition)
        {
            return parent::Delete("empresa", $Condition);
        }
    }
?>