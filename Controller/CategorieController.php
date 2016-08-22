
<?php
include '../Modeles/autoloader.php';
//var_dump($_GET);
//var_dump($_POST);
if(!empty($_POST)){
    
    $categorie=new Categorie('categorie_annonce');
    $categories=$categorie->getDataBYcond("titre like '".$_POST['titre']."'");
    var_dump($categories);
    if(empty($categories)){
    $categorie->adddata($_POST);
    echo 'suceess';
    }
    else {
        echo 'existe';
    }
   
    
    
}
elseif(!empty($_GET)){
    
           $action=$_GET['action'];
            $id=@$_GET['id'];
            
if($action=='deleteCategorie'){
    $categorie=new Categorie('categorie_annonce');
    $categorie->deletdata($id);
}
            
elseif($action=='editCategorie'){
    
    $categorie=new Categorie('categorie_annonce');
    $categories=$categorie->getCategoriebyid($id);
    //var_dump($categories);
 
    echo "<div id='myModal' class='modal fade'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-header'>
                
                <h4 class='modal-title'>Modification Catégorie</h4>
            </div>
            <div class='modal-body'>
                <p>Voullez vous modifier la Catégorie</p>
                <div id='success' class='uk-alert-success' ></div>
                <p class='uk-text-large uk-text-nowrap' >{$categories['0']['titre']} </p>
                <div class='form-group'>
                <div class='md-input-wrapper md-input-wrapper-count'>
                <label>Titre</label>
                <input type='hidden' id='idCategorie' value='{$categories['0']['id_categorie']} '/>
                <input type='text' class='input-count md-input' id='titreCategorie' maxlength='60'>
                <div id='input_counter_counter' class='text-count-wrapper'></div>
                <span class='md-input-bar '></span></div>
                </div>
                <p class='text-warning'><small>Si vous ne sauvegardez pas , vos modifications seront perdues.</small></p>
                 </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-default' data-dismiss='modal' onclick='fermer()'>Fermer</button>
                <button type='button' class='btn btn-primary' onclick='enregistrer()'>Enregistrer</button>
            </div>
        </div>
    </div>
</div>";
    
}
elseif($action=='save'){
    $data['titre']=$_GET['titre'];
    $update=new Categorie('categorie_annonce');
    $updates=$update->updatedata($data, $id);

    
    
}
elseif($action=='addCategorie'){
    
    echo "<div id='myModal' class='modal fade'>
        <div class='modal-dialog'>
        <div class='modal-content'>
         <form id='form-add-cat'>
            <div class='modal-header'>
                
                <h4 class='modal-title'>Ajout Catégorie</h4>
            </div>
            <div class='modal-body'>
                <p>Voullez vous Ajouter une Catégorie</p>
                <div id='success' class='uk-alert-success' ></div>
                
                <div class='form-group'>
                        <div class='md-input-wrapper md-input-wrapper-count'>
                            <label>Titre</label>
                            <input type='text' class='input-count md-input' id='titreCategorie' maxlength='60' name='titre'>
                            <div id='input_counter_counter' class='text-count-wrapper'></div>
                            <span class='md-input-bar '></span>
                        </div>
                </div>
                
                <p class='text-warning'><small>Si vous ne sauvegardez pas , vos modifications seront perdues.</small></p>
                 </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-default' data-dismiss='modal' onclick='fermer()'>Fermer</button>
                <button type='button' class='btn btn-primary' onclick='Add()'>Enregistrer</button>
            </div>
            </form>
        </div>
    </div>
</div>";
    $_GET="";
   
    
    
    
}

}


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

