<?php
    require_once "DataBase.class.php";
    require_once "HelperDataBase.class.php";
/**
 * Created by PhpStorm.
 * User: Desenvolvedor
 * Date: 22/09/2016
 * Time: 21:36
 */
    class ModelBeneficiosExperiencia extends HelperDataBase
    {
        public function CreateBeneficiosExperiencia($Data)
        {
            return parent::Create("beneficiosEntrevista", $Data);
        }

        public function ReadBeneficiosExperiencia( $Condition)
        {
            return parent::Read("beneficiosEntrevista", $Condition);
        }

        public function UpdateBeneficiosExperiencia($Field, $NewValue, $Id)
        {
            return parent::Update("beneficiosEntrevista",$Field, $NewValue, $Id);
        }

        public function DeleteBeneficiosExperiencia($Condition)
        {
            return parent::Delete("beneficiosEntrevista", $Condition);
        }
    }
?>
