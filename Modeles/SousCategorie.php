<?php


/** Eya nextweb**/


class SousCategorie extends lib {

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
         //echo $query."</br>";
             $stmt=$this->conn->prepare($query);
             $stmt->execute();
                   
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }

        return $stmt->fetchAll();
    }
     function getCategoriebyid($id){
        
        try {
            
            
            $query = "SELECT * FROM `$this->table` WHERE  `id_souscategorie`=$id";
        // echo $query;
             $stmt=$this->conn->prepare($query);
             $stmt->execute();
                   
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }

        return $stmt->fetchAll();
        
        
        
    }
     function deletdata($id) {
        
         
        $query="DELETE FROM `$this->table` where `id_souscategorie`=$id ";
         echo $query;
        $result=$this->conn->select($query);
        
        return $result;
        
        
        
    }
    function adddata($data) {
        foreach ($data as $key => $value) {

            $arkey[] = $key;
            $arvalue[] = $value;
        }
        $tabKeys = implode(',', $arkey);
        $tabvalue = '"' . implode('","', $arvalue) . '"';
        echo $query = "INSERT INTO `$this->table` ($tabKeys) VALUES ($tabvalue)";

        $result = $this->conn->select($query);
       // $this->id_insert = $this->conn->GetID();
        return $result;
    }

}

//put your code here

