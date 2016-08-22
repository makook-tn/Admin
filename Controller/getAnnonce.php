<script type="text/javascript">
    $(document).ready(function() {
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
    $allCheckBoxes.on('change', function(){
        $checkAllTrigger.prop('checked', allCheckBoxesLength == $allCheckBoxes.filter(":checked").length);
    });


         
	
});
</script>
<?php

include '../Modeles/autoloader.php';
include '../Modeles/lib.php';
error_reporting(-1);
ini_set('error_reporting', E_ALL);
$filtre="";
 if(!empty($_GET)){
     echo "get";
   $titre=@$_GET['titre'];
 
 $prix=$_GET['prix'];
 $valid=$_GET['active'];

if($_GET['active']){
if($valid== "on")
    $filtre="`valide`=1 ";
else {
    $filtre="`valide`=0 ";
}


 }else {
     $filtre=" 1 ";
 }
if ($titre!=""){
$filtre.=" AND `titre` like '%".$titre."%' ";}
if($prix!=""){
    $filtre.=" AND `prix`='".$prix."'";
}

echo "filtre  =".$filtre;
}
else {
    $filtre=" 1 ";
    
}
$page_number=1;
if(isset($_POST["page"])){
		$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
		if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
	}else{
		$page_number = 1; //if there's no page number, set it to 1
	}
$Annonce=new Annonce("annonce");
$Display_Annonce_count=$Annonce->getDataBYcond($filtre);
$get_total_rows = count($Display_Annonce_count); 

$item_per_page=5;

$total_pages = ceil($get_total_rows/$item_per_page);

$page_position = (($page_number-1) * $item_per_page);

$Display_Annonce=$Annonce->getDataBYcond($filtre."ORDER BY id_annonce ASC LIMIT ". $page_position.",". $item_per_page);
//var_dump($Display_Annonce);
$onclick='onclick="CocheTout(this, "Autre[]")';


if($Display_Annonce!=""){
    echo" 
        <div class='md-card' >
                <div class='md-card-content'>
                    <div class='uk-grid' data-uk-grid-margin>
                        <div class='uk-width-1-1'>
                            <div class='uk-overflow-container'>
                                <table class='uk-table uk-table-align-vertical table_check' >
                                    <thead>
                                        <tr>
                                           <th class='uk-width-1-10 uk-text-center small_col'><input type='checkbox' data-md-icheck class='check_all'  id='checkall'></th>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
    for ($i = 0; $i < count($Display_Annonce); $i++) {
        
        echo"  
                                        <tr>
                                            <td class='uk-text-center uk-table-middle small_col'><input type='checkbox' data-md-icheck class='check_row' name='case'></td>
                                            <td><img class='img_thumb' src='Ressources/assets/img/ecommerce/s6_edge_1.jpg' alt=''></td>
                                            <td class='uk-text-large uk-text-nowrap'><a href='ecommerce_product_details.html'>{$Display_Annonce[$i]['titre']}</a></td>
                                            
                                            <td class='uk-text-nowrap'>
                                                <a href='ecommerce_product_details.html'><i class='material-icons md-24'>&#xE8F4;</i></a><!--
                                                --><a href='#' class='uk-margin-left'><i class='material-icons md-24'>&#xE872;</i></a>
                                            </td>
                                        </tr>
    ";   }
                                        
    
                            echo" </tbody>
                                </table>
                            </div>";
                           echo  paginate_function($item_per_page, $page_number, $get_total_rows, $total_pages);
	echo "
                           
                        </div>
                    </div>
                </div>
            </div>   ";
        
        
        
}

function paginate_function($item_per_page, $current_page, $total_records, $total_pages)
{
    $pagination = '';
    if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
        $pagination .= '<ul class="annonce uk-pagination uk-margin-medium-top uk-margin-medium-bottom">';
        
        $right_links    = $current_page + 3; 
        $previous       = $current_page - 2; //previous link 
        $next           = $current_page + 1; //next link
        $first_link     = true; //boolean var to decide our first link
        
        if($current_page > 1){
			$previous_link = ($previous==0)? 1: $previous;
            $pagination .= '<li class="uk-active"><a href="#" data-page="1" title="First">&laquo;</a></li>'; //first link
            $pagination .= '<li><a href="#" data-page="'.$previous_link.'" title="Previous">&lt;</a></li>'; //previous link
                for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
                    if($i > 0){
                        $pagination .= '<li><a href="#" data-page="'.$i.'" title="Page'.$i.'">'.$i.'</a></li>';
                    }
                }   
            $first_link = false; //set first link to false
        }
        
        if($first_link){ //if current active page is first link
            $pagination .= '<li class="uk-active">'.$current_page.'</li>';
        }elseif($current_page == $total_pages){ //if it's the last active link
            $pagination .= '<li class="uk-active"><span>'.$current_page.'</span></li>';
        }else{ //regular current link
            $pagination .= '<li class="uk-active"><span>'.$current_page.'</span></li>';
        }
                
        for($i = $current_page+1; $i < $right_links-1 ; $i++){ //create right-hand side links
            if($i<=$total_pages){
                $pagination .= '<li><a href="#" data-page="'.$i.'" title="Page '.$i.'">'.$i.'</a></li>';
            }
        }
        if($current_page < $total_pages){ 
				$next_link = ($i > $total_pages) ? $total_pages : $i;
                $pagination .= '<li><a href="#" data-page="'.$next_link.'" title="Next">&gt;</a></li>'; //next link
                $pagination .= '<li class="uk-active"><a href="#" data-page="'.$total_pages.'" title="Last">&raquo;</a></li>'; //last link
        }
        
        $pagination .= '</ul>'; 
    }
   // echo "pagination return".$pagination;
    return $pagination; //return pagination links
}
    

 


