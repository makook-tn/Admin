<?php
        include '../Modeles/autoloader.php';
	require_once("../Modeles/session.php");
	require_once("../Modeles/class.user.php");
        $auth_user = new USER();
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
	

?>
<!DOCTYPE html >
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="icon" type="image/png" href="Ressources/assets/img/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="Ressources/assets/img/favicon-32x32.png" sizes="32x32">

   <title>welcome - <?php print($userRow['user_email']); ?></title>


    <!-- uikit -->
    <link rel="stylesheet" href="Ressources/bower_components/uikit/css/uikit.almost-flat.min.css" media="all">

    <!-- flag icons -->
    <link rel="stylesheet" href="Ressources/assets/icons/flags/flags.min.css" media="all">

    <!-- style switcher -->
    <link rel="stylesheet" href="Ressources/assets/css/style_switcher.min.css" media="all">
    
    <!-- altair admin -->
    <link rel="stylesheet" href="Ressources/assets/css/main.min.css" media="all">

    <!-- themes -->
    <link rel="stylesheet" href="Ressources/assets/css/themes/themes_combined.min.css" media="all">
    <link rel="stylesheet" href="Ressources/assets/css/login_page.min.css" />
     <link rel="stylesheet" href="Ressources/style.css" />
    
    <!-- matchMedia polyfill for testing media queries in JS -->
    <!--[if lte IE 9]>
        <script type="text/javascript" src="Ressources/bower_components/matchMedia/matchMedia.js"></script>
        <script type="text/javascript" src="Ressources/bower_components/matchMedia/matchMedia.addListener.js"></script>
        <link rel="stylesheet" href="Ressources/assets/css/ie.css" media="all">
    <![endif]-->
    <script type="text/javascript" src="Ressources/jquery-1.11.3-jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
        
        
        
        
        
        
        $("#txtHint" ).load( "../Controller/getAnnonce.php"); 
	$("#txtHint").on( "click", ".annonce a", function (e){
         
               
            
        var $this = $(this); // L'objet jQuery du formulaire
        var titre = $('#product_search_name').val();
        var prix = $('#product_search_price').val();
        var statut=$('#product_search_status').val();
        var active=$('#product_search_active').val();
        if(document.getElementById("product_search_active").checked == true){
             active='on';
         }
         else 
             active='off';
		e.preventDefault();
		var page = $(this).attr("data-page"); //get page number from link
		$("#txtHint").load("../Controller/getAnnonce.php?titre="+titre+"&prix="+prix+"&statut="+statut+"&active="+active,{"page":page}, function(){ //get content from PHP page
		
		});
		
	});
        $("#page_content_inner").on( "click", ".categorie a", function (e){
       
               
            
        var $this = $(this); // L'objet jQuery du formulaire
        var titre = $('#product_search_name').val();
        var prix = $('#product_search_price').val();
        var statut=$('#product_search_status').val();
        var active=$('#product_search_active').val();
       
		e.preventDefault();
		var page = $(this).attr("data-page");
               
		$("#page_content_inner").load("Categorie.php",{"page":page}, function(){ //get content from PHP page
		
		});
		
	});
        
         
        
       
});
</script>

</head>
<body class=" sidebar_main_open sidebar_main_swipe">
    <!-- main header -->
    <header id="header_main">
        <div class="header_main_content">
            <nav class="uk-navbar">
                                
                <!-- main sidebar switch -->
                <a href="#" id="sidebar_main_toggle" class="sSwitch sSwitch_left">
                    <span class="sSwitchIcon"></span>
                </a>
                
                <!-- secondary sidebar switch -->
                <a href="#" id="sidebar_secondary_toggle" class="sSwitch sSwitch_right sidebar_secondary_check">
                    <span class="sSwitchIcon"></span>
                </a>
                
                    <div id="menu_top_dropdown" class="uk-float-left uk-hidden-small">
                        <div class="uk-button-dropdown" data-uk-dropdown="{mode:'click'}">
                            <a href="#" class="top_menu_toggle"><i class="material-icons md-24">&#xE8F0;</i></a>
                            <div class="uk-dropdown uk-dropdown-width-3">
                                <div class="uk-grid uk-dropdown-grid">
                                    <div class="uk-width-2-3">
                                        <div class="uk-grid uk-grid-width-medium-1-3 uk-margin-bottom uk-text-center">
                                            <a href="page_mailbox.html" class="uk-margin-top">
                                                <i class="material-icons md-36 md-color-light-green-600">&#xE158;</i>
                                                <span class="uk-text-muted uk-display-block">Mailbox</span>
                                            </a>
                                            <a href="page_invoices.html" class="uk-margin-top">
                                                <i class="material-icons md-36 md-color-purple-600">&#xE53E;</i>
                                                <span class="uk-text-muted uk-display-block">Invoices</span>
                                            </a>
                                            <a href="page_chat.html" class="uk-margin-top">
                                                <i class="material-icons md-36 md-color-cyan-600">&#xE0B9;</i>
                                                <span class="uk-text-muted uk-display-block">Chat</span>
                                            </a>
                                            <a href="page_scrum_board.html" class="uk-margin-top">
                                                <i class="material-icons md-36 md-color-red-600">&#xE85C;</i>
                                                <span class="uk-text-muted uk-display-block">Scrum Board</span>
                                            </a>
                                            <a href="page_snippets.html" class="uk-margin-top">
                                                <i class="material-icons md-36 md-color-blue-600">&#xE86F;</i>
                                                <span class="uk-text-muted uk-display-block">Snippets</span>
                                            </a>
                                            <a href="page_user_profile.html" class="uk-margin-top">
                                                <i class="material-icons md-36 md-color-orange-600">&#xE87C;</i>
                                                <span class="uk-text-muted uk-display-block">User profile</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="uk-width-1-3">
                                        <ul class="uk-nav uk-nav-dropdown uk-panel">
                                            <li class="uk-nav-header">Components</li>
                                            <li><a href="components_accordion.html">Accordions</a></li>
                                            <li><a href="components_buttons.html">Buttons</a></li>
                                            <li><a href="components_notifications.html">Notifications</a></li>
                                            <li><a href="components_sortable.html">Sortable</a></li>
                                            <li><a href="components_tabs.html">Tabs</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                <div class="uk-navbar-flip">
                    <ul class="uk-navbar-nav user_actions">
                        <li><a href="#" id="full_screen_toggle" class="user_action_icon uk-visible-large"><i class="material-icons md-24 md-light">&#xE5D0;</i></a></li>
                        <li><a href="#" id="main_search_btn" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE8B6;</i></a></li>
                        <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                            <a href="#" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE7F4;</i><span class="uk-badge">16</span></a>
                            <div class="uk-dropdown uk-dropdown-xlarge">
                                <div class="md-card-content">
                                    <ul class="uk-tab uk-tab-grid" data-uk-tab="{connect:'#header_alerts',animation:'slide-horizontal'}">
                                        <li class="uk-width-1-2 uk-active"><a href="#" class="js-uk-prevent uk-text-small">Messages (12)</a></li>
                                        <li class="uk-width-1-2"><a href="#" class="js-uk-prevent uk-text-small">Alerts (4)</a></li>
                                    </ul>
                                    <ul id="header_alerts" class="uk-switcher uk-margin">
                                        <li>
                                            <ul class="md-list md-list-addon">
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <span class="md-user-letters md-bg-cyan">wa</span>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="pages_mailbox.html">Sapiente dicta ea.</a></span>
                                                        <span class="uk-text-small uk-text-muted">Molestiae aut error eaque minima possimus expedita quaerat eum consequatur sed.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <img class="md-user-image md-list-addon-avatar" src="Ressources/assets/img/avatars/avatar_07_tn.png" alt=""/>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="pages_mailbox.html">Possimus sed.</a></span>
                                                        <span class="uk-text-small uk-text-muted">Vel et rerum maiores laboriosam autem quidem adipisci est ipsum minima.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <span class="md-user-letters md-bg-light-green">sx</span>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="pages_mailbox.html">Tempore quidem.</a></span>
                                                        <span class="uk-text-small uk-text-muted">Amet qui harum quia culpa ipsum.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <img class="md-user-image md-list-addon-avatar" src="Ressources/assets/img/avatars/avatar_02_tn.png" alt=""/>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="pages_mailbox.html">Nesciunt unde fugiat.</a></span>
                                                        <span class="uk-text-small uk-text-muted">Dignissimos cupiditate delectus velit quisquam quibusdam fuga autem dolor.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <img class="md-user-image md-list-addon-avatar" src="Ressources/assets/img/avatars/avatar_09_tn.png" alt=""/>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="pages_mailbox.html">Minus aspernatur ducimus.</a></span>
                                                        <span class="uk-text-small uk-text-muted">Recusandae et non eveniet omnis id eum excepturi deleniti.</span>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="uk-text-center uk-margin-top uk-margin-small-bottom">
                                                <a href="page_mailbox.html" class="md-btn md-btn-flat md-btn-flat-primary js-uk-prevent">Show All</a>
                                            </div>
                                        </li>
                                        <li>
                                            <ul class="md-list md-list-addon">
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons uk-text-warning">&#xE8B2;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">Nesciunt molestias.</span>
                                                        <span class="uk-text-small uk-text-muted uk-text-truncate">Iusto recusandae assumenda tempora veniam in corrupti commodi.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons uk-text-success">&#xE88F;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">Nihil vitae.</span>
                                                        <span class="uk-text-small uk-text-muted uk-text-truncate">Perferendis inventore vel et magni consequatur explicabo doloremque.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons uk-text-danger">&#xE001;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">Et vero cupiditate.</span>
                                                        <span class="uk-text-small uk-text-muted uk-text-truncate">Autem et doloribus excepturi voluptatibus atque quaerat velit molestiae.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons uk-text-primary">&#xE8FD;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">Vero iure molestiae.</span>
                                                        <span class="uk-text-small uk-text-muted uk-text-truncate">Perspiciatis cum consequatur velit ut inventore.</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                            <a href="#" class="user_avatar "><img class="md-user-image" src="Ressources/assets/img/avatars/user-alt.png" alt=""/></a>
                            <div class="uk-dropdown uk-dropdown-small">
                                <ul class="uk-nav js-uk-prevent">
                                    <li><a href="page_user_profile.html">My profile</a></li>
                                    <li><a href="page_settings.html">Settings</a></li>
                                    <li><a href="logout.php?logout=true">Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="header_main_search_form">
            <i class="md-icon header_main_search_close material-icons">&#xE5CD;</i>
            <form class="uk-form uk-autocomplete" data-uk-autocomplete="{source:'data/search_data.json'}">
                <input type="text" class="header_main_search_input" />
                <button class="header_main_search_btn uk-button-link"><i class="md-icon material-icons">&#xE8B6;</i></button>
                <script type="text/autocomplete">
                    <ul class="uk-nav uk-nav-autocomplete uk-autocomplete-results">
                        {{~items}}
                        <li data-value="{{ $item.value }}">
                            <a href="{{ $item.url }}">
                                {{ $item.value }}<br>
                                <span class="uk-text-muted uk-text-small">{{{ $item.text }}}</span>
                            </a>
                        </li>
                        {{/items}}
                    </ul>
                </script>
            </form>
        </div>
    </header><!-- main header end -->
    <!-- main sidebar -->
    <aside id="sidebar_main">
        
        <div class="sidebar_main_header">
            <div class="sidebar_logo">
                <a href="index.html" class="sSidebar_hide sidebar_logo_large">
                    <img class="logo_regular" src="Ressources/assets/img/logo_main.png" alt="" height="15" width="71"/>
                    <img class="logo_light" src="Ressources/assets/img/logo_main_white.png" alt="" height="15" width="71"/>
                </a>
                <a href="index.html" class="sSidebar_show sidebar_logo_small">
                    <img class="logo_regular" src="Ressources/assets/img/logo_main_small.png" alt="" height="32" width="32"/>
                    <img class="logo_light" src="Ressources/assets/img/logo_main_small_light.png" alt="" height="32" width="32"/>
                </a>
            </div>
            <div class="sidebar_actions">
                <select id="lang_switcher" name="lang_switcher">
                    <option value="gb" selected>English</option>
                </select>
            </div>
        </div>
        
        <div class="menu_section">
           <ul>
                                    <li title="Dashboard">
                        <a href="index.html">
                            <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                            <span class="menu_title">Dashboard</span>
                        </a>
                                            </li>
                                    <li title="Gestion d'annonces">
                        <a href="javascript:window.location.reload()">
                            <span class="menu_icon"><i class="material-icons">&#xE158;</i></span>
                            <span class="menu_title">Gestion d'annonces </span>
                        </a>
                                            </li>
                                    <li title="Gestion des Clients">
                        <a onclick="getPage('Clients.php')">
                            <span class="menu_icon"><i class="material-icons">&#xE53E;</i></span>
                            <span class="menu_title">Gestion des Clients </span>
                        </a>
                                            </li>
                                             <li title="Gestion des Clients">
                                                 <a  onclick="getPage('Categorie.php')">
                            <span class="menu_icon"><i class="material-icons">&#xE53E;</i></span>
                            <span class="menu_title">Gestion des Catégorie </span>
                        </a>
                                            </li>
                                            <li title="Gestion des Regions">
                                                 <a  onclick="getPage('Region.php')">
                            <span class="menu_icon"><i class="material-icons">&#xE53E;</i></span>
                            <span class="menu_title">Gestion des Regions </span>
                        </a>
                                            </li>
                                            <li title="Gestion des Gouvernorats">
                                                 <a  onclick="getPage('Gvernorat.php')">
                            <span class="menu_icon"><i class="material-icons">&#xE53E;</i></span>
                            <span class="menu_title">Gestion des Catégorie </span>
                        </a>
                                            </li>
                                            <li title="Gestion des Pays">
                                                 <a  onclick="getPage('Pays.php')">
                            <span class="menu_icon"><i class="material-icons">&#xE53E;</i></span>
                            <span class="menu_title">Gestion des Pays </span>
                        </a>
                                            </li>
                                            <li title="Configuration">
                                                 <a  onclick="getPage('setting.php')">
                            <span class="menu_icon"><i class="material-icons">&#xE53E;</i></span>
                            <span class="menu_title">Configuration </span>
                        </a>
                                            </li>
                                            
                                            
                                            
                                            
                                    
            </ul>
        </div>
    </aside><!-- main sidebar end -->

    <div id="page_content">
        <div id="page_content_inner">
     <form>
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-grid" data-uk-grid-margin="">
                   
                        <div class="uk-width-medium-3-10">
                            <label for="product_search_name">Product Name</label>
                            <input type="text" class="md-input" id="product_search_name">
                        </div>
                        <div class="uk-width-medium-1-10">
                            <label for="product_search_price">Price</label>
                            <input type="text" class="md-input" id="product_search_price">
                        </div>
                        
                        <div class="uk-width-medium-1-10">
                            <div class="uk-margin-top uk-text-nowrap">
                                <input type="checkbox" name="product_search_active" id="product_search_active" data-md-icheck/>
                                <label for="product_search_active" class="inline-label">Active</label>
                            </div>
                        </div>
                        <div class="uk-width-medium-2-10 uk-text-center">
                            <a class="md-btn md-btn-primary uk-margin-small-top" onclick="showAnnonce()" >Filter</a>
                        </div>
                        <div class="left"> 
                       <a href='#' class='uk-margin-left'><i class='material-icons md-24'>&#xE872;</i></a>
                        </div>
                    </div>
                </div>
            </div>
          </form>
           <div id="txtHint">
        
            </div>
        </div>
    </div>

    <!-- google web fonts -->
    <script>
    function getPage(page){
       $("#page_content_inner").load(page);
    }
        function showAnnonce() {
  
        var $this = $(this); // L'objet jQuery du formulaire
        var titre = $('#product_search_name').val();
        var prix = $('#product_search_price').val();
        var statut=$('#product_search_status').val();
        var active=$('#product_search_active').val();
         
if(document.getElementById("product_search_active").checked == true){
             active='on';
         }
         else 
             active='off';

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("POST","../Controller/getAnnonce.php?titre="+titre+"&prix="+prix+"&statut="+statut+"&active="+active,true);
        xmlhttp.send();
           
        
        }
        
</script>

    <script>
        WebFontConfig = {
            google: {
                families: [
                    'Source+Code+Pro:400,700:latin',
                    'Roboto:400,300,500,700,400italic:latin'
                ]
            }
        };
        (function() {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>

    <!-- common functions -->
    <script src="Ressources/assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="Ressources/assets/js/uikit_custom.min.js"></script>
    <!-- altair common functions/helpers -->
    <script src="Ressources/assets/js/altair_admin_common.min.js"></script>


    <script>
        $(function() {
            if(isHighDensity) {
                // enable hires images
                altair_helpers.retina_images();
            }
            if(Modernizr.touch) {
                // fastClick (touch devices)
                FastClick.attach(document.body);
            }
        });
        $window.load(function() {
            // ie fixes
            altair_helpers.ie_fix();
        });
    </script>


    

    <script>
        $(function() {
            var $switcher = $('#style_switcher'),
                $switcher_toggle = $('#style_switcher_toggle'),
                $theme_switcher = $('#theme_switcher'),
                $mini_sidebar_toggle = $('#style_sidebar_mini'),
                $slim_sidebar_toggle = $('#style_sidebar_slim'),
                $boxed_layout_toggle = $('#style_layout_boxed'),
                $accordion_mode_toggle = $('#accordion_mode_main_menu'),
                $html = $('html'),
                $body = $('body');


            $switcher_toggle.click(function(e) {
                e.preventDefault();
                $switcher.toggleClass('switcher_active');
            });

            $theme_switcher.children('li').click(function(e) {
                e.preventDefault();
                var $this = $(this),
                    this_theme = $this.attr('data-app-theme');

                $theme_switcher.children('li').removeClass('active_theme');
                $(this).addClass('active_theme');
                $html
                    .removeClass('app_theme_a app_theme_b app_theme_c app_theme_d app_theme_e app_theme_f app_theme_g app_theme_h app_theme_i app_theme_dark')
                    .addClass(this_theme);

                if(this_theme == '') {
                    localStorage.removeItem('altair_theme');
                } else {
                    localStorage.setItem("altair_theme", this_theme);
                    if(this_theme == 'app_theme_dark') {
                        $('#kendoCSS').attr('href','Ressources/bower_components/kendo-ui/styles/kendo.materialblack.min.css')
                    }
                }

            });

            // hide style switcher
            $document.on('click keyup', function(e) {
                if( $switcher.hasClass('switcher_active') ) {
                    if (
                        ( !$(e.target).closest($switcher).length )
                        || ( e.keyCode == 27 )
                    ) {
                        $switcher.removeClass('switcher_active');
                    }
                }
            });

            // get theme from local storage
            if(localStorage.getItem("altair_theme") !== null) {
                $theme_switcher.children('li[data-app-theme='+localStorage.getItem("altair_theme")+']').click();
            }


        // toggle mini sidebar

            // change input's state to checked if mini sidebar is active
            if((localStorage.getItem("altair_sidebar_mini") !== null && localStorage.getItem("altair_sidebar_mini") == '1') || $body.hasClass('sidebar_mini')) {
                $mini_sidebar_toggle.iCheck('check');
            }

            $mini_sidebar_toggle
                .on('ifChecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.setItem("altair_sidebar_mini", '1');
                    localStorage.removeItem('altair_sidebar_slim');
                    location.reload(true);
                })
                .on('ifUnchecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.removeItem('altair_sidebar_mini');
                    location.reload(true);
                });

        // toggle slim sidebar

            // change input's state to checked if mini sidebar is active
            if((localStorage.getItem("altair_sidebar_slim") !== null && localStorage.getItem("altair_sidebar_slim") == '1') || $body.hasClass('sidebar_slim')) {
                $slim_sidebar_toggle.iCheck('check');
            }

            $slim_sidebar_toggle
                .on('ifChecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.setItem("altair_sidebar_slim", '1');
                    localStorage.removeItem('altair_sidebar_mini');
                    location.reload(true);
                })
                .on('ifUnchecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.removeItem('altair_sidebar_slim');
                    location.reload(true);
                });

        // toggle boxed layout

            if((localStorage.getItem("altair_layout") !== null && localStorage.getItem("altair_layout") == 'boxed') || $body.hasClass('boxed_layout')) {
                $boxed_layout_toggle.iCheck('check');
                $body.addClass('boxed_layout');
                $(window).resize();
            }

            $boxed_layout_toggle
                .on('ifChecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.setItem("altair_layout", 'boxed');
                    location.reload(true);
                })
                .on('ifUnchecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.removeItem('altair_layout');
                    location.reload(true);
                });

        // main menu accordion mode
            if($sidebar_main.hasClass('accordion_mode')) {
                $accordion_mode_toggle.iCheck('check');
            }

            $accordion_mode_toggle
                .on('ifChecked', function(){
                    $sidebar_main.addClass('accordion_mode');
                })
                .on('ifUnchecked', function(){
                    $sidebar_main.removeClass('accordion_mode');
                });


        });
    </script>
</body>
</html>