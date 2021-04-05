<?php
	/*
	$server = $_SERVER['HTTP_HOST'];
	echo $server;
	*/
    if( !isset($_COOKIE['user_id']) && isset($_GET['lecon_id']) ){
    	echo "http://learnenglish.test/lecon.php?id=1";
    	//header('location:lecon.php?lecon_id='.$_GET['lecon_id'].'');
    }elseif( isset($_COOKIE['user_id']) ){
        header('location:home.php');
    }else{ header('location:auth.php?type=login'); }
?>