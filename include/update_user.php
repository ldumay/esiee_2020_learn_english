<?php
    if( isset($_GET['user_id']) && isset($_GET['update']) && $_GET['update']==true){

        // Get informations
        $sql = 'SELECT * FROM users WHERE `id`='.$_GET['user_id'].'';
        $result_sql = $host->query($sql);
        while ( $row = $result_sql->fetch() ){
            $usersId = $row['id'];
            $usersFirstName = $row['first_name'];
            $usersLastName = $row['last_name'];
            $usersPseudo = $row['pseudo'];
            $usersMail = $row['mail'];
            $usersDateCreate = $row['date_create'];
            $usersDateUpdate = $row['date_update'];
            echo '
            <!-- UpdateUser -->
            <div id="update_user" class="row">
            	<div class="col-12">
            		<div class="row">
            			<div class="col-12 text-center">
                            <h2>Mettre à jour un utilisateur</h2>
                            <br>
                        </div>
            		</div>
                    <hr>
                    <form method="post" action="post.php" enctype="multipart/form-data">
            			<div class="row">
                            <div class="col-12">
                                <input class="form-control" type="hidden" id="update_user_id" name="update_user_id" value="'.$usersId.'">
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <!-- FirstName -->
                                <div class="form-group">
                                    <label for="first_name">Nom</label>
                                    <input class="form-control" type="text" id="update_user_firstname" name="update_user_firstname" placeholder="Nom" value="'.$usersFirstName.'">
                                </div>
                                <!-- LastName -->
                                <div class="form-group">
                                    <label for="first_name">Prénom</label>
                                    <input class="form-control" type="text" id="update_user_lastname" name="update_user_lastname" placeholder="Prénom" value="'.$usersLastName.'">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <!-- Pseudo -->
                                <div class="form-group">
                                    <label for="last_name">Pseudo</label>
                                    <input class="form-control" type="text" id="update_user_pseudo" name="update_user_pseudo" placeholder="Pseudo" value="'.$usersPseudo.'">
                                </div>
                                <!-- Mail -->
                                <div class="form-group">
                                    <label for="last_name">Mail</label>
                                    <input class="form-control" type="text" id="update_user_mail" name="update_user_mail" placeholder="Mail" value="'.$usersMail.'">
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-info" id="submit_update_user" name="submit_update_user">Mettre à jour l\'utilisateur</button>
                            <button type="submit" class="btn btn-danger" id="submit_close_user" name="submit_close_user">Fermer l\'utilisateur</button>
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