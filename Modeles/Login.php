<?php

class login extends lib {

    private $username;
    private $password;
    private $query;
    private $con;

    function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
        $this->query = "SELECT `username`, `password`, `createdDate` FROM `user` WHERE `username`='$this->username' AND `password`='$this->password'";
        $this->con = $this->connetDB();
        
    }

    function getDataRow() {
        $result[] = $this->con->selectTableau($this->query);
        if (count($result) > 0) {
            return TRUE;
        } else {
            throw new Exception("this USERNAME OR PASSWORD IS INVALID");
            return FALSE;
        }
    }

}
