<?php
    if( isset($_GET['id']) && ( $_GET['id']==null || $_GET['id']<=0 ) ){
        echo "Aucun cours a été sélectionné.";
    }else{
        $leconId = $_GET['id'];
        //-
        include('init.php');
        include('include/head.php');

        $leconTitle = null;
        //-
        $sql = 'SELECT * FROM lecons WHERE id='.$leconId.'';
        $result_sql = $host->query($sql);
        while ( $row = $result_sql->fetch() ){
            $leconId = $row['id'];
            $leconTitle = $row['title'];
            if($row['statut']==1){ $statut = true; }else{ $statut = false; }
        }
        ?>
    	<body>
            <!-- Container -->
    		<div class="container container-client" style="padding-top:6%;">
                <?php
                	include('include/header.php');
                    include('include/alertes.php');
                	include('include/account_update.php');
                    include('include/add_lecon.php');
                    include('include/update_lecon.php');
                ?>

                <!-- Lecon -->
                <div class="row">
                    <div id="list_company" class="col-md-12 content-table text-center">
                        <h2><?php echo $leconTitle; ?></h2>
                        <?php
                            if($statut==1){
                                ?>
                                <p>Cours ouvert.</p>
                                <?php
                            }else{
                                ?>
                                <p>Ce cours est fermé.<br>Merci de contacté le support.</p>
                                <?php
                            }
                        ?>
                    </div>
                </div>
                <!-- ./Lecon -->

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
    }
?>