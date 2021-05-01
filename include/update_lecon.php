<?php
    if( isset($_GET['lecon_id']) && isset($_GET['update']) && $_GET['update']==true){

        // Get informations
        $sql = 'SELECT * FROM lecons WHERE `id`='.$_GET['lecon_id'].'';
        $result_sql = $host->query($sql);
        while ( $row = $result_sql->fetch() ){
            $leconsId = $row['id'];
            $leconsTitle = $row['title'];
            if($row['statut']==1){ $leconStatut = "checked"; } else { $leconStatut = ""; }
            $leconsDescription = $row['description'];
            $leconsDateCreate = $row['date_create'];
            $leconsDateUpdate = $row['date_update'];
            echo '
            <!-- UpdateLecon -->
            <div id="update_lecon" class="row">
            	<div class="col-12">
            		<div class="row">
            			<div class="col-12 text-center">
                            <h2>Mettre à jour une leçon</h2>
                            <br>
                        </div>
            		</div>
                    <hr>
                    <form method="post" action="post.php" enctype="multipart/form-data">
            			<div class="row">
                            <div class="col-12">
                                <input class="form-control" type="hidden" id="update_lecon_id" name="update_lecon_id" value="'.$leconsId.'">
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <!-- Titre -->
                                <div class="form-group">
                                    <label for="first_name">Titre</label>
                                    <input class="form-control" type="text" id="update_lecon_title" name="update_lecon_title" placeholder="Titre" value="'.$leconsTitle.'">
                                </div>

                                <!-- Statut -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="update_lecon_statut" name="update_lecon_statut" '.$leconStatut.'>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Statut : Ouvert ou fermer
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <!-- Description -->
                                <div class="form-group">
                                    <label for="last_name">Description</label>
                                    <input class="form-control" type="text" id="update_lecon_description" name="update_lecon_description" placeholder="Description" value="'.$leconsDescription.'">
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-info" id="submit_update_lecon" name="submit_update_lecon">Mettre à jour la leçon</button>
                            <button type="submit" class="btn btn-success" id="submit_export_lecon" name="submit_export_lecon">Exporter la leçon</button>
                            <button type="submit" class="btn btn-danger" id="submit_close_lecon" name="submit_close_lecon">Fermer la leçon</button>
                        </div>
            		</form>
                    <br>
            	</div>
            </div>
            <!-- ./UpdateLecon -->
            ';
        }
    }
?>