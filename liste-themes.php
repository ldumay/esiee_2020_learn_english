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
                    <h2>Liste des themes</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Titre</th>
                                <th scope="col">Description</th>
                                <th scope="col">Date Création</th>
                                <th scope="col">Date Modification</th>
                                <th scope="col">Modifier</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Grabe user informations
                                $sql = 'SELECT * FROM themes';
                                $result_sql = $host->query($sql);
                                while ( $row = $result_sql->fetch() ){
                                    $theme_id = $row['id'];
                                    $theme_title = $row['title'];
                                    $theme_description = $row['description'];
                                    $theme_DateCreate = dateFormat("d/m/Y",$row['date_create']);
                                    $theme_DateUpdate = dateFormat("d/m/Y",$row['date_update']);
                                    //-
                                    echo '
                                        <tr>
                                            <td>'.$theme_id.'</td>
                                            <td>'.$theme_title.'</td>
                                            <td>'.$theme_description.'</td>
                                            <td>'.$theme_DateCreate.'</td>
                                            <td>'.$theme_DateUpdate.'</td>
                                            <td><a href="liste-themes.php?theme_id='.$theme_id.'&update=true">🛠</a></td>
                                            <td><a href="post.php?theme_id='.$theme_id.'&delete=true">🗑</a></td>
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