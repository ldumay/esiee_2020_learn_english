<?php 
	include('include/php_start.php');
    include('include/head.php');

    $page = "list_companies.php";
    ?>
	<body>
        <!-- Container -->
		<div class="container container-client">
            <?php
            	include('include/header.php');
            	include('include/account_update.php');
            	include('include/alertes.php');
            ?>

            <!-- Companies -->
            <div class="row">
                <div id="companies" class="col-md-12">
                    <p>Hello World !</p>
                </div>
            </div>
            <hr>
            <!-- ./Companies -->

            <!-- Basdepage -->
            <div class="row">
                <div class="col-12 btn_haut_de_page">
                    <a href="#title">Haut de Page</a>
                </div>
            </div>
            <!-- ./Basdepage -->

            <?php include('include/footer.php'); ?>

        </div>
        <!-- ./Container -->
        
	<body>
    <?php
    include('include/javascript.php');
    include('include/php_end.php');
?>