<?php
    //Source tuto => https://www.digitalocean.com/community/tutorials/js-drag-and-drop-vanilla-js-fr

    if( isset($_GET['id']) && ( $_GET['id']==null || $_GET['id']<=0 ) ){
        $leconId = 0;
        $statut = false;
    }else{
        $leconId = $_GET['id'];
    }
    //-
    include('init.php');
    include('include/head.php');

    $leconTitle = null;
    
    if( isset($_GET['id']) && $leconId>0 ){
        $sql = 'SELECT * FROM lecons WHERE id='.$leconId.'';
        $result_sql = $host->query($sql);
        while ( $row = $result_sql->fetch() ){
            $leconId = $row['id'];
            $leconTitle = $row['title'];
            $leconsCollections = $row['motsCollection'];
            if(!empty($leconsCollections) && $leconsCollections!=""){
                $leconsCollectionsReady = true;
                $wordId = explode(",", $leconsCollections);
            }
            if($row['statut']==1){ $statut = true; }else{ $statut = false; }
        }
    }
    ?>
	<body>
        <!-- Container -->
		<div class="container container-client" style="padding-top:8%;">
            <!-- Header -->
            <div id="header" class="col-12">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <h1 class="title text-center"><?php echo $project_title; ?></h1>
                    </div>
                </div>
            </div>
            <!-- ./Header -->

            <!-- Lecon -->
            <div class="row">
                <?php
                    if($statut==true && ( isset($_GET['id']) && $leconId>0 ) ){
                        ?>
                        <div class="col-md-12 content-table text-center">
                            <h2><?php echo $leconTitle; ?></h2>
                                <p>Cours ouvert.</p>
                                <br>
                                <?php
                                    foreach($wordId as $word){
                                        echo '
                                        <div class="row draggable_and_dropzone">
                                            <div id="draggable" class="col-md-4">draggable</div>
                                            <div id="dropzone" class="col-md-4">dropzone</div>
                                            <div id="words" class="col-md-4">words</div>
                                        </div>
                                        ';
                                    }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    //--
                    elseif($statut==false && ( isset($_GET['id']) && $leconId>0 )){
                        ?>
                        <div class="col-md-12 content-table text-center">
                            <h2><?php echo $leconTitle; ?></h2>
                            <div class="alert alert-warning" role="alert" style="display:inline-block;width:30%;">
                                <p>Ce cours est fermé.<br>Merci de contacté le support.</p>
                            </div>
                        </div>
                        <?php
                    }
                    //--
                    else{
                        ?>
                        <div class="col-md-12 content-table text-center">
                            <div class="alert alert-danger" role="alert" style="display:inline-block;width:30%;">
                                <p>Oups !<br>Votre lien n'est pas exacte.<br>Merci de contacté le support.</p>
                            </div>
                        </div>
                        <?php
                    }
                ?>
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
?>