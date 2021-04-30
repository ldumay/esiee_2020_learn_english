<!-- AddLecon -->
<div id="add_lecon" class="row">
	<div class="col-12">
		<div class="row">
			<div class="col-12 text-center">
                <h2>Ajouter une leçon</h2>
                <br>
            </div>
		</div>
        <hr>
        <form method="post" action="post.php" enctype="multipart/form-data">
			<div class="row">
                <div class="col-md-6 col-xs-12">
                    <!-- Titre -->
                    <div class="form-group">
                        <label for="first_name">Titre</label>
                        <input class="form-control" type="text" id="lecon_title" name="lecon_title" placeholder="Titre">
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <!-- Description -->
                    <div class="form-group">
                        <label for="last_name">Description</label>
                        <input class="form-control" type="text" id="lecon_description" name="lecon_description" placeholder="Description">
                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <h5>Leçon au format zip : </h5>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control"  id="lecon_zip" name="lecon_zip">
                    </div>
                    <p>Le zip dois contenir :
                        <br>4 images au format .jpeg
                        <br>1 fichier .csv contenu le nom Anglais = Français
                    </p>
                </div>
            </div>
            <br><br>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-success" id="submit_add_lecon" name="submit_add_lecon">Ajouter leçon</button>
            </div>
		</form>
        <br>
	</div>
</div>
<!-- ./AddLecon -->