<?php

/**
 * Created by PhpStorm.
 * User: INFOLABS
 * Date: 15/09/2016
 * Time: 18:37
 */
    class DataBase
    {
        private $User;
        private $Pass;
        private $DataBase;
        private $Host;

        function __construct()
        {
            $this->setUser("root");
            $this->setPass("123");
            $this->setHost("localhost");
            $this->setDataBase("tcc");
        }

        public function ConnectDataBase()
        {
            $Connection = mysqli_connect( $this->getHost(), $this->getUser(), $this->getPass(), $this->getDataBase() );
            return $Connection;
        }

        public function CloseConnectionDataBase($Connection)
        {
            $Result = mysqli_close($Connection);
            return $Result;
        }

        public function ExecuteQuery($Connection, $Query)
        {
            $Result = mysqli_query($Connection, $Query);
            return $Result;
        }

        public function InsertQuery($Table, array $Data)
        {
            $Connection = $this->ConnectDataBase();
            $Fields = implode(", ", array_keys($Data));  #Pega as keys do array e joga na variável campos
            $Values = "'".implode("', '", $Data)."'";    #Pega o array dados e transforma em apenas 1 variável, separadas por vírgula

            $Query = "INSERT INTO {$Table} ({$Fields}) VALUES({$Values})";
            $Result = ExecutarQuery($Query);  #Executa a query, e guarda 1 pra executado, 0 pra falha
            $this->CloseConnectionDataBase($Connection);
            return $Result;
        }

        public function SearchQuery($Table, $Condition = null, $Fields = "*")
        {
            $Connection = $this->ConnectDataBase();
            $Query = "SELECT {$Fields} FROM {$Table} {$Condition}";
            $Result = $this->ExecuteQuery($Query);
            $this->CloseConnectionDataBase($Connection);
            return $Result;
        }

        public function getHost()
        {
            return $this->Host;
        }

        public function setHost($Host)
        {
            $this->Host = $Host;
        }

        public function getDataBase()
        {
            return $this->DataBase;
        }

        public function setDataBase($DataBase)
        {
            $this->DataBase = $DataBase;
        }

        public function getUser()
        {
            return $this->User;
        }

        public function setUser($User)
        {
            $this->User = $User;
        }

        public function getPass()
        {
            return $this->Pass;
        }

        public function setPass($Pass)
        {
            $this->Pass = $Pass;
        }



    }

?>