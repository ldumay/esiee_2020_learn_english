<?php
    if( isset($_GET['theme_id']) && isset($_GET['update']) && $_GET['update']==true){

        // Get informations
        $sql = 'SELECT * FROM themes WHERE `id`='.$_GET['theme_id'].'';
        $result_sql = $host->query($sql);
        while ( $row = $result_sql->fetch() ){
            $themesId = $row['id'];
            $themesTitle = $row['title'];
            $themesDescription = $row['description'];
            $themesDateCreate = $row['date_create'];
            $themesDateUpdate = $row['date_update'];
            echo '
            <!-- UpdateTheme -->
            <div id="update_theme" class="row">
            	<div class="col-12">
            		<div class="row">
            			<div class="col-12 text-center">
                            <h2>Mettre à jour un thème</h2>
                            <br>
                        </div>
            		</div>
                    <hr>
                    <form method="post" action="post.php" enctype="multipart/form-data">
            			<div class="row">
                            <div class="col-12">
                                <input class="form-control" type="hidden" id="update_theme_id" name="update_theme_id" value="'.$themesId.'">
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <!-- Titre -->
                                <div class="form-group">
                                    <label for="first_name">Titre</label>
                                    <input class="form-control" type="text" id="update_theme_title" name="update_theme_title" placeholder="Titre" value="'.$themesTitle.'">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <!-- Description -->
                                <div class="form-group">
                                    <label for="last_name">Description</label>
                                    <input class="form-control" type="text" id="update_theme_description" name="update_theme_description" placeholder="Description" value="'.$themesDescription.'">
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-info" id="submit_update_theme" name="submit_update_theme">Mettre à jour le thème</button>
                            <button type="submit" class="btn btn-danger" id="submit_close_theme" name="submit_close_theme">Fermer le thème</button>
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