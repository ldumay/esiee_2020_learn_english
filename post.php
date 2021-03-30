<?php
    include('init.php');

    // Create necessary var and functions
    function retunIndex($selected){ 
        if($selected=='index') // If this connection avaible
            header('location:home.php');
        else if($selected=='auth') // If this connection not avaible
            header('location:auth.php');
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

    // Action after click button for add update user
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
?>