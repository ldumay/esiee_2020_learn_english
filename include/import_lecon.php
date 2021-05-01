<!-- ImportLecon -->
<div id="import_lecon" class="row">
	<div class="col-12">
		<div class="row">
			<div class="col-12 text-center">
                <h2>Importer une leçon</h2>
                <br>
            </div>
		</div>
        <hr>
        <form method="post" action="post.php" enctype="multipart/form-data">
			<div class="row">
                <div class="col-md-12 col-xs-12">
                    <!-- Zip -->
                    <h5>Leçon au format zip : </h5>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control"  id="lecon_zip" name="lecon_zip">
                    </div>
                    <p>Le zip dois contenir :
                        <br>4 images au format .jpeg
                        <br>1 fichier .csv contenu le nom des images au nommage Anglais
                    </p>
                </div>
            </div>
            <br><br>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-success" id="submit_import_lecon" name="submit_import_lecon">Ajouter leçon</button>
            </div>
		</form>
        <br>
	</div>
</div>
<!-- ./ImportLecon -->