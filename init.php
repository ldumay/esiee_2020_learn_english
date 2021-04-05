<?php
    // Version and Mode :
    include('config/config_bdd.php'); // A MODIFIER EN .config
    include('config/config_project.php'); // A MODIFIER EN .config

    // Others includes
	include('include/ldumay_package_functions.php');
	include('include/bdd.php');
	
    session_start();

    // Prepare var necessary
    $project_title = "LearnEnglish";
    //-
    $project_start_date = "30/03/2021";
    $project_start_version = "v0.1.0";
    //-
    $project_currently_date = ToDay("d/m/Y");
    $project_currently_version = "v0.2.6";
    //-
    $responsive = true;
    //-
    $project_metadatas_description ="Bonjour et Bienvenue à vous ! Je suis heureux de vous voir sur mon site Web personnel. 
    Celui-ci regroupe tout ce dont vous avez besoin de savoir sur moi-même. Bonne visite.
    <br/>Pour plus de description, n'héistez pas à consulter directement mon site web https://ldumay.fr/. A bientôt !";
    $project_metadatas_subject ="Site Vitrine Personnel";
    $project_metadatas_copyright ="Loïc Dumay (alias LDumay)";
    $project_metadatas_author ="Loïc Dumay (alias LDumay)";
    $project_metadatas_publisher ="Loïc Dumay (alias LDumay)";
    $project_metadatas_identifier_url ="https://ldumay.fr";
    $project_metadatas_replyto ="hello@ldumay.fr";
    $project_metadatas_revisit_after ="10 days";
    $project_metadatas_index ="index";
    $project_metadatas_rating ="general";
    $project_metadatas_distribution ="global";
    $project_metadatas_geography ="Ile-De-France, France";
    $project_metadatas_category ="internet";
    if($responsive==true){ $responsive_icon = "✔️"; } else { $responsive_icon = '✖️'; }
    $project_dev_version = $project_currently_version." - ".$project_currently_date." | Full responsive : ".$responsive_icon;

    // Create necessary session
    function create_Sessions_Alert(){
        if( empty($_SESSION['alert_typecolor']) )
            $_SESSION['alert_typecolor'] = '';
        if( empty($_SESSION['alert_message']) )
            $_SESSION['alert_message'] = '';
        if( empty($_SESSION['alert_message_old']))
            $_SESSION['alert_message_old'] = '';
    }
    
    // Clean necessary session
    function clean_Sessions(){
        if( isset($_SESSION['alert_typecolor']) )
            $_SESSION['alert_typecolor'] = '';
        if( isset($_SESSION['alert_message']) )
            $_SESSION['alert_message'] = '';
        if( isset($_SESSION['alert_message_old']))
            $_SESSION['alert_message_old'] = '';
    }
    
    // Execute function necessary
    create_Sessions_Alert();

    //Check 
    $url = $_SERVER['REQUEST_URI'];
    $url = str_replace('/','',$url);
    if($url=='auth.php?type=register' && $user_register==false){
        header('location:login.php?type=login');
    }
    if( isset($_COOKIES['user_id']) && $_COOKIES['user_id']>0 ){ $_SESSION['user_token']=$_COOKIES['user_token']; }
    if( ( isset($_COOKIES['user_id']) && $_COOKIES['user_id']>0 ) && ( $url!='auth.php' || $url!='auth.php?type=login' || $url!='auth.php?type=register' ) ){
        $_SESSION['User_id']=$_COOKIES['user_id'];
    }
?>