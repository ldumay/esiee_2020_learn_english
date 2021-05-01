<?php
    include('init.php');

    $debugPage = true;
    $debugPageFunctions = true;

    // Create necessary var and functions
    function retunIndex($selected){ 
        if($selected=='index') // If this connection avaible
            header('location:home.php');
        else if($selected=='auth') // If this connection not avaible
            header('location:auth.php');
        else if($selected=='lecons') // If this connection not avaible
            header('location:liste-lecons.php');
        else if($selected=='themes') // If this connection not avaible
            header('location:liste-themes.php');
        else if($selected=='users') // If this connection not avaible
            header('location:liste-users.php');
        else if($selected=='login') // If this connection not avaible
            header('location:auth.php?login=true');
    }

    // Create date today
    $dateToday = ToDay('Y-m-d');
    $dateToday = dateFormat('Y-m-d',$dateToday);

    // Clear necessary var
    if( ($_SESSION['alert_typecolor'] !='') || ($_SESSION['alert_message'] !='') ){
        if( empty($_SESSION['alert_typecolor']) )
            $_SESSION['alert_typecolor'] = '';
        if( empty($_SESSION['alert_message']) )
            $_SESSION['alert_message'] = '';
    }

    // Action after clik button for register
    if( isset($_POST['register']) ){

        // Datas insert verification
        if( isset($_POST['mail']) && ($_POST['password']!='') ){

            // Prepare data necessary
            $pseudo_exist = false;
            $mail_exist = false;
            // Compare pseudo or mail with all pseudo and mail in BDD
            $sql = 'SELECT `pseudo`,`mail` FROM `users` WHERE `pseudo`="'.$_POST['pseudo'].'" OR `mail`="'.$_POST['mail'].'"';
            $result_sql = $host->query($sql);
            while ( $row = $result_sql->fetch() ){
                // Datas recovering
                if( $_POST['pseudo'] == $row['pseudo'])
                    $pseudo_exist = true;
                if( $_POST['mail'] == $row['mail'])
                    $mail_exist = true;
            }

            if( ($mail_exist==false) && ($mail_exist==false) ){

                // firstname
                if( isset($_POST['firstname']) && ($_POST['firstname']!='') ){ $firstname = $_POST['firstname']; } else { $firstname = 'NULL'; }
                // lastname
                if( isset($_POST['lastname']) && ($_POST['lastname']!='') ){ $lastname = $_POST['lastname']; } else { $lastname = 'NULL'; }
                // pseudo
                if( isset($_POST['pseudo']) && ($_POST['pseudo']!='') ){ $pseudo = $_POST['pseudo']; } else { $pseudo = 'NULL'; }
                // mail
                if( isset($_POST['mail']) && ($_POST['mail']!='') ){ $mail = $_POST['mail']; } else { $mail = 'NULL'; }
                // password
                if( isset($_POST['password']) && ($_POST['password']!='') ){ $password = $_POST['password']; } else { $password = 'NULL'; }
                // Crypt password
                $password = cryptMdp($password);

                /*
                echo 'Vérification : <br>'.
                '0 - firstname : '.$firstname.'<br>'.
                '1 - lastname : '.$lastname.'<br>'.
                '2 - pseudo : '.$pseudo.'<br>'.
                '3 - mail : '.$mail.'<br>'.
                '4 - password : '.$password.'<br>';
                */

                // SQL
                $sql = "INSERT INTO `users` (`first_name`, `last_name`, `pseudo`, `mail`, `password`) VALUES ('".$firstname."','".$lastname."','".$pseudo."','".$mail."','".$password."')";

                //echo '<br>'.$sql;
                $result = $host->query($sql);

                // Connect client
                $sql = 'SELECT `id`,`pseudo`,`mail`,`password` FROM `users` WHERE `pseudo`="'.$pseudo.'" AND `mail`="'.$mail.'" AND `password`="'.$password.'"';
                $result_sql = $host->query($sql);
                while ( $row = $result_sql->fetch() ){
                    // Datas recovering
                    setcookie("user_id", $row['id']);
                }

                // Create confirm message
                $_SESSION['alert_typecolor'] = 'success';
                $_SESSION['alert_message'] = 'Vous enregistré.<br>Vous pouvez connecter maintenant.';

                // Back to Home page
                retunIndex('index');
            
            }else{
                // Create confirm message
                $_SESSION['alert_typecolor'] = 'warning';
                $_SESSION['alert_message'] = 'Votre pseudo ou mail existe déjà.';

                // Back to Home page
                retunIndex('auth');
            }
        }else{
            // Create error message
            $_SESSION['alert_typecolor'] = 'warning';
            $_SESSION['alert_message'] = 'Votre mail ou votre mot de passe n\'a pas été saisi.';

            // Back to Home page
            retunIndex('auth');
        }

    }

    // Action after clik button for login
    if( isset($_POST['login']) ){

        // Datas insert verification
        if( isset($_POST['mail']) && isset($_POST['password']) ){
            
            // Prepare data necessary
            $mail = false;
            $pseudo = false;
            $password = false;
            $password_user = cryptMdp($_POST['password']);

            // Compare name company with all name in BDD
            $sql = 'SELECT `id`,`pseudo`,`mail`,`password` FROM users WHERE mail="'.$_POST['mail'].'" OR pseudo="'.$_POST['mail'].'" AND `password`="'.$password_user.'"';
            //echo $sql;
            
            $result_sql = $host->query($sql);
            while ( $row = $result_sql->fetch() ){
                // Datas recovering
                if( $_POST['mail'] == $row['mail'] )
                    $mail = true;
                if( $_POST['mail'] == $row['pseudo'] )
                    $pseudo = true;
                if( $password_user == $row['password'] )
                    $password = true;
                if( ( ($mail == true) && ($password == true) ) || ( ($pseudo == true) && ($password == true) ) )
                    $user_id = $row['id'];
            }

            /*
            echo '<br><br>'.
            'Vérification : <br>'.
            '0 - mail : '.$mail.'<br>'.
            '1 - pseudo : '.$pseudo.'<br>'.
            '2 - password : '.$password.'<br>'.
            '3 - post - password_user : '.$password_user.'<br>'.
            '4 - post - mail or pseudo : '.$_POST['mail'].'<br>'.
            '5 - user_id : '.$user_id.'<br>';
            */

            if( isset($user_id) && ($user_id!='') ){
                // Connect client
                setcookie("user_token", 'temp',time()+3600);//expire dans 1 heure
                setcookie("user_id", $user_id);

                // Create confirm message
                $_SESSION['alert_typecolor'] = 'success';
                $_SESSION['alert_message'] = 'Vous êtes connecté.';

                // Back to Home page
                retunIndex('index');
            }else{
                // Create error message
            $_SESSION['alert_typecolor'] = 'warning';
            $_SESSION['alert_message'] = 'Votre mail, votre pseudo ou mot de passe est incorrect.';

            // Back to Home page
            retunIndex('auth');
            }
        }else{
            // Create error message
            $_SESSION['alert_typecolor'] = 'warning';
            $_SESSION['alert_message'] = 'Votre mail ou votre mot de passe n\'a pas été saisi.';

            // Back to Home page
            retunIndex('auth');
        }
        
    }

    // Action after clik button for logout
    if( isset($_GET['logout']) && ($_GET['logout']==true)){
        
        // Connect client
        setcookie("user_id", "", time() - 3600);
        setcookie("user_token", "", time() - 3600);
        $_SESSION['User_id'] = 0;
        $_SESSION['user_token'] = null;

        // Create confirm message
        $_SESSION['alert_typecolor'] = 'success';
        $_SESSION['alert_message'] = 'Vous êtes déconnecté.';

        // Back to Home page
        retunIndex('auth');

        clean_Sessions();
    }

    // Action after click button for update user
    if( isset($_POST['submit_update_account']) ){

        // Create var nessary
        $alert_typecolor = 'success';
        $alert_message = 'Votre compte a été mise à jour.';

        // user_id
        if( isset($_POST['user_id']) && ($_POST['user_id']!='') ){ $user_id = $_POST['user_id']; } else { $user_id = 'NULL'; }
        // first_name
        if( isset($_POST['first_name']) && ($_POST['first_name']!='') ){ $first_name = $_POST['first_name']; } else { $first_name = 'NULL'; }
        // last_name
        if( isset($_POST['last_name']) && ($_POST['last_name']!='') ){ $last_name = $_POST['last_name']; } else { $last_name = 'NULL'; }
        // pseudo
        if( isset($_POST['pseudo']) && ($_POST['pseudo']!='') ){ $pseudo = $_POST['pseudo']; } else { $pseudo = 'NULL'; }
        // password & confirmPassword
        if( ( isset($_POST['password']) && ($_POST['password']!='') ) && ( isset($_POST['confirmPassword']) && ($_POST['confirmPassword']!='') 
            && ($_POST['password']==$_POST['confirmPassword']) ) ){
            $password = cryptMdp($_POST['password']);
        }
        // mail
        if( isset($_POST['mail']) && ($_POST['mail']!='') ){ $mail = $_POST['mail']; } else { $mail = 'NULL'; }

        /*
        echo 'Vérification : <br>'.
        '0 - user_id : '.$user_id.'<br>'.
        '1 - first_name : '.$first_name.'<br>'.
        '2 - last_name : '.$last_name.'<br>'.
        '3 - pseudo : '.$pseudo.'<br>'.
        '4 - mail : '.$mail.'<br>';
        */

        // SQL
        if(isset($password) && $password!=''){
            $sql = 'UPDATE `users` SET `id`="'.$user_id.'",`first_name`="'.$first_name.'",`last_name`="'.$last_name.'",`pseudo`="'.$pseudo.'", `password`="'.$password.'", `mail`="'.$mail.'" WHERE `id`="'.$user_id.'"';
        } else{
            $sql = 'UPDATE `users` SET `id`="'.$user_id.'",`first_name`="'.$first_name.'",`last_name`="'.$last_name.'",`pseudo`="'.$pseudo.'",`mail`="'.$mail.'" WHERE `id`="'.$user_id.'"';
        }

        //echo '<br>'.$sql;
        
        $result = $host->query($sql);

        // Create message
        $_SESSION['alert_typecolor'] = $alert_typecolor;
        $_SESSION['alert_message'] = $alert_message;

        // Back to Home page
        retunIndex('index');
    }

    //- Action after click button for add theme
    if( isset($_POST['submit_add_theme'])){

        // Create var nessary
        $alert_typecolor = 'success';
        $alert_message = 'Le thèmes a bien été ajouté.';

        // theme_title
        if( isset($_POST['theme_title']) && ($_POST['theme_title']!='') ){ $theme_title = $_POST['theme_title']; } else { $theme_title = 'NULL'; }
        // theme_description
        if( isset($_POST['theme_description']) && ($_POST['theme_description']!='') ){ $theme_description = $_POST['theme_description']; } else { $theme_description = 'NULL'; }
        
        // SQL
        $sql = 'INSERT INTO `themes`(`title`, `description`, `date_create`, `date_update`) VALUES ("'.$theme_title.'", "'.$theme_description.'",now(),now())';
        
        $result = $host->query($sql);

        // Create message
        $_SESSION['alert_typecolor'] = $alert_typecolor;
        $_SESSION['alert_message'] = $alert_message;

        // Back to Home page
        retunIndex('themes');
    }

    //- Action after click button for add user
    if( isset($_POST['submit_add_user'])){

        // Create var nessary
        $alert_typecolor = 'success';
        $alert_message = 'Le utilisateurs a bien été ajouté.';

        // user_firstname
        if( isset($_POST['user_firstname']) && ($_POST['user_firstname']!='') ){ $user_firstname = $_POST['user_firstname']; } else { $user_firstname = 'NULL'; }
        // user_lastname
        if( isset($_POST['user_lastname']) && ($_POST['user_lastname']!='') ){ $user_lastname = $_POST['user_lastname']; } else { $user_lastname = 'NULL'; }
        // user_pseudo
        if( isset($_POST['user_pseudo']) && ($_POST['user_pseudo']!='') ){ $user_pseudo = $_POST['user_pseudo']; } else { $user_pseudo = 'NULL'; }
        // user_mail
        if( isset($_POST['user_mail']) && ($_POST['user_mail']!='') ){ $user_mail = $_POST['user_mail']; } else { $user_mail = 'NULL'; }
        // password default - Test : ee26b0dd4af7e749aa1a8ee3c10ae9923f618980772e473f8819a5d4940e0db27ac185f8a0e1d5f84f88bc887fd67b143732c304cc5fa9ad8e6f57f50028a8ff
        $user_password = 'ee26b0dd4af7e749aa1a8ee3c10ae9923f618980772e473f8819a5d4940e0db27ac185f8a0e1d5f84f88bc887fd67b143732c304cc5fa9ad8e6f57f50028a8ff';

        // SQL
        $sql = 'INSERT INTO `users`(`first_name`, `last_name`, `pseudo`, `mail`, `password`, `date_create`, `date_update`) VALUES ("'.$user_firstname.'", "'.$user_lastname.'", "'.$user_pseudo.'", "'.$user_mail.'", "'.$user_password.'",now(),now())';
        
        $result = $host->query($sql);

        // Create message
        $_SESSION['alert_typecolor'] = $alert_typecolor;
        $_SESSION['alert_message'] = $alert_message;

        // Back to Home page
        retunIndex('users');
    }
        
    //- Action after click button for add lecon
    if( isset($_POST['submit_add_lecon'])){

        // Create var nessary
        $alert_typecolor = 'success';
        $alert_message = 'La leçon a bien été ajouté.';

        // lecon_title
        if( isset($_POST['lecon_title']) && ($_POST['lecon_title']!='') ){ $lecon_title = $_POST['lecon_title']; } else { $lecon_title = 'NULL'; }
        // lecon_description
        if( isset($_POST['lecon_description']) && ($_POST['lecon_description']!='') ){ $lecon_description = $_POST['lecon_description']; } else { $lecon_description = 'NULL'; }
        // lecon_theme
        if( isset($_POST['lecon_theme']) && ($_POST['lecon_theme']!='') ){ $lecon_theme = $_POST['lecon_theme']; } else { $lecon_theme = 'NULL'; }
        
        // SQL
        /*
        $sql = 'INSERT INTO `lecons`(`title`, `description`, `date_create`, `date_update`) VALUES ("'.$lecon_title.'", "'.$lecon_description.'",now(),now())';

        $result = $host->query($sql);

        // Create message
        $_SESSION['alert_typecolor'] = $alert_typecolor;
        $_SESSION['alert_message'] = $alert_message;

        // Back to Home page
        retunIndex('index');
        */
    }

    //- Action after click button for export lecon in zip
    if( isset($_POST['submit_import_lecon']) ){
        // lecon_zip
        if( isset($_FILES['lecon_zip']) && ($_FILES['lecon_zip']!='') ){ $lecon_zip = $_FILES['lecon_zip']; } else { $lecon_zip = 'NULL'; }

        $traitement_zip_getFile = false;
        $traitement_zip_extraction = false;
        $traitement_zip_read = false;
        $traitement_zip_clean = false;
        $traitement_zip_insert = false;

        if($debugPage==true){
            echo "<hr>";
            echo "<h3>New Leçon</h3>";
            var_dump($lecon_title);
            echo "<hr>";
            var_dump($lecon_description);
            echo "<hr>";
            var_dump($lecon_theme);
            echo "<hr>";
            var_dump($lecon_zip);
        }

        if($debugPage==true){
            echo "<hr>";
            echo "<h3>Get file</h3>";
        }
        $result_1 = fileGetZip($lecon_zip, $debugPageFunctions);
        if($result_1=="Enregistrement du zip OK." || $result_1=="Erreur transfert ! Ce zip esiste déjà."){
            $traitement_zip_getFile = true;
            echo "[GOOD - A]<br>";
        }

        if($debugPage==true){
            echo "<hr>";
            echo "<h3>Extration file</h3>";
        }
        $result_2 = fileZipOpenAndExtract($lecon_zip, $debugPageFunctions);
        //extrator($file_tmp_name, $file_destination);
        var_dump($result_2);
        if($result_2=="Zip opened." || $result_2=="Erreur d'extraction ! Ce dossier esiste déjà."){
            $traitement_zip_extraction = true;
            echo "[GOOD - B]<br>";
        }
        
        if($debugPage==true){
            echo "<hr>";
            echo "<h3>Read file</h3>";
            $csv = getCSVOnZip($lecon_zip, $debugPageFunctions);
        }
        if($csv!="failed \"_elementsList.csv\""){
            $traitement_zip_read = true;
            echo "[GOOD - C]";
        }

        if($debugPage==true){
            echo "<hr>";
            echo "<h3>Clean Uploads</h3>";
        }
        $result_clean = cleanFileUploads($lecon_zip, $debugPageFunctions);
        if($result_clean=="Le zip a été retiré du dossier d'uploads."){
            $traitement_zip_clean = true;
            echo "[GOOD - C]<br>";
        }

        if($debugPage==true){
            echo 'traitement_zip_getFile : ';
            var_dump($traitement_zip_getFile);
            echo '<br>';

            echo 'traitement_zip_extraction : ';
            var_dump($traitement_zip_extraction);
            echo '<br>';
            
            echo 'traitement_zip_read : ';
            var_dump($traitement_zip_read);
            echo '<br>';

            echo 'traitement_zip_clean : ';
            var_dump($traitement_zip_clean);
            echo '<br>';

            echo 'traitement_zip_insert : ';
            var_dump($traitement_zip_insert);
            echo '<br><br>';
        }

        if( ($traitement_zip_getFile==true && $traitement_zip_extraction==false && $traitement_zip_read==false && $traitement_zip_clean==false) 
            || ($traitement_zip_getFile==true && $traitement_zip_extraction==false && $traitement_zip_read==true && $traitement_zip_clean==false)
            || ($traitement_zip_getFile==false && $traitement_zip_extraction==false && $traitement_zip_read==true && $traitement_zip_clean==false) ){
                
                if($debugPage==true){
                    echo "Quelque chose s'est mal passé lors de l'extraction du Zip. Merci de réessayé.".
                        "<br>Si le problème persiste, merci de recompresse votre dossier au format .Zip".
                        "<br><b style=\"colors:red;\">Attention, le renommage d'un fichier Zip n'est pas pris en compte et peut bloqué le bon traitement de celui-ci.</b>";
                }
        }

        if($csv!=NULL){
            //init
            $zip_lecon_Type_Insert_images_and_mots = 0;
            $zip_lecon_Type_Insert_sounds_and_images = 0;
            $zip_lecon_Type_Insert_sounds_and_mots = 0;
            $zip_lecon_Type_Insert_defs_and_mots = 0;
            //-
            if($debugPage==true){ echo '<br>'; var_dump($csv); echo '<br>'; }
            $zip_lecon_Name = $csv[0][1];
            $zip_lecon_Type = $csv[1][1];
            $zip_lecon_Type = intval($zip_lecon_Type);
            if($debugPage==true){ echo '<br>'; var_dump($zip_lecon_Type); echo '<br>'; }
            switch($zip_lecon_Type){
                //ImagesAndMots
                case 1 :
                    $zip_lecon_Type_Insert_images_and_mots++; break;
                //SoundsAndImages
                case 2 :
                    $zip_lecon_Type_Insert_sounds_and_images++; break;
                //SoundsAndMots
                case 3 :
                    $zip_lecon_Type_Insert_sounds_and_mots++; break;
                //DefsAndMots
                case 4 :
                    $zip_lecon_Type_Insert_defs_and_mots++; break;
            }
            //-
            if($debugPage==true){
                echo 'zip_lecon_Type_Insert_images_and_mots : '.$zip_lecon_Type_Insert_images_and_mots.'<br>';
                echo 'zip_lecon_Type_Insert_sounds_and_images : '.$zip_lecon_Type_Insert_sounds_and_images.'<br>';
                echo 'zip_lecon_Type_Insert_sounds_and_mots : '.$zip_lecon_Type_Insert_sounds_and_mots.'<br>';
                echo 'zip_lecon_Type_Insert_defs_and_mots : '.$zip_lecon_Type_Insert_defs_and_mots.'<br>';
            }

            $zip_lecon_Theme = $csv[2][1];
            $zip_lecon_AuteurLogin = $csv[3][1];
            $zip_lecon_Description = $csv[4][1];
            $zip_lecon_Statut = $csv[5][1];
            if($zip_lecon_Statut=='Ouvert'){ $zip_lecon_Statut = 1; } else { $zip_lecon_Statut = 0; }
            //-
            $zip_lecon_Element_1_Nom = $csv[6][1];
            $zip_lecon_Element_1_Image = $csv[7][1];
            $zip_lecon_Element_2_Nom = $csv[8][1];
            $zip_lecon_Element_2_Image = $csv[9][1];
            $zip_lecon_Element_3_Nom = $csv[10][1];
            $zip_lecon_Element_3_Image = $csv[11][1];
            $zip_lecon_Element_4_Nom = $csv[12][1];
            $zip_lecon_Element_4_Image = $csv[13][1];
            if($debugPage==true){
                echo '<br>';
                echo 'zip_lecon_Element_1_Nom : '.$zip_lecon_Element_1_Nom.'<br>';
                echo 'zip_lecon_Element_1_Image : '.$zip_lecon_Element_1_Image.'<br>';
                echo 'zip_lecon_Element_2_Nom : '.$zip_lecon_Element_2_Nom.'<br>';
                echo 'zip_lecon_Element_2_Image : '.$zip_lecon_Element_2_Image.'<br>';
                echo 'zip_lecon_Element_3_Nom : '.$zip_lecon_Element_3_Nom.'<br>';
                echo 'zip_lecon_Element_3_Image : '.$zip_lecon_Element_3_Image.'<br>';
                echo 'zip_lecon_Element_4_Nom : '.$zip_lecon_Element_4_Nom.'<br>';
                echo 'zip_lecon_Element_4_Image : '.$zip_lecon_Element_4_Image.'<br>';
            }


            //-
            $pathFolder = $_FILES['lecon_zip']['name'];
            $pathFolder = strstr($pathFolder, ".", true);
            $zip_link_image_1 = $pathFolder.'/'.$zip_lecon_Element_1_Image;
            $zip_link_image_2 = $pathFolder.'/'.$zip_lecon_Element_2_Image;
            $zip_link_image_3 = $pathFolder.'/'.$zip_lecon_Element_3_Image;
            $zip_link_image_4 = $pathFolder.'/'.$zip_lecon_Element_4_Image;
            $sql_insert_into_images_image_1 = 'INSERT INTO `images` (`link`, `date_create`, `date_update`) VALUES ('.$zip_link_image_1.', now(), now())';
            $sql_insert_into_images_image_2 = 'INSERT INTO `images` (`link`, `date_create`, `date_update`) VALUES ('.$zip_link_image_2.', now(), now())';
            $sql_insert_into_images_image_3 = 'INSERT INTO `images` (`link`, `date_create`, `date_update`) VALUES ('.$zip_link_image_3.', now(), now())';
            $sql_insert_into_images_image_4 = 'INSERT INTO `images` (`link`, `date_create`, `date_update`) VALUES ('.$zip_link_image_4.', now(), now())';
            if($debugPage==true){
                echo '<br>'.$sql_insert_into_images_image_1;
                echo '<br>'.$sql_insert_into_images_image_2;
                echo '<br>'.$sql_insert_into_images_image_3;
                echo '<br>'.$sql_insert_into_images_image_4;
            }
            //-
            $sql_insert_into_mots_mot_1 = 'INSERT INTO `mots` (`mots`, `date_create`, `date_update`) VALUES ('.$zip_lecon_Element_1_Nom.', now(), now())';
            $sql_insert_into_mots_mot_2 = 'INSERT INTO `mots` (`mots`, `date_create`, `date_update`) VALUES ('.$zip_lecon_Element_2_Nom.', now(), now())';
            $sql_insert_into_mots_mot_3 = 'INSERT INTO `mots` (`mots`, `date_create`, `date_update`) VALUES ('.$zip_lecon_Element_3_Nom.', now(), now())';
            $sql_insert_into_mots_mot_4 = 'INSERT INTO `mots` (`mots`, `date_create`, `date_update`) VALUES ('.$zip_lecon_Element_4_Nom.', now(), now())';
            if($debugPage==true){
                echo '<br>'.$sql_insert_into_mots_mot_1;
                echo '<br>'.$sql_insert_into_mots_mot_2;
                echo '<br>'.$sql_insert_into_mots_mot_3;
                echo '<br>'.$sql_insert_into_mots_mot_4;
            }
            //-
            $sql_insert_into_images_and_mots = 'INSERT INTO `images_and_mots`'.
                '(`id`, `id_image`, `id_mot`, `date_create`, `date_update`)'.
                ' VALUES '.
                '([value-1],[value-2],[value-3], now(), now())';
            //-
            $sql_insert_into_lecons = 'INSERT INTO `lecons`'.
                '(`id_theme`, `id_images_and_mots`, `id_sounds_and_images`, `id_sounds_and_mots`, `id_defs_and_mots`, `title`, `description`, `statut`, `date_create`, `date_update`)'.
                ' VALUES '.
                '(0,'.
                $zip_lecon_Type_Insert_images_and_mots.','.
                $zip_lecon_Type_Insert_sounds_and_images.','.
                $zip_lecon_Type_Insert_sounds_and_mots.','.
                $zip_lecon_Type_Insert_defs_and_mots.','.
                '"'.$zip_lecon_Name.'","'.
                '"'.$zip_lecon_Description.'",'.
                $zip_lecon_Statut.
                ',now(),now())';
            
            echo '<br>'.$sql_insert_into_lecons;
        }

        // SQL
        /*
        $sql = 'INSERT INTO `lecons`(`title`, `description`, `date_create`, `date_update`) VALUES ("'.$lecon_title.'", "'.$lecon_description.'",now(),now())';

        $result = $host->query($sql);

        // Create message
        $_SESSION['alert_typecolor'] = $alert_typecolor;
        $_SESSION['alert_message'] = $alert_message;

        // Back to Home page
        retunIndex('index');
        */
    }

    //- Action after click button for export lecon in zip
    if( isset($_POST['submit_export_lecon']) ){
        // update_lecon_id
        if( isset($_POST['update_lecon_id']) && ($_POST['update_lecon_id']!='') ){ $export_lecon_id = $_POST['update_lecon_id']; } else { $export_lecon_id = 'NULL'; }
    
        if($export_lecon_id!=NULL){
            echo 'Leçon à exporté ['.$export_lecon_id.']';
        } else { echo 'Id de la leçon non trouvé pour l\'export. '; }
    }

    //-
    if( isset($_GET['id']) && isset($_GET['update']) && $_GET['update']==true){
        header('location:home.php?idlecon='.$_GET['id'].'&update='.$_GET['update'].'');
    }

    //- Action after click button for update lecon
    if( isset($_POST['submit_update_lecon'])){

        // Create var nessary
        $alert_typecolor = 'success';
        $alert_message = 'La leçon a bien été mise à jour.';

        // lecon_title
        if( isset($_POST['update_lecon_title']) && ($_POST['update_lecon_title']!='') ){ $lecon_title = $_POST['update_lecon_title']; } else { $lecon_title = 'NULL'; }
        // lecon_description
        if( isset($_POST['update_lecon_description']) && ($_POST['update_lecon_description']!='') ){ $lecon_description = $_POST['update_lecon_description']; } else { $lecon_description = 'NULL'; }
        // lecon_statut
        if( isset($_POST['update_lecon_statut']) && ($_POST['update_lecon_statut']=='on') ){ $lecon_statut = 1; } else { $lecon_statut = 0; }
        
        // SQL
        $sql = 'UPDATE `lecons` SET `title`="'.$lecon_title.'",`description`="'.$lecon_description.'", `statut`='.$lecon_statut.', `date_update`=now() WHERE `id`="'.$_POST['update_lecon_id'].'"';
        
        $result = $host->query($sql);

        // Create message
        $_SESSION['alert_typecolor'] = $alert_typecolor;
        $_SESSION['alert_message'] = $alert_message;

        // Back to Home page
        retunIndex('lecons');
    }

    //- Action after click button for update theme
    if( isset($_POST['submit_update_theme'])){

        // Create var nessary
        $alert_typecolor = 'success';
        $alert_message = 'La thèmes a bien été mise à jour.';

        // theme_title
        if( isset($_POST['update_theme_title']) && ($_POST['update_theme_title']!='') ){ $theme_title = $_POST['update_theme_title']; } else { $theme_title = 'NULL'; }
        // theme_description
        if( isset($_POST['update_theme_description']) && ($_POST['update_theme_description']!='') ){ $theme_description = $_POST['update_theme_description']; } else { $theme_description = 'NULL'; }
        
        // SQL
        $sql = 'UPDATE `themes` SET `title`="'.$theme_title.'",`description`="'.$theme_description.'",`date_update`=now() WHERE `id`="'.$_POST['update_theme_id'].'"';
        
        $result = $host->query($sql);

        // Create message
        $_SESSION['alert_typecolor'] = $alert_typecolor;
        $_SESSION['alert_message'] = $alert_message;

        // Back to Home page
        retunIndex('themes');
    }

    //- Action after click button for update user
    if( isset($_POST['submit_update_user'])){

        // Create var nessary
        $alert_typecolor = 'success';
        $alert_message = 'L\'utilisateur a bien été mise à jour.';

        // user_firstname
        if( isset($_POST['update_user_firstname']) && ($_POST['update_user_firstname']!='') ){ $user_firstname = $_POST['update_user_firstname']; } else { $user_firstname = 'NULL'; }
        // user_lastname
        if( isset($_POST['update_user_lastname']) && ($_POST['update_user_lastname']!='') ){ $user_lastname = $_POST['update_user_lastname']; } else { $user_lastname = 'NULL'; }
        // user_pseudo
        if( isset($_POST['update_user_pseudo']) && ($_POST['update_user_pseudo']!='') ){ $user_pseudo = $_POST['update_user_pseudo']; } else { $user_pseudo = 'NULL'; }
        // user_mail
        if( isset($_POST['update_user_mail']) && ($_POST['update_user_mail']!='') ){ $user_mail = $_POST['update_user_mail']; } else { $user_mail = 'NULL'; }
        
        // SQL
        $sql = 'UPDATE `users` SET `first_name`="'.$user_firstname.'",`last_name`="'.$user_lastname.'",`pseudo`="'.$user_pseudo.'",`mail`="'.$user_mail.'",`date_update`=now() WHERE `id`="'.$_POST['update_user_id'].'"';
        
        $result = $host->query($sql);

        // Create message
        $_SESSION['alert_typecolor'] = $alert_typecolor;
        $_SESSION['alert_message'] = $alert_message;

        // Back to Home page
        retunIndex('users');
    }

    //- Action after click button for open lecon
    if( isset($_POST['submit_open_lecon'])){
        // Create var nessary
        $alert_typecolor = 'success';
        $alert_message = 'La leçon a bien été ouverte.';
        
        // SQL
        $sql = 'UPDATE `lecons` SET `statut`=1 WHERE `id`="'.$_POST['update_lecon_id'].'"';
        
        $result = $host->query($sql);

        // Create message
        $_SESSION['alert_typecolor'] = $alert_typecolor;
        $_SESSION['alert_message'] = $alert_message;

        // Back to Home page
        retunIndex('lecons');
    }

    //- Action after click button for close lecon
    if( isset($_POST['submit_close_lecon'])){
        // Create var nessary
        $alert_typecolor = 'success';
        $alert_message = 'La leçon a bien été fermé.';

        // Create message
        $_SESSION['alert_typecolor'] = $alert_typecolor;
        $_SESSION['alert_message'] = $alert_message;

        // Back to Home page
        retunIndex('lecons');
    }

    //- Action after click button for close theme
    if( isset($_POST['submit_close_theme'])){
        // Create var nessary
        $alert_typecolor = 'success';
        $alert_message = 'Le thème a bien été fermé.';

        // Create message
        $_SESSION['alert_typecolor'] = $alert_typecolor;
        $_SESSION['alert_message'] = $alert_message;

        // Back to Home page
        retunIndex('themes');
    }

    //- Action after click button for close user
    if( isset($_POST['submit_close_user'])){
        // Create var nessary
        $alert_typecolor = 'success';
        $alert_message = 'L\'utilisateur a bien été fermé.';

        // Create message
        $_SESSION['alert_typecolor'] = $alert_typecolor;
        $_SESSION['alert_message'] = $alert_message;

        // Back to Home page
        retunIndex('users');
    }

    //- Action after click button for delete lecon
    if( isset($_GET['lecon_id']) && isset($_GET['delete']) && $_GET['delete']==true){

        // Create var nessary
        $alert_typecolor = 'success';
        $alert_message = 'La leçon a bien été supprimé.';

        // SQL
        $sql = 'DELETE FROM `lecons` WHERE `id`='.$_GET['lecon_id'].'';
        
        $result = $host->query($sql);

        // Create message
        $_SESSION['alert_typecolor'] = $alert_typecolor;
        $_SESSION['alert_message'] = $alert_message;

        // Back to Home page
        retunIndex('lecons');
    }

    //- Action after click button for delete theme
    if( isset($_GET['theme_id']) && isset($_GET['delete']) && $_GET['delete']==true){

        // Create var nessary
        $alert_typecolor = 'success';
        $alert_message = 'Le thème a bien été supprimé.';

        // SQL
        $sql = 'DELETE FROM `themes` WHERE `id`='.$_GET['theme_id'].''; echo $sql;
        
        $result = $host->query($sql);

        // Create message
        $_SESSION['alert_typecolor'] = $alert_typecolor;
        $_SESSION['alert_message'] = $alert_message;

        // Back to Home page
        retunIndex('themes');
    }

    //- Action after click button for delete user
    if( isset($_GET['user_id']) && isset($_GET['delete']) && $_GET['delete']==true){

        // Create var nessary
        $alert_typecolor = 'success';
        $alert_message = 'L\'utilisateur a bien été supprimé.';

        // SQL
        $sql = 'DELETE FROM `users` WHERE `id`='.$_GET['user_id'].''; echo $sql;
        
        $result = $host->query($sql);

        // Create message
        $_SESSION['alert_typecolor'] = $alert_typecolor;
        $_SESSION['alert_message'] = $alert_message;

        // Back to Home page
        retunIndex('users');
    }
?>