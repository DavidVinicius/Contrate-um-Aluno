<?php

/**
 * Created by PhpStorm.
 * User: Desenvolvedor
 * Date: 22/09/2016
 * Time: 21:33
 */
    class ModelCurso extends HelperDataBase
    {
        public function CreateCurso($Data)
        {
            return parent::Create("curso", $Data);
        }

        public function ReadCurso($Condition)
        {
            return parent::Read("curso", $Condition);
        }

        public function UpdateCurso($Field, $NewValue, $Id)
        {
            return parent::Update("curso",$Field, $NewValue, $Id);
        }

        public function DeleteCurso($Condition)
        {
            return parent::Delete("curso", $Condition);
        }
    }
?>