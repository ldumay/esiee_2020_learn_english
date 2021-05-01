<?php 
	include('include/php_start.php');
    include('include/head.php');
    ?>
	<body>
        <!-- Container -->
		<div class="container container-client">
        <?php
            	include('include/modules.php');
            ?>

            <!-- LeconsListes -->
            <div class="row">
                <div id="list_company" class="col-md-12 content-table">
                    <h2>Home</h2>
                    <p>Hello World !</p>
                </div>
            </div>
            <!-- ./LeconsListes -->

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