<?php


class update extends lib{
    private $data;
    private  $table;
    private $con;
    private $id_insert;
            function __construct($data,$table,$id) {
        if(is_array($data)){
         //  echo 'update 1' ; 
        $this->data = $data;
        $this->table=$table;
        $this->id_insert=$id;
        $this->con=$this->connetDB();
        //$this->con=$this->connetDB()
      //  echo 'update 2' ; 
        $this->updatedata($this->data);
       // echo 'update 1' ; 
        //$this->con->close();
        
        
        }
        else
        {
            throw new Exception ('ERROR: DATA NOT BE IN ARRAY');
        }
    }
    
            
    function updatedata($data) {
        $som="";
        foreach ($data as $key => $value) {
            
         $arkey[]=$key;
           $arvalue[]=$value;
          
                                                }
                                               
                                                
      // echo $tabKeys=  implode( ',',$arkey)  ; 
        //echo $tabvalue=  '"'.implode( '","',$arvalue).'"'  ;  
        for ($index = 0; $index < count($arkey)-1; $index++) {
           $som.="`".$arkey[$index]."`='".$arvalue[$index]."',";
        }
        $som.="`".$arkey[$index]."`='".$arvalue[$index]."'";
        echo $som;
       $query='UPDATE `'.$this->table.'` SET '.$som.' where `id_'.$this->table.'`='.$this->id_insert;
        echo $query;
        $result=$this->con->select($query);
        $this->id_insert=  $this->con->GetID();
        return $result;
        
        
        
    }
    

    




    //put your code here
}
