<?php
    include('init.php');

    if( (empty($_COOKIE['user_id'])) || ($_COOKIE['user_id']=='') )
        header('location:auth.php?type=login');
    else if( isset($_COOKIE['user_id']) && ($_COOKIE['user_id']!='') )
        $user_id = $_COOKIE["user_id"];

    // Create Nessecary var
    $icon_linkedin = 'img/icon/linkedin.png';
    $icon_jobteaser = 'img/icon/jobteaser.png';
    $icon_facebook = 'img/icon/facebook.png';
    $icon_indeed = 'img/icon/indeed.png';
    $icon_welcometothejungle = 'img/icon/welcometothejungle.jpg';

    if( empty($_GET['type']) ){
        // SQL
        $sql_all_table_companies = 'SELECT * FROM companies';
        $sql_table_companies = 'SELECT * FROM companies WHERE `user_id`="'.$user_id.'"';
    }
?>