<?php
	if( ($project_mode=='dev') || ($project_mode=='test') ){
		// BDD connect - Offline
		$host_ip = $projectBDD_offline_mode_ip;
		$host_bdd = $projectBDD_offline_mode_bdd;
		$host_login = $projectBDD_offline_mode_login;
		$host_password = $projectBDD_offline_mode_password;
	}else if($project_mode=='prod'){
		// BDD connect - Online
		$host_ip = $projectBDD_online_mode_ip;
		$host_bdd = $projectBDD_online_mode_bdd;
		$host_login = $projectBDD_online_mode_login;
		$host_password = $projectBDD_online_mode_password;
	}else{
		echo '<strong style="color:red;">ERROR - Porject Mode !<br><hr style="border: 1px solid red;">The project mode has not been configured !<br>Please configure the project mode, or contact the webmaster or developer of the project.<br>The project cannot therefore be loaded.</strong>';
	}
	if( ($project_mode=='dev') || ($project_mode=='test') || ($project_mode=='prod')){
		try{
			$host = new PDO('mysql:host='.$host_ip.';dbname='.$host_bdd.';charset=utf8', $host_login, $host_password);
		}
		catch (Exception $e){
			die('Erreur de connexion à la base de donnée : ' . $e->getMessage());
		}
	}
?>