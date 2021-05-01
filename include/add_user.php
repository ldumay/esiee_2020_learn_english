<!-- AddUser -->
<div id="add_user" class="row">
	<div class="col-12">
		<div class="row">
			<div class="col-12 text-center">
                <h2>Ajouter un utiliateur</h2>
                <br>
            </div>
		</div>
        <hr>
        <form method="post" action="post.php" enctype="multipart/form-data">
			<div class="row">
                <div class="col-md-6 col-xs-12">
                    <!-- Nom -->
                    <div class="form-group">
                        <label for="first_name">Nom</label>
                        <input class="form-control" type="text" id="user_firstname" name="user_firstname" placeholder="Nom">
                    </div>

                    <!-- Prénom -->
                    <div class="form-group">
                        <label for="last_name">Prénom</label>
                        <input class="form-control" type="text" id="user_lastname" name="user_lastname" placeholder="Prénom">
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <!-- Pseudo -->
                    <div class="form-group">
                        <label for="last_name">Pseudo</label>
                        <input class="form-control" type="text" id="user_pseudo" name="user_pseudo" placeholder="Pseudo">
                    </div>

                    <!-- Mail -->
                    <div class="form-group">
                        <label for="last_name">Mail</label>
                        <input class="form-control" type="text" id="user_mail" name="user_mail" placeholder="Mail">
                    </div>
                </div>
                <div class="col-12 text-center">
                    <p>Mot de passe enregistrer par défault => "test"</p>
                </div>
            </div>
            <br><br>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-success" id="submit_add_user" name="submit_add_user">Ajouter utilisateur</button>
            </div>
		</form>
        <br>
	</div>
</div>
<!-- ./AddUser -->