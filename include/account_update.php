<!-- UpdateUser -->
	<div id="update_account" class="row">
		<div class="col-12">
			<div class="row">
				<div class="col-12 text-center">
                    <h2>Mise à jour du compte</h2>
                    <br>
                </div>
			</div>
            <hr>
            <?php
                // Grabe user informations
                $sql = 'SELECT * FROM users WHERE id="'.$_COOKIE['user_id'].'"';
                $result_sql = $host->query($sql);
                while ( $row = $result_sql->fetch() ){
                    $user_id = $row['id'];
                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];
                    $pseudo = $row['pseudo'];
                    $mail = $row['mail'];
                }
            ?>
            <form method="post" action="post.php" enctype="multipart/form-data">
				<div class="row">
					<div class="col-12">
						<input class="form-control" type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>">
					</div>
					<div class="col-md-6 col-xs-12">
						<!-- FirstName -->
						<div class="form-group">
                            <label for="first_name">Nom</label>
                            <?php if($first_name=='NULL'){ ?>
                                <input class="form-control" type="text" id="first_name" name="first_name" placeholder="Nom">
                            <?php }else{ ?>
                                <input class="form-control" type="text" id="first_name" name="first_name" value="<?php echo $first_name; ?>">
                            <?php } ?>
						</div>
						<!-- LastName -->
						<div class="form-group">
                            <label for="last_name">Prénom</label>
                            <?php if($last_name=='NULL'){ ?>
                                <input class="form-control" type="text" id="last_name" name="last_name" placeholder="Prénom">
                            <?php }else{ ?>
                                <input class="form-control" type="text" id="last_name" name="last_name" value="<?php echo $last_name; ?>">
                            <?php } ?>
                        </div>
                        <!-- Pseudo -->
                        <div class="form-group">
                            <label for="pseudo">Pseudo</label>
                            <?php if($pseudo=='NULL'){ ?>
                                <input class="form-control" type="text" id="pseudo" name="pseudo" placeholder="Pseudo">
                            <?php }else{ ?>
                                <input class="form-control" type="text" id="pseudo" name="pseudo" value="<?php echo $pseudo; ?>">
                            <?php } ?>
                        </div>
                    </div>
					<div class="col-md-6 col-xs-12">
						<!-- Password -->
						<div class="form-group">
                            <label for="password">Nouveau mot de passe</label>
                            <input class="form-control" type="text" id="password" name="password" placeholder="Nouveau mot de passe">
                        </div>
                        <!-- ConfirmePassword -->
                        <div class="form-group">
                            <label for="confirmPassword">Confirmation du nouveau mot de passe</label>
                            <input class="form-control" type="text" id="confirmPassword" name="confirmPassword" placeholder="Confirmation du nouveau mot de passe">
                        </div>
                        <!-- Mail -->
						<div class="form-group">
                            <label for="mail">Email</label>
                            <?php if($first_name=='NULL'){ ?>
                                <input class="form-control" type="mail" id="mail" name="mail" placeholder="Email">
                            <?php }else{ ?>
                                <input class="form-control" type="mail" id="mail" name="mail" value="<?php echo $mail; ?>">
                            <?php } ?>
                        </div>
                    </div>
                    <br><br>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-success" id="submit_update_account" name="submit_update_account">Mise à jour du compte</button>
                    </div>
                </div>
			</form>
            <br>
		</div>
    </div>
    <!-- ./UpdateUser -->