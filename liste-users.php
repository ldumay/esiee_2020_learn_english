<?php 
	include('include/php_start.php');
    include('include/head.php');
    ?>
	<body>
        <!-- Container -->
		<div class="container container-client">
            <?php
            	include('include/modules.php');
            ?>

            <!-- LeconsListes -->
            <div class="row">
                <div id="list_company" class="col-md-12 content-table">
                    <h2>Liste des utilisateurs</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Pseudo</th>
                                <th scope="col">Mail</th>
                                <th scope="col">Date Création</th>
                                <th scope="col">Date Modification</th>
                                <th scope="col">Modifier</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Grabe user informations
                                $sql = 'SELECT * FROM users';
                                $result_sql = $host->query($sql);
                                while ( $row = $result_sql->fetch() ){
                                    $user_id = $row['id'];
                                    $user_firstname = $row['first_name'];
                                    $user_lastname = $row['last_name'];
                                    $user_pseudo = $row['pseudo'];
                                    $user_mail = $row['mail'];
                                    $user_DateCreate = dateFormat("d/m/Y",$row['date_create']);
                                    $user_DateUpdate = dateFormat("d/m/Y",$row['date_update']);
                                    //-
                                    echo '
                                        <tr>
                                            <td>'.$user_id.'</td>
                                            <td>'.$user_firstname.'</td>
                                            <td>'.$user_lastname.'</td>
                                            <td>'.$user_pseudo.'</td>
                                            <td>'.$user_mail.'</td>
                                            <td>'.$user_DateCreate.'</td>
                                            <td>'.$user_DateUpdate.'</td>
                                            <td><a href="liste-users.php?user_id='.$user_id.'&update=true">🛠</a></td>
                                            <td><a href="post.php?user_id='.$user_id.'&delete=true">🗑</a></td>
                                        </tr>
                                    ';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- ./LeconsListes -->

            <!-- Basdepage -->
            <div class="row">
                <div class="col-12 btn_haut_de_page">
                    <a href="#title">Haut de Page</a>
                </div>
            </div>
            <!-- ./Basdepage -->

            <?php include('include/footer.php'); ?>

        </div>
        <!-- ./Container -->
        
	<body>
    <?php
    include('include/javascript.php');
    include('include/php_end.php');
?>