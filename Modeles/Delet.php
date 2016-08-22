<?php


class Delet extends lib{
    private $id;
    private  $table;
    private $con;
 
            function __construct($table,$id) {
        
        $this->id= $id;
        $this->table=$table;
        $this->con=$this->connetDB();
        //$this->con=$this->connetDB()
        echo 'add 2' ; 
        $this->deletdata($this->id);
        echo 'add 1' ; 
        //$this->con->close();
        
        
        
    }
    
            
    function deletdata($id) {
        
         
        $query="DELETE FROM `$this->table` where `id_$this->table`=$id ";
       echo $query;
        $result=$this->con->select($query);
        
        return $result;
        
        
        
    }
    

    




    //put your code here
}
