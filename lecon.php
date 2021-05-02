<?php
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
            $leconDescription = $row['description'];
            if($row['statut']==1){ $statut = true; }else{ $statut = false; }
        }
    }
    ?>
	<body>
        <!-- Container -->
		<div class="container container-client" style="padding-top:8%;">
            <?php
            	include('include/header.php');
            ?>

            <!-- Lecon -->
            <div class="row">
                <?php
                    if($statut==true && ( isset($_GET['id']) && $leconId>0 ) ){
                        ?>
                        <div class="col-md-12 content-table text-center">
                        <br>
                            <h2><?php echo $leconTitle; ?></h2>
                                <p>Cours ouvert.</p>
                                <?php echo $leconDescription; ?>
                            </div>
                        </div>
                        
                        <?php
                        if($leconDescription == "son" ){
                            $words_array = array();
                            $sound_array = array();
                            $sql = 'SELECT sound_and_mots.id ,mots, link FROM sound_and_mots,mots,sound
                                    where mots.id= sound_and_mots.id_mots
                                    and sound.id= sound_and_mots.id_sound
                                    
                            ORDER BY RAND ( )
                            LIMIT 4';
                                $result_sql = $host->query($sql);
                                foreach  ($result_sql as $row) {
                                    $words_array[] = $row['mots'];
                                    $sound_array[] = $row['link'];
                                }
                                $words_oreder[] = $row['id'];
                            ?>
                            <div class="row">
                                <div class="col-md-3 content-table text-center">
                                    <h2>Liste des mots</h2>
                                    <div1  class="column column-liste" ondrop="drop(event)" ondragover="allowDrop(event)" id="list">
                                        <div class="visibility" >azertyuiop</div>
                                        <article class="card" id ="0" draggable="true" ondragstart="drag(event)" data-id="<?php echo rand(); ?>">
                                            <h3><?php echo $words_array[0]; ?></h3>
                                        </article>
                                        <article class="card" id ="1" draggable="true" ondragstart="drag(event)" data-id="<?php echo rand(); ?>">
                                            <h3><?php echo $words_array[1]; ?></h3>
                                        </article>
                                        <article class="card" id ="2" draggable="true" ondragstart="drag(event)" data-id="<?php echo rand(); ?>">
                                            <h3><?php echo $words_array[2]; ?></h3>
                                        </article>
                                        <article class="card" id ="3" draggable="true" ondragstart="drag(event)" data-id="<?php echo rand(); ?>">
                                            <h3><?php echo $words_array[3]; ?></h3>
                                        </article>
                                    </div1>
                                </div>
                                <div class="col-md-2 content-table text-center">
                                    <div class="column column-0" ondrop="drop(event)" ondragover="allowDrop1(event)">
                                        <figure id ="0">
                                            <audio controls src="/learnenglish/sons/<?php echo $sound_array[0];?>">
                                                    Your browser does not support the
                                                    <code>audio</code> element.
                                            </audio>
                                        </figure>
                                    </div>
                                </div>
                                <div class="col-md-2 content-table text-center">
                                    <div class="column column-1" ondrop="drop(event)" ondragover="allowDrop2(event)">
                                        <figure id ="1">
                                            <audio controls src="/learnenglish/sons/<?php echo $sound_array[1];?>">
                                                    Your browser does not support the
                                                    <code>audio</code> element.
                                            </audio>
                                        </figure>
                                    </div>
                                </div>
                                <div class="col-md-2 content-table text-center">
                                    <div class="column column-2" ondrop="drop(event)" ondragover="allowDrop3(event)">
                                        <figure id ="2">
                                            <audio controls src="/learnenglish/sons/<?php echo $sound_array[2];?>">
                                                    Your browser does not support the
                                                    <code>audio</code> element.
                                            </audio>
                                        </figure>
                                    </div>
                                </div>
                                <div class="col-md-2 content-table text-center">
                                    <div class="column column-3" ondrop="drop(event)" ondragover="allowDrop4(event)">
                                        <figure id ="3">
                                            <audio controls src="/learnenglish/sons/<?php echo $sound_array[3];?>">
                                                    Your browser does not support the
                                                    <code>audio</code> element.
                                            </audio>
                                        </figure>
                                    </div>                                            
                                </div>                                            
                            </div>
                            <div class="row">
                                <div class="bouton" onclick="console.log(verify())">
                                    Valider
                                </div>
                            </div>
                            <?php
                        }elseif($leconDescription == "images" ){
                            $words_array = array();
                            $pictures_array = array();
                            $sql = 'SELECT images_and_mots.id ,mots, link FROM images_and_mots,mots,images
                            where mots.id= images_and_mots.id_mots
                            and images.id= images_and_mots.id_images
                            
                        ORDER BY RAND ( )
                        LIMIT 4';
                            $result_sql = $host->query($sql);
                            foreach  ($result_sql as $row) {
                                $words_array[] = $row['mots'];
                                $pictures_array[] = $row['link'];
                            }
                            $words_oreder[] = $row['id'];
                            ?>
                            <div class="row">
                                <div class="col-md-3 content-table text-center">
                                <h2>Liste des mots</h2>
                                    <div1  class="column column-liste" ondrop="drop(event)" ondragover="allowDrop(event)" id="list">
                                        <div class="visibility" >azertyuiop</div>
                                        <article class="card" id ="0" draggable="true" ondragstart="drag(event)" data-id="<?php echo rand(); ?>">
                                            <h3><?php echo $words_array[0]; ?></h3>
                                        </article>
                                        <article class="card" id ="1" draggable="true" ondragstart="drag(event)" data-id="<?php echo rand(); ?>">
                                            <h3><?php echo $words_array[1]; ?></h3>
                                        </article>
                                        <article class="card" id ="2" draggable="true" ondragstart="drag(event)" data-id="<?php echo rand(); ?>">
                                            <h3><?php echo $words_array[2]; ?></h3>
                                        </article>
                                        <article class="card" id ="3" draggable="true" ondragstart="drag(event)" data-id="<?php echo rand(); ?>">
                                            <h3><?php echo $words_array[3]; ?></h3>
                                        </article>
                                    </div1>
                                </div>

                                <div class="col-md-2 content-table text-center">
                                    <div class="column column-0" ondrop="drop(event)" ondragover="allowDrop1(event)">
                                        <img class="pictures" id="0" src="/learnenglish/images/<?php echo $pictures_array[0]; ?>">
                                    </div>
                                </div>
                                <div class="col-md-2 content-table text-center">
                                    <div class="column column-1" ondrop="drop(event)" ondragover="allowDrop2(event)">
                                        <img class="pictures" id="1" src="/learnenglish/images/<?php echo $pictures_array[1]; ?>">
                                    </div>
                                </div>
                                <div class="col-md-2 content-table text-center">
                                    <div class="column column-2" ondrop="drop(event)" ondragover="allowDrop3(event)">
                                        <img class="pictures" id="2" src="/learnenglish/images/<?php echo $pictures_array[2]; ?>">
                                    </div>
                                </div>
                                <div class="col-md-2 content-table text-center">
                                    <div class="column column-3" ondrop="drop(event)" ondragover="allowDrop4(event)">
                                        <img class="pictures" id ="3" src="/learnenglish/images/<?php echo $pictures_array[3]; ?>">
                                    </div>                                            
                                </div>                                            
                            </div>
                            <div class="row">

                            <div class="bouton" onclick="console.log(verify())">
                                Valider
                            </div>
                            </div>

                            <?php
                        }elseif($leconDescription == "bonus" ){
                            $words_array = array();
                            $def_array = array();
                            $sql = 'SELECT def_and_mots.id , mots.mots m, def.link dl FROM def_and_mots,mots,def
                            where mots.id= def_and_mots.id_mots
                            and def.id= def_and_mots.id_def
                            
                        ORDER BY RAND ( )
                        LIMIT 4';
                                $result_sql = $host->query($sql);
                                foreach  ($result_sql as $row) {
                                    $words_array[] = $row['m'];
                                    $def_array[] = $row['dl'];
                                }
                                $words_oreder[] = $row['id'];
                            ?>
                            <div class="row">
                                <div class="col-md-3 content-table text-center">
                                <h2>Liste des mots</h2>
                                    <div1  class="column column-liste" ondrop="drop(event)" ondragover="allowDrop(event)" id="list">
                                        <div class="visibility" >azertyuiop</div>
                                        <article class="card" id ="0" draggable="true" ondragstart="drag(event)" data-id="<?php echo rand(); ?>">
                                            <h3><?php echo $words_array[0]; ?></h3>
                                        </article>
                                        <article class="card" id ="1" draggable="true" ondragstart="drag(event)" data-id="<?php echo rand(); ?>">
                                            <h3><?php echo $words_array[1]; ?></h3>
                                        </article>
                                        <article class="card" id ="2" draggable="true" ondragstart="drag(event)" data-id="<?php echo rand(); ?>">
                                            <h3><?php echo $words_array[2]; ?></h3>
                                        </article>
                                        <article class="card" id ="3" draggable="true" ondragstart="drag(event)" data-id="<?php echo rand(); ?>">
                                            <h3><?php echo $words_array[3]; ?></h3>
                                        </article>
                                    </div1>
                                </div>

                                <div class="col-md-2 content-table text-center">
                                    <div class="column column-0" ondrop="drop(event)" ondragover="allowDrop1(event)">
                                        <p class="font-weight-normal" id="0"><?php echo $def_array[0]; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-2 content-table text-center">
                                    <div class="column column-1" ondrop="drop(event)" ondragover="allowDrop2(event)">
                                        <p class="font-weight-normal" id="1"><?php echo $def_array[1]; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-2 content-table text-center">
                                    <div class="column column-2" ondrop="drop(event)" ondragover="allowDrop3(event)">
                                        <p class="font-weight-normal" id="2"><?php echo $def_array[2]; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-2 content-table text-center">
                                    <div class="column column-3" ondrop="drop(event)" ondragover="allowDrop4(event)">
                                        <p class="font-weight-normal" id="3"><?php echo $def_array[3]; ?></p>
                                    </div>                                            
                                </div>                                            
                            </div>
                            <div class="row">
                               <div class="bouton" onclick="console.log(verify())">
                                Valider
                                </div>
                            </div>
                            <?php
                            }elseif($leconDescription == "sonimages" ){
                                $words_array = array();
                                $pictures_array = array();
                                $sql = 'SELECT sound_and_images.id ,sound.link sl, images.link il FROM sound_and_images,images,sound
                                    where images.id= sound_and_images.id_images
                                    and sound.id= sound_and_images.id_sound
                                    
                            ORDER BY RAND ( )
                            LIMIT 4';
                                $result_sql = $host->query($sql);
                                foreach  ($result_sql as $row) {
                                    $pictures_array[] = $row['il'];
                                    $sound_array[] = $row['sl'];
                                }
                                $words_oreder[] = $row['id'];
                            ?>
                                <div class="row">
                                    <div class="col-md-3 content-table text-center">
                                        <h2>Liste des mots</h2>
                                        <div1  class="column column-liste" ondrop="drop(event)" ondragover="allowDrop(event)" id="list">
                                            <div class="visibility" >azertyuiop</div>
                                            <article  id ="0" draggable="true" ondragstart="drag(event)" data-id="<?php echo rand(); ?>">
                                            <figure id ="0">
                                                <audio
                                                    controls 
                                                    src="/learnenglish/sons/<?php echo $sound_array[0];?>">
                                                        Your browser does not support the
                                                        <code>audio</code> element.
                                                </audio>
                                            </figure>
                                            </article>
                                            <article  id ="1" draggable="true" ondragstart="drag(event)" data-id="<?php echo rand(); ?>">
                                            <figure id ="1">
                                                <audio
                                                    controls 
                                                    src="/learnenglish/sons/<?php echo $sound_array[1];?>">
                                                        Your browser does not support the
                                                        <code>audio</code> element.
                                                </audio>
                                            </figure>
                                            </article>
                                            <article  id ="2" draggable="true" ondragstart="drag(event)" data-id="<?php echo rand(); ?>">
                                            <figure id ="2">
                                                <audio
                                                    controls 
                                                    src="/learnenglish/sons/<?php echo $sound_array[2];?>">
                                                        Your browser does not support the
                                                        <code>audio</code> element.
                                                </audio>
                                            </figure>
                                            </article>
                                            <article  id ="3" draggable="true" ondragstart="drag(event)" data-id="<?php echo rand(); ?>">
                                            <figure id ="3">
                                                <audio controls 
                                                    src="/learnenglish/sons/<?php echo $sound_array[3];?>">
                                                        Your browser does not support the
                                                        <code>audio</code> element.
                                                </audio>
                                            </figure>
                                            </article>
                                        </div1>
                                    </div>
                                    <div class="col-md-2 content-table text-center">
                                    <div class="column column-0" ondrop="drop(event)" ondragover="allowDrop1(event)">
                                        <img class="pictures" id="0" src="/learnenglish/images/<?php echo $pictures_array[0]; ?>">
                                    </div>
                                </div>
                                <div class="col-md-2 content-table text-center">
                                    <div class="column column-1" ondrop="drop(event)" ondragover="allowDrop2(event)">
                                        <img class="pictures" id="1" src="/learnenglish/images/<?php echo $pictures_array[1]; ?>">
                                    </div>
                                </div>
                                <div class="col-md-2 content-table text-center">
                                    <div class="column column-2" ondrop="drop(event)" ondragover="allowDrop3(event)">
                                        <img class="pictures" id="2" src="/learnenglish/images/<?php echo $pictures_array[2]; ?>">
                                    </div>
                                </div>
                                <div class="col-md-2 content-table text-center">
                                    <div class="column column-3" ondrop="drop(event)" ondragover="allowDrop4(event)">
                                        <img class="pictures" id ="3" src="/learnenglish/images/<?php echo $pictures_array[3]; ?>">
                                    </div>                                            
                                </div>                                            
                            </div>

                            <div class="row">
                                <div class="bouton" onclick="console.log(verify())">
                                    Valider
                                </div>
                            </div>
                            <?php
                        }

?>
                    <?php
                        
                    }elseif($statut==false && ( isset($_GET['id']) && $leconId>0 )){
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

<script src="drag-n-drop.js"></script>
<style>
.card {
    cursor: grab;
}

.card:active {
    cursor: grabbing;
}
.card {
    transition: all 0.3s cubic-bezier(0.4, 0.0, 0.2, 1);
}

.card.dragging {
    opacity: .5;
    transform: scale(.8);
}

.column {
    transition: all 0.3s cubic-bezier(0.4, 0.0, 0.2, 1);
}

.column.drop {
    border: 2px dashed #FFF;
}

.column.drop article {
    pointer-events: none;
}



 
  div#origine, div#container {
    padding:10px;
    border:2px solid #000;
    width:100%;
    min-height:230px;
    background:#fff;
  }
  div.bouton {
    cursor:pointer;
    border:1px solid #333;
    border-radius:4px;
    display:inline-block;
    padding:5px;
    margin:10px;  
    font-weight:bold;
    background-color:#ccc;
    color:#000;
  }
  div.bouton:hover {
    background-color:#000;
    color:#fff;
  }
  img{
      width:250px;
      height:250px;
  }
  img{
      width:250px;
      height:250px;
  }
  audio{
      width:240px;
  }
  div.visibility {
  visibility: hidden;
  }
</style>