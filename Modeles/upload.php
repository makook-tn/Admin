<?php

class upload {
    private $file;
    private $maxsize;
    private $directory;
    private $fileURL=array();
    
    function __construct($file, $maxsize, $directory) {
        
        if(is_array($file) AND is_int($maxsize)){
        $this->file = $file;
        $this->maxsize = $maxsize;
        $this->directory = $directory;
        $this->uploadfile();
       
        }
        else {
            throw new Exception("EXTENSION MUST BE IN ARRAY AND MAX SIZE MUST BE INTEGER");
        }
    }
    function uploadfile()
    {
       
       $files= $this->file ;
       $maxsize =$this->maxsize  ;
       $directory =$this->directory ;
       
        
         for ($i = 0; $i < count($files['name']); $i++)
         {
         
        $file = rand(1000,100000)."_".  date("d-m-Y")."_".$files['name'][$i];
        $file_loc = $files['tmp_name'][$i];
        $file_size =$files['size'][$i];
        $file_type =$files['type'][$i];
        $folder=$directory;
        $new_size = $file_size/1024;  
       $new_file_name = strtolower($file);
        $final_file=str_replace(' ','-',$new_file_name);
        

            if($file_size > $maxsize){
                $ERROR="FILE SIZE MUST BE LESS THEN 2MO ";

            }
            else 
            {   
              try{  
                  $this->fileURL[]=$folder.$final_file;
                move_uploaded_file($file_loc,$folder.$final_file);

            }
            catch (Exception $e){
                $e->getMessage();
            }
            
              }
            
         }
         return ;
    }
    
    function  getURL()
    {
        return $this->fileURL;
    }








    //put your code here
}
