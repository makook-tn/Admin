<?php

class lib {
    private $con;
    
    function connetDB(){
        $this->con=new Database();
        return $this->con ;
         
    }
    
}






