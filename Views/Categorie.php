<script type="text/javascript">
    $(document).ready(function () {
       
      
        
       
        // We use the checkboxes multiple times on a page, save the reference
        // This will save DOM lookups, thus smoother performance (though very little in this case)
        var $allCheckBoxes = $('input[type="checkbox"]').not('#checkall'); // prefix with $ to indicate jQuery object (this is a preference, not a must)

        // We use it multiple times, save the reference
        var $checkAllTrigger = $('#checkall');

        // We only need to calc this once, not needed every click, so save it in a var
        var allCheckBoxesLength = $allCheckBoxes; // this gets set once, and that's exactly enough

        $checkAllTrigger.on('click', function () {
            // Use this.checked, "this"  is the clicked element, ".checked" is true/false if it's checked or not
            $allCheckBoxes.prop('checked', this.checked);
        })
                // as per Paul's comment, blur the element to remove.
                // We chain the blur() to the on(), on() returns the object, you can think $(this) 
                // gets returned, which you then blur. 
                .blur();

        // Uncheck "Checkall" if any other checkbox is unchecked
        // We do this by comparing the total amount of checkboxes vs the checked ones.
        // If e.g. 10 out of 10 are checked, they're all checked, check this on
        $allCheckBoxes.on('change', function () {
            $checkAllTrigger.prop('checked', allCheckBoxesLength == $allCheckBoxes.filter(":checked").length);
        });

        
        
//       $("#form-edit-cat").submit(function (e) {
//        
//          var url = "SousCategorieModifierController.php"; // the script where you handle the form input.
//
//                        $.ajax({
//                            type: "POST",
//                            url: url,
//                            data: $("#form-edit-cat").serialize(), // serializes the form's elements.
//                            success: function (data)
//                            {
//                               // console.log(data);
//                                //$("#espace").load("Views/monprofile.php"); 
//                              //  document.getElementById('themeConfig').style.visibility = 'hidden';
//                                // show response from the php script.
//                            }
//                        });
//
//                         e.preventDefault();
//         
//            
//        });

    
    
    
    
    
    
});

      function modifierCritére(){
          
           var url = "../Controller/SousCategorieModifierController.php"; // the script where you handle the form input.

                        $.ajax({
                            type: "POST",
                            url: url,
                            data: $("#form-edit-cat").serialize(), // serializes the form's elements.
                            success: function (data)
                            {
                              console.log(data);
                              document.getElementById('success').style.display='block';
                              document.getElementById("success").innerHTML = "<strong>Success!</strong>  Votre modification a été effectuée avec success";
                              
                            }
                        });

          
          
      }
      function CreatCritére(){
      
      var url = "../Controller/SousCategorieModifierController.php"; // the script where you handle the form input.

                        $.ajax({
                            type: "POST",
                            url: url,
                            data: $("#form-add-souscat").serialize(), // serializes the form's elements.
                            success: function (data)
                            {
                              console.log(data);
                              document.getElementById('success').style.display='block';
                              document.getElementById("success").innerHTML = "<strong>Success!</strong>  Votre modification a été effectuée avec success";
                              
                            }
                        });
      
      
      }


  
    
      
     function fermer(){
         document.getElementById('success').style.display='none';
         document.getElementById("modifier").style.display = 'none';
         document.getElementById('ajouter').style.display='none';
         getPage('Categorie.php');
     }
     function enregistrer(){
           getPage('Categorie.php');
          var titre = $('#titreCategorie').val();
          var id=$('#idCategorie').val();
          if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.open("POST", "../Controller/CategorieController.php?id="+ id+"&titre="+titre+"&action=save", true);
        xmlhttp.send();
        document.getElementById("modifier").style.display = 'none';
          getPage('Categorie.php');
        
    
        }
    
    function AjoutCategorie(){
      
         if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
         xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("ajouter").style.display = 'block';
                document.getElementById("ajouter").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("POST", "../Controller/CategorieController.php?action=addCategorie", true);
        xmlhttp.send();
        
        
        
    }
    function Add(){
        getPage('Categorie.php');
         var url = "../Controller/CategorieController.php"; // the script where you handle the form input.

                        $.ajax({
                            type: "POST",
                            url: url,
                            data: $("#form-add-cat").serialize(), // serializes the form's elements.
                            success: function (data)
                            {
                              console.log(data);
//                                document.getElementById("success").style.display = 'block';
//                              document.getElementById("success").innerHTML = xmlhttp.responseText;
                              
                            }
                        });
        getPage('Categorie.php');
        
        
    }
    
    function supprimerCategorie(id) {
        getPage('Categorie.php');
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
       
        xmlhttp.open("POST", "../Controller/CategorieController.php?id=" + id + "&action=deleteCategorie", true);
        xmlhttp.send();
        getPage('Categorie.php');


    }
   
    function modifierCategorie(id) {
        
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("modifier").style.display = 'block';
                document.getElementById("modifier").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("POST", "../Controller/CategorieController.php?id=" + id + "&action=editCategorie", true);
        xmlhttp.send();

        

    }
    
    function modifierSousCategorie(id) {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("modifier").style.display = 'block';
                document.getElementById("modifier").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("POST", "../Controller/SousCategorieController.php?id=" + id + "&action=editCategorie", true);
        xmlhttp.send();



    }
    
     function supprimerSousCategorie(id) {
       
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.open("POST", "../Controller/SousCategorieModifierController.php?id=" + id + "&action=deleteSousCategorie", true);
        xmlhttp.send();
        getPage('Categorie.php');


    }
    function AjoutSousCategorie(id){
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("modifier").style.display = 'block';
                document.getElementById("modifier").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("POST", "../Controller/SousCategorieController.php?id="+id+"&action=AddSousCategorie", true);
        xmlhttp.send();
        
    }
    function AjoutInputCriétre(i){
       
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                 var node = document.createElement("div");
                 var id='appendInput'+i;
                 node.setAttribute("id", id);
                document.getElementById("appendInput").appendChild(node);
                //document.getElementById(appendInput).style.display = 'block';
                document.getElementById(id).innerHTML=xmlhttp.responseText ; 
            }
        };
        document.getElementById('ajoutinput'+i).style.display='none';
        xmlhttp.open("POST", "../Controller/CritereController.php?i="+i, true);
        xmlhttp.send();
        
        
        
        
        
        
    } 
    
   
</script>
<?php

include '../Modeles/autoloader.php';
include '../Modeles/lib.php';
error_reporting(-1);
ini_set('error_reporting', E_ALL);
$filtre = " 1 ";
$page_number = 1;
if (isset($_POST["page"])) {
    $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if (!is_numeric($page_number)) {
        die('Invalid page number!');
    } //incase of invalid page number
} else {
    $page_number = 1; //if there's no page number, set it to 1
}
$Categorie = new Categorie("categorie_annonce");
$Display_Categorie_count = $Categorie->getDataBYcond($filtre);
$get_total_rows = count($Display_Categorie_count);

$item_per_page = 3;

$total_pages = ceil($get_total_rows / $item_per_page);

$page_position = (($page_number - 1) * $item_per_page);

$Display_Categorie = $Categorie->getDataBYcond($filtre . "ORDER BY id_categorie DESC LIMIT " . $page_position . "," . $item_per_page);
//var_dump($Display_Categorie);
$onclick = 'onclick="CocheTout(this, "Autre[]")';


if ($Display_Categorie != "") {
    $SousCategorie = new SousCategorie("souscategorie");
    echo"  <div id='modifier'>
                </div> 
            <div id='ajouter'>
            </div>
        <div class='md-card' >
                <div class='md-card-content'>
                   
                    <div class='uk-grid' data-uk-grid-margin>
                        <div class='uk-width-1-1'>
                            <div class='uk-overflow-container'>
                            

                                    <div class='uk-width-1-10 uk-text-center ajout-button ' >
                                        <div class='uk-vertical-align uk-height-1-1'>
                                            <div class='uk-vertical-align-middle'>
                                                <a onclick='AjoutCategorie()' class='btnSectionClone' ><i class='material-icons md-36'></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    


                                <table class='uk-table uk-table-align-vertical table_check' >
                                    <thead>
                                        <tr>
                                           <th class='uk-width-1-10 uk-text-center small_col'><input type='checkbox' data-md-icheck class='check_all'  id='checkall'></th>
                                            
                                            <th>Categorie Name</th>
                                            <th >Sous Categorie</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
    //var_dump($Display_Categorie);
    for ($i = 0; $i < count($Display_Categorie); $i++) {
        $filtreSousCategorie = "    id_Categorie=" . $Display_Categorie[$i]['id_categorie'];
        //echo $filtreSousCategorie;
        $Display_SousCategorie = $SousCategorie->getDataBYcond($filtreSousCategorie . "   ORDER BY id_souscategorie ASC");


        echo" <tr>
                   <td class='uk-text-center uk-table-middle small_col'><input type='checkbox' data-md-icheck class='check_row' name='case'></td>
                   <td class='uk-text-large uk-text-nowrap'><a >{$Display_Categorie[$i]['titre']}</a></td>";


        if ($Display_SousCategorie != "") {
            echo "<td class='uk-text-large uk-text-nowrap'>";
            for ($j = 0; $j < count($Display_SousCategorie); $j++) {
                echo "<a href='ecommerce_product_details.html'>{$Display_SousCategorie[$j]['titre']}</a> 
                              <div > 
                              <a onclick='modifierSousCategorie({$Display_SousCategorie[$j]['id_souscategorie']})'><i class='material-icons md-24'>&#xE8F4;</i></a>
                              <a onclick='supprimerSousCategorie({$Display_SousCategorie[$j]['id_souscategorie']})' class='uk-margin-left'><i class='material-icons md-24'>&#xE872;</i>
                       </div>
                       </br>";
            }
            echo "</td>";
        }





        echo "<td class='uk-text-nowrap'>
           
                <div class='uk-width-1-10 uk-text-center  ' >
                                        <div class='uk-vertical-align uk-height-1-1'>
                                            <div class='uk-vertical-align-middle'>
                                             <a onclick='modifierCategorie({$Display_Categorie[$i]['id_categorie']})'><i class='material-icons md-24'>&#xE8F4;</i></a>
                                             <a onclick='AjoutSousCategorie({$Display_Categorie[$i]['id_categorie']})' class='btnSectionClone' ><i class='material-icons md-36'></i></a>
                                             <a onclick='supprimerCategorie({$Display_Categorie[$i]['id_categorie']})' class='uk-margin-left'><i class='material-icons md-24'>&#xE872;</i></a>

                                            
                                        </div>
                                        </div>
                                    </div>
                   </td>
               </tr>
";
    }


    echo" </tbody>
                                </table>
                            </div>";
    echo paginate_function($item_per_page, $page_number, $get_total_rows, $total_pages);
    echo "
                           
                        </div>
                    </div>
                </div>
            </div>   ";
}

function paginate_function($item_per_page, $current_page, $total_records, $total_pages) {
    $pagination = '';
    if ($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages) { //verify total pages and current page number
        $pagination .= '<ul class="categorie uk-pagination uk-margin-medium-top uk-margin-medium-bottom">';

        $right_links = $current_page + 3;
        $previous = $current_page - 2; //previous link 
        $next = $current_page + 1; //next link
        $first_link = true; //boolean var to decide our first link

        if ($current_page > 1) {
            $previous_link = ($previous == 0) ? 1 : $previous;
            $pagination .= '<li class="uk-active"><a href="#" data-page="1" title="First">&laquo;</a></li>'; //first link
            $pagination .= '<li><a href="#" data-page="' . $previous_link . '" title="Previous">&lt;</a></li>'; //previous link
            for ($i = ($current_page - 2); $i < $current_page; $i++) { //Create left-hand side links
                if ($i > 0) {
                    $pagination .= '<li><a href="#" data-page="' . $i . '" title="Page' . $i . '">' . $i . '</a></li>';
                }
            }
            $first_link = false; //set first link to false
        }

        if ($first_link) { //if current active page is first link
            $pagination .= '<li class="uk-active">' . $current_page . '</li>';
        } elseif ($current_page == $total_pages) { //if it's the last active link
            $pagination .= '<li class="uk-active"><span>' . $current_page . '</span></li>';
        } else { //regular current link
            $pagination .= '<li class="uk-active"><span>' . $current_page . '</span></li>';
        }

        for ($i = $current_page + 1; $i < $right_links - 1; $i++) { //create right-hand side links
            if ($i <= $total_pages) {
                $pagination .= '<li><a href="#" data-page="' . $i . '" title="Page ' . $i . '">' . $i . '</a></li>';
            }
        }
        if ($current_page < $total_pages) {
            $next_link = ($i > $total_pages) ? $total_pages : $i;
            $pagination .= '<li><a href="#" data-page="' . $next_link . '" title="Next">&gt;</a></li>'; //next link
            $pagination .= '<li class="uk-active"><a href="#" data-page="' . $total_pages . '" title="Last">&raquo;</a></li>'; //last link
        }

        $pagination .= '</ul>';
    }
    // echo "pagination return".$pagination;
    return $pagination; //return pagination links
}
