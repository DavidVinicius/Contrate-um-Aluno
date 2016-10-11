<?php
    include "DataBase.class.php";

    class HelperDataBase
    {
        public function InstanciaDB()
        {
            return $DB = new Database();
        }

        public function Create($Table, $Data)
        {
            $DB = $this->InstanciaDB();
            return $Result = $DB->InsertQuery($Table, $Data);
        }

        public function Read($Table, $Condition)
        {
            $DB = $this->InstanciaDB();
            return $Result = $DB->SearchQuery($Table, $Condition);
        }

        public function Update($Table,$Field, $NewValue, $Id)
        {
            $DB = $this->InstanciaDB();
            return $Result = $DB->UpdateQuery($Table, $Field, $NewValue, " WHERE idAluno = $Id");
        }

        public function Delete($Table, $Condition)
        {
            $DB = $this->InstanciaDB();
            return $Result = $DB->DeleteQuery($Table, $Condition);
        }
    }
?>