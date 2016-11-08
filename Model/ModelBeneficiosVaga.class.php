<?php
    require_once "DataBase.class.php";
    require_once "HelperDataBase.class.php";
/**
 * Created by PhpStorm.
 * User: Desenvolvedor
 * Date: 22/09/2016
 * Time: 21:36
 */
    class ModelBeneficiosVaga extends HelperDataBase
    {
        public function CreateBeneficiosVaga($Data)
        {
            return parent::Create("beneficiosvaga", $Data);
        }

        public function ReadBeneficiosVaga( $Condition)
        {
            return parent::Read("beneficiosvaga", $Condition);
        }

        public function UpdateBeneficiosVaga($Field, $NewValue, $Id)
        {
            return parent::Update("beneficiosvaga",$Field, $NewValue, $Id);
        }

        public function DeleteBeneficiosVaga($Condition)
        {
            return parent::Delete("beneficiosvaga", $Condition);
        }
    }
?>
