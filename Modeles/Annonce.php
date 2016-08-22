<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Annonce
 *
 * @author Eya  Nextweb
 */
class Annonce extends lib {

    private $conn;
    private $table;

    public function __construct($table) {

        try {
            $this->table = $table;
            $database = new lib();
            $this->conn = $database->connetDB();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    public function runQuery($sql) {
        echo $sql;
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }

    function getDataBYcond($con) {
       
        try {
            
            
            $query = "SELECT * FROM `$this->table` WHERE $con ";
          // echo $query;
             $stmt=$this->conn->prepare($query);
             $stmt->execute();
                   
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }

        return $stmt->fetchAll();
    }
    

}

//put your code here

