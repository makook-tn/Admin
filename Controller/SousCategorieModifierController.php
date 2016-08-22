<?php
 include '../Modeles/autoloader.php';
 error_reporting();
 if(!empty($_POST)){
 if(@$_POST['id_souscategorie']){


$Annonce=new update($_POST, 'souscategorie',$_POST['id_souscategorie']);
}
elseif($_POST['id_Categorie']){
    echo 'post id_categorie';
    $SousCategories=new SousCategorie('souscategorie');
    $SousCategories-> adddata($_POST);
    
    
}




    }

if(@$_GET['action']=='deleteSousCategorie'){
   
    $SousCategorie=new SousCategorie('souscategorie');
    $SousCategorie->deletdata($_GET['id']);
    
    
}
