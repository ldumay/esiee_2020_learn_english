<!-- Header -->
<div id="header" class="row">

    <?php if( isset($_SESSION['User_id']) && $_SESSION['User_id']!='' ){ ?>
    <div class="col-12">
        <div class="row">
            <div class="col-md-7 col-xs-12">
                <h1 class="title"><?php echo $project_title; ?></h1>
            </div>
            <div class="col-md-5 col-xs-12 navigation">
                <button type="button" class="btn btn-success" id="addLecon" name="addLecon">➕ Ajouter une leçon</button>
                <button type="button" class="btn btn-info" id="account" name="account">👤 Mon compte</button>
                <button type="button" class="btn btn-danger" id="logout" name="logout">🔒 Déconnexion</button>
            </div>
        </div>
        <hr>
        <div class="row">
            <nav class="col-md-12">
                <a class="p-2 text-dark" href="home.php">Accueil</a>
                <a class="p-2 text-info" href="#">Liste leçons</a>
            </nav>
        </div>
    </div>
    <?php } else { ?>
    <div id="header" class="col-12">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <h1 class="title text-center"><?php echo $project_title; ?></h1>
            </div>
        </div>
    </div>
    <?php } ?>

</div>
<!-- ./Header -->