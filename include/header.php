<!-- Header -->
<div id="header" class="row">

    <div class="col-12">
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <h1 class="title"><?php echo $project_title; ?></h1>
            </div>
            <div class="col-md-8 col-xs-12 navigation">
                <button type="button" class="btn btn-success" id="addLecon" name="addLecon">➕ Créer une nouvelle leçon</button>
                <button type="button" class="btn btn-success" id="addTheme" name="addTheme">➕ Ajouter un thème</button>
                <button type="button" class="btn btn-success" id="addUser" name="addUser">➕ Ajouter un utilisateur</button>
                <button type="button" class="btn btn-primary" id="importLecon" name="importLecon">➕ Importer une leçon</button>
                <button type="button" class="btn btn-info" id="account" name="account">👤 Mon compte</button>
                <button type="button" class="btn btn-danger" id="logout" name="logout">🔒 Déconnexion</button>
            </div>
        </div>
        <hr>
        <div class="row">
            <nav class="col-md-12">
                <a class="p-2 text-dark" href="home.php">Accueil</a>
                <a class="p-2 text-info" href="liste-lecons.php">Liste leçons</a>
                <a class="p-2 text-info" href="liste-themes.php">Liste themes</a>
                <a class="p-2 text-info" href="liste-users.php">Liste users</a>
            </nav>
        </div>
    </div>

</div>
<!-- ./Header -->