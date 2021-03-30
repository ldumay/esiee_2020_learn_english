<?php
    if( isset($_COOKIE['user_id']) )
        header('location:home.php');
    else
        header('location:auth.php?type=login');
?>