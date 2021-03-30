<?php
    include('init.php');

    if( isset($_COOKIE['user_id']) && ($_COOKIE['user_id']!='') ){
        $user_id = $_COOKIE["user_id"];
        header('location:home.php');
    }

    if( empty($_GET['type']) ){
        // SQL
        $sql_table_companies = 'SELECT * FROM companies WHERE `user_id`="'.$user_id.'"';
    }
    if( empty($_GET['type']) ){ header('location:auth.php?type=login'); }
    
    include('include/head.php');
    ?>
	<body>
        <!-- Container -->
		<div class="container" style="width: 890px;">
            
            <!-- Header -->
            <div class="row">
                <div id="title" class="col-12">
                        <h1 class="title text-center"><?php echo $project_title; ?></h1>
                        <?php include('include/alertes.php'); ?>
                    <hr>
                </div>
            </div>
            <!-- ./Header -->

            <?php if($_GET['type']=='login' && $user_login==true){ ?>
                <!-- ContentAuthLogIn -->
                <form method="post" action="post.php">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h3>Connexion</h3>
                            <hr>
                        </div>
                        <div class="col-12">
                            <!-- Mail -->
                            <div class="form-group">
                                <label for="mail">Mail ou Pseudo</label>
                                <input class="form-control" type="mail" id="mail" name="mail" placeholder="Mail ou Pseudo">
                            </div>
                            <!-- Password -->
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control" type="password" id="password" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-success" id="login" name="login">Valider ma connexion</button>
                            <?php if($user_register==true){ ?> <a href="auth.php?type=register"><button type="button" class="btn btn-info">M'inscrire</button></a><?php } ?>
                        </div>
                    </div>
                </form>
                <!-- ./ContentAuthLogIn -->
            <?php } ?>

            <?php if($_GET['type']=='register' && $user_register==true){ ?>
                <!-- ContentAuthRegister -->
                <form method="post" action="post.php">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h3>Inscription</h3>
                            <hr>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <!-- FirstName -->
                            <div class="form-group">
                                <label for="firstname">Nom</label>
                                <input class="form-control" type="text" id="firstname" name="firstname" placeholder="Nom">
                            </div>
                            <!-- LastName -->
                            <div class="form-group">
                                <label for="lastname">Prénom</label>
                                <input class="form-control" type="text" id="lastname" name="lastname" placeholder="Prénom">
                            </div>
                            <!-- Pseudo -->
                            <div class="form-group">
                                <label for="pseudo">Pseudo</label>
                                <input class="form-control" type="text" id="pseudo" name="pseudo" placeholder="Pseudo">
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <!-- Mail -->
                            <div class="form-group">
                                <label for="mail">Mail</label>
                                <input class="form-control" type="mail" id="mail" name="mail" placeholder="Mail">
                            </div>
                            <!-- Password -->
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control" type="password" id="password" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-success" id="register" name="register">Valider mon inscription</button>
                            <?php if($user_register==true){ ?> <a href="auth.php?type=login"><button type="button" class="btn btn-info">Me connecter</button></a><?php } ?>
                        </div>
                    </div>
                </form>
                <!-- ./ContentAuthRegister -->
            <?php } ?>

            <?php include('include/footer.php'); ?>

        </div>
        <!-- ./Container -->
        
	<body>
    <?php
    include('include/javascript.php');
    include('include/php_end.php');
?>