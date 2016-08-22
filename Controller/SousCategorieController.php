
<?php
include '../Modeles/autoloader.php';
//var_dump($_POST);
//var_dump($_GET);
$action=$_GET['action'];
$id=@$_GET['id'];
if($action=='deleteCategorie'){
    $Souscategorie=new SousCategorie('souscategorie');
    $Souscategorie->deletdata($id);
}
elseif($action=='editCategorie'){
    $Souscategorie=new SousCategorie('souscategorie');
    $Souscategories=$Souscategorie->getCategoriebyid($id);
    //var_dump($Souscategories);
 
    echo "<div id='myModal' class='modal fade'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-header'>
                
                <h4 class='modal-title'>Modification Sous Catégorie</h4>
            </div>
            <div class='modal-body'>
            <form id='form-edit-cat'>
                <p>Voullez vous modifier la Sous Catégorie</p>
                <div id='success' class='uk-alert-success' ></div>
                <p class='uk-text-large uk-text-nowrap' >{$Souscategories['0']['titre']} </p>
                  <div class='form-group'>
                <div class='md-input-wrapper md-input-wrapper-count'>
                <label>Titre</label>
                <input type='text' class='input-count md-input' name='titre' value='{$Souscategories['0']['titre']}' maxlength='60'>
                <div id='input_counter_counter' class='text-count-wrapper'></div>
                <span class='md-input-bar '></span></div>
                </div>
                <div class='form-group'>
                <div class='md-input-wrapper md-input-wrapper-count'>
                       
                        <input type='hidden' id='idCategorie' name='id_souscategorie' value='{$Souscategories['0']['id_souscategorie']} '/>"
                        . "<div>";
                        for ($i = 3;$i < 21;$i++) {
                  //  echo $i;
                    if(!empty($Souscategories['0'][$i])){
                        //echo "yes";
                       $j=$i-2;
                        echo "<div class='md-input-wrapper md-input-wrapper-count'> 
                         <label>Critere {$j}</label>
                     
                        <input type='text' class='input-count md-input' value='{$Souscategories['0'][$i]}' name='Critere_{$j}' maxlength='60'>
                        <span class='md-input-bar '></span></div>";
                    }
                    else {
                        break;
                    }
                
                 } 
                // echo $i;
                 
                 if($i<21){
                    
                     
                     echo"<div id='ajoutinput{$i}' class='uk-width-1-10 uk-text-center ajout-button ' >
                                        <div class='uk-vertical-align uk-height-1-1'>
                                            <div class='uk-vertical-align-middle'>
                                                <a onclick='AjoutInputCriétre({$i})' class='btnSectionClone' ><i class='material-icons md-36'></i></a>
                                            </div>
                                        </div>
                                    </div>";
                                                

                     
                     
                 }
                 echo "<div id='appendInput' ></div>";
                        

                echo "</div>
                <p class='text-warning'><small>Si vous ne sauvegardez pas , vos modifications seront perdues.</small></p>
                 </div>
                 <div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-default' data-dismiss='modal' onclick='fermer()'>Fermer</button>
                <button type='button' class='btn btn-primary' onclick=modifierCritére() >Enregistrer</button>
            </div>
            </form>
        </div>
    </div>
</div>";
    
}
elseif($action=='save'){
    $data['titre']=$_GET['titre'];
    $update=new Categorie('categorie_annonce');
    $updates=$update->updatedata($data, $id);

    
    
}
elseif($action=='AddSousCategorie'){
    
    echo "<div id='myModal' class='modal fade'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-header'>
                
                <h4 class='modal-title'>Création Sous Catégorie</h4>
                <p>Voullez vous créer une Sous Catégorie</p>
                 <div id='success' class='uk-alert-success' ></div>
            </div>
            <div class='modal-body'>
            <form id='form-add-souscat'>
                
                <div id='success' class='uk-alert-success' ></div>
                
                  <div class='form-group'>
                <div class='md-input-wrapper md-input-wrapper-count'>
                <input type='hidden' class='input-count md-input' name='id_Categorie' value='{$_GET['id']}'>
                <label>Titre</label>
                <input type='text' class='input-count md-input' name='titre' maxlength='60'>
                <div id='input_counter_counter' class='text-count-wrapper'></div>
                <span class='md-input-bar '></span></div>
                </div>
                <div class='form-group'>
                            <div class='md-input-wrapper md-input-wrapper-count'>
                       ". " <div>";
                        for ($i = 3;$i < 21;$i++) {
                  //  echo $i;
                    
                        //echo "yes";
                       $j=$i-2;
                        echo "<div class='md-input-wrapper md-input-wrapper-count'> 
                         <label>Critere {$j}</label>
                     
                        <input type='text' class='input-count md-input' value='' name='Critere_{$j}' maxlength='60'>
                        <span class='md-input-bar '></span>
                        </div>";
                    
                
                 }       
                        

                echo "</div></div></div>
               
                 </div>
            <div class='modal-footer'>
             <p class='text-warning'><small>Si vous ne sauvegardez pas , vos modifications seront perdues.</small></p>
                <button type='button' class='btn btn-default' data-dismiss='modal' onclick='fermer()'>Fermer</button>
                <button type='button' class='btn btn-primary' onclick=CreatCritére() >Enregistrer</button>
            </div>
            </form>
        </div>
    </div>
</div>";
    
}
?>

 
     





