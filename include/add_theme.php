<!-- AddTheme -->
<div id="add_theme" class="row">
	<div class="col-12">
		<div class="row">
			<div class="col-12 text-center">
                <h2>Ajouter un thème</h2>
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
                        <input class="form-control" type="text" id="theme_title" name="theme_title" placeholder="Titre">
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <!-- Description -->
                    <div class="form-group">
                        <label for="last_name">Description</label>
                        <input class="form-control" type="text" id="theme_description" name="theme_description" placeholder="Description">
                    </div>
                </div>
            </div>
            <br><br>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-success" id="submit_add_theme" name="submit_add_theme">Ajouter thème</button>
            </div>
		</form>
        <br>
	</div>
</div>
<!-- ./AddTheme -->