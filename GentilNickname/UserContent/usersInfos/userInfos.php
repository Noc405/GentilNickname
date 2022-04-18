<?php

class connexionValues {
    private $host = "localhost";
    private $user = 'dbUser_EmilienCharpie';
    private $password = '.Etml-';
    private $dbname = "db_nickname_emilien";

    public function getValues(){
        $values = array("host"=>$this->host, "user"=>$this->user, "dbname"=>$this->dbname, "password"=>$this->password);
        return $values;
    }
}
?>