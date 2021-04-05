<?php
    if( !isset($_COOKIE['user_id']) && isset($_GET['lecon_id'])
    	header('location:lecon.php?lecon_id='.$_GET['lecon_id'].'');
    else if( isset($_COOKIE['user_id']) )
        header('location:home.php');
    else
        header('location:auth.php?type=login');
?>