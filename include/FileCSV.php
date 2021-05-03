<?php
    function fileCSV($zip_folder_name,$csv,$debugPage,$debugPageFunctions,$host){
        $leconIsExist = false;

        $result_requete_part_1 = false;
        $result_requete_part_2 = false;
        $result_requete_part_3 = false;
        $result_requete_part_4 = false;
        $result_requete_part_5 = false;

        if($debugPage==true){
            echo '<hr><h3>Insert in BDD</h3>';
            echo '<br>zip_folder_name : '.$zip_folder_name;
        }
        //init
        $zip_lecon_Type_Insert_images_and_mots = 0;
        $zip_lecon_Type_Insert_sounds_and_images = 0;
        $zip_lecon_Type_Insert_sounds_and_mots = 0;
        $zip_lecon_Type_Insert_defs_and_mots = 0;
        //-
        if($debugPage==true){ echo '<br>'; var_dump($csv); echo '<br>'; }
        $zip_lecon_Name = $csv[0][1];

        //-Check doublon
        $sql_getLeconLogin = 'SELECT `title` FROM `lecons` WHERE `title` LIKE "%'.$zip_lecon_Name.'%"';
        if($debugPage==true){ echo '<br>'.$sql_getLeconLogin.'<br>'; }
        $result_sql = $host->query($sql_getLeconLogin);
        while ( $row = $result_sql->fetch() ){
            $lecon_title = $row['title'];
            if($zip_lecon_Name==$lecon_title){ $leconIsExist = true; }
        }

        if($leconIsExist==false){

            $zip_lecon_Type = $csv[1][1];
            $zip_lecon_Type = intval($zip_lecon_Type);
            if($debugPage==true){ echo '<br>'; var_dump($zip_lecon_Type); echo '<br>'; }
            switch($zip_lecon_Type){
                //ImagesAndMots
                case 'ImagesAndMots' :
                    $zip_lecon_Type_Insert_images_and_mots++; break;
                //SoundsAndImages
                case 'SoundsAndImages' :
                    $zip_lecon_Type_Insert_sounds_and_images++; break;
                //SoundsAndMots
                case 'SoundsAndMots' :
                    $zip_lecon_Type_Insert_sounds_and_mots++; break;
                //DefsAndMots
                case 'DefsAndMots' :
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
            //-Check thème
            $sql_getLeconTheme = 'SELECT `id`,`title` FROM `themes` WHERE `title` LIKE "%'.$zip_lecon_Theme.'%"';
            if($debugPage==true){ echo '<br>'.$sql_getLeconTheme.'<br>'; }
            $result_sql = $host->query($sql_getLeconTheme);
            while ( $row = $result_sql->fetch() ){
                $lecon_theme_id = $row['id'];
                $lecon_theme_title = $row['title'];
            }
            if($debugPage==true){ echo "themeId : ".$lecon_theme_id.'<br>'; }
            //-Check login
            $sql_getLeconLogin = 'SELECT `id`,`pseudo` FROM `users` WHERE `pseudo` LIKE "%'.$zip_lecon_AuteurLogin.'%"';
            if($debugPage==true){ echo '<br>'.$sql_getLeconLogin.'<br>'; }
            $result_sql = $host->query($sql_getLeconLogin);
            while ( $row = $result_sql->fetch() ){
                $lecon_login_id = $row['id'];
                $lecon_login_pseudo = $row['pseudo'];
            }
            if($debugPage==true){
                echo "loginId : ".$lecon_login_id.'<br>';
                echo "loginPseudo : ".$lecon_login_pseudo.'<br>';
            }

            //ImagesAndMots
            if($zip_lecon_Type_Insert_images_and_mots>0){
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
                    echo 'zip_lecon_Theme : ['.$zip_lecon_Theme.'] - '.$lecon_theme_title.'<br>';
                    echo 'zip_lecon_AuteurLogin : ['.$lecon_login_id.'] - '.$lecon_login_pseudo.'<br>';
                    echo 'zip_lecon_Description : '.$zip_lecon_Description.'<br>';
                    echo 'zip_lecon_Statut : '.$zip_lecon_Statut.'<br>';
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

                //-Insert lecon
                $sql_insert_into_lecons = 'INSERT INTO `lecons`'.
                    '(`id_theme`, `title`, `description`, `folder`, `statut`, `date_create`, `date_update`)'.
                    ' VALUES '.
                    '('.
                    $lecon_theme_id.','.
                    '"'.$zip_lecon_Name.'",'.
                    '"'.$zip_lecon_Description.'",'.
                    '"'.$zip_folder_name.'",'.
                    $zip_lecon_Statut.
                    ',now(),now());';
                if($debugPage==true){ echo '<br>'.$sql_insert_into_lecons.'<br>'; }
                
                if($debugPage==false){
                    try{
                        $result = $host->query($sql_insert_into_lecons);
                        $result_requete_part_1 = true;
                    }catch(Exception $e){ echo $e; }
                }
                
                //-Get ID this lecon
                $lecon_Id = 0;
                
                if($debugPage==true){
                    echo '<br>';
                    echo 'zip_lecon_Name : '.$zip_lecon_Name.'<br>';
                    var_dump($zip_lecon_Name);
                    echo '<br>';
                }

                $sql = 'SELECT `id`,`title`,`statut` FROM lecons WHERE `title` LIKE "%'.$zip_lecon_Name.'%" AND `statut`="'.$zip_lecon_Statut.'"';
                if($debugPage==true){ echo '<br>'.$sql.'<br>'; }
                $result_sql = $host->query($sql);
                while ( $row = $result_sql->fetch() ){
                    $id = $row['id'];
                    $title = $row['title'];
                    $lecon_Id = $id;
                }

                if($debugPage==true){
                    echo "<br>leconId : ".$lecon_Id.'<br>';
                }
                
                //-
                $pathFolder = $_FILES['lecon_zip']['name'];
                $pathFolder = strstr($pathFolder, ".", true);
                $zip_link_image_1 = $pathFolder.'/'.$zip_lecon_Element_1_Image;
                $zip_link_image_2 = $pathFolder.'/'.$zip_lecon_Element_2_Image;
                $zip_link_image_3 = $pathFolder.'/'.$zip_lecon_Element_3_Image;
                $zip_link_image_4 = $pathFolder.'/'.$zip_lecon_Element_4_Image;
                $sql_insert_into_images_image_1 = 'INSERT INTO `images` (`id_lecon`, `link`, `date_create`, `date_update`) VALUES ('.$lecon_Id.',"'.$zip_link_image_1.'", now(), now());';
                $sql_insert_into_images_image_2 = 'INSERT INTO `images` (`id_lecon`, `link`, `date_create`, `date_update`) VALUES ('.$lecon_Id.',"'.$zip_link_image_2.'", now(), now());';
                $sql_insert_into_images_image_3 = 'INSERT INTO `images` (`id_lecon`, `link`, `date_create`, `date_update`) VALUES ('.$lecon_Id.',"'.$zip_link_image_3.'", now(), now());';
                $sql_insert_into_images_image_4 = 'INSERT INTO `images` (`id_lecon`, `link`, `date_create`, `date_update`) VALUES ('.$lecon_Id.',"'.$zip_link_image_4.'", now(), now());';
                if($debugPage==true){
                    echo '<br>'.$sql_insert_into_images_image_1;
                    echo '<br>'.$sql_insert_into_images_image_2;
                    echo '<br>'.$sql_insert_into_images_image_3;
                    echo '<br>'.$sql_insert_into_images_image_4;
                }
                if($debugPage==false){
                    try{
                        $result = $host->query($sql_insert_into_images_image_1);
                        $result = $host->query($sql_insert_into_images_image_2);
                        $result = $host->query($sql_insert_into_images_image_3);
                        $result = $host->query($sql_insert_into_images_image_4);
                        $result_requete_part_2 = true;
                    }catch(Exception $e){ echo $e; }
                }

                //-
                $sql_insert_into_mots_mot_1 = 'INSERT INTO `mots` (`id_lecon`, `mot`, `date_create`, `date_update`) VALUES ('.$lecon_Id.',"'.$zip_lecon_Element_1_Nom.'", now(), now());';
                $sql_insert_into_mots_mot_2 = 'INSERT INTO `mots` (`id_lecon`, `mot`, `date_create`, `date_update`) VALUES ('.$lecon_Id.',"'.$zip_lecon_Element_2_Nom.'", now(), now());';
                $sql_insert_into_mots_mot_3 = 'INSERT INTO `mots` (`id_lecon`, `mot`, `date_create`, `date_update`) VALUES ('.$lecon_Id.',"'.$zip_lecon_Element_3_Nom.'", now(), now());';
                $sql_insert_into_mots_mot_4 = 'INSERT INTO `mots` (`id_lecon`, `mot`, `date_create`, `date_update`) VALUES ('.$lecon_Id.',"'.$zip_lecon_Element_4_Nom.'", now(), now());';
                if($debugPage==true){
                    echo '<br>';
                    echo '<br>'.$sql_insert_into_mots_mot_1;
                    echo '<br>'.$sql_insert_into_mots_mot_2;
                    echo '<br>'.$sql_insert_into_mots_mot_3;
                    echo '<br>'.$sql_insert_into_mots_mot_4;
                }
                if($debugPage==false){
                    try{
                        $result = $host->query($sql_insert_into_mots_mot_1);
                        $result = $host->query($sql_insert_into_mots_mot_2);
                        $result = $host->query($sql_insert_into_mots_mot_3);
                        $result = $host->query($sql_insert_into_mots_mot_4);
                        $result_requete_part_3 = true;
                    }catch(Exception $e){ echo $e; }
                }

                //-
                $imagesIdList = null;
                $sql_images = 'SELECT id FROM `images` WHERE `id_lecon`='.$lecon_Id.';';
                if($debugPage==true){ echo '<br><br>'.$sql_images; }
                $result_sql = $host->query($sql_images);
                while ( $row = $result_sql->fetch() ){
                    $imagesIdList[] = $row['id'];
                }
                if($debugPage==true){
                    echo '<br><br>';
                    var_dump($imagesIdList);
                    echo '<br>';
                }
                //-
                $motsIdList = null;
                $sql_mots = 'SELECT id FROM `mots` WHERE `id_lecon`='.$lecon_Id.';';
                if($debugPage==true){ echo '<br><br>'.$sql_mots; }
                $result_sql = $host->query($sql_mots);
                while ( $row = $result_sql->fetch() ){
                    $motsIdList[] = $row['id'];
                }
                if($debugPage==true){
                    echo '<br><br>';
                    var_dump($motsIdList);
                    echo '<br>';
                }

                //-
                $sql_into_i_and_m_start = 'INSERT INTO `images_and_mots` (`id_lecon`, `id_image`, `id_mot`, `date_create`, `date_update`) VALUES ';
                
                $sql_into_i_and_m_values_A = '('.$lecon_Id.','.$imagesIdList[0].','.$motsIdList[0].',';
                $sql_into_i_and_m_values_B = '('.$lecon_Id.','.$imagesIdList[1].','.$motsIdList[1].',';
                $sql_into_i_and_m_values_C = '('.$lecon_Id.','.$imagesIdList[2].','.$motsIdList[2].',';
                $sql_into_i_and_m_values_D = '('.$lecon_Id.','.$imagesIdList[3].','.$motsIdList[3].',';
                
                $sql_into_i_and_m_end = ' now(), now());';

                $sql_into_ready_A = $sql_into_i_and_m_start.$sql_into_i_and_m_values_A.$sql_into_i_and_m_end;
                $sql_into_ready_B = $sql_into_i_and_m_start.$sql_into_i_and_m_values_B.$sql_into_i_and_m_end;
                $sql_into_ready_C = $sql_into_i_and_m_start.$sql_into_i_and_m_values_C.$sql_into_i_and_m_end;
                $sql_into_ready_D = $sql_into_i_and_m_start.$sql_into_i_and_m_values_D.$sql_into_i_and_m_end;

                if($debugPage==true){
                    echo '<br>sql_into_i_and_m__start : '.$sql_into_i_and_m_start.'<br>';
                    echo 'sql_into_i_and_m_values_A : '.$sql_into_i_and_m_values_A.'<br>';
                    echo 'sql_into_i_and_m_values_B : '.$sql_into_i_and_m_values_B.'<br>';
                    echo 'sql_into_i_and_m_values_C : '.$sql_into_i_and_m_values_C.'<br>';
                    echo 'sql_into_i_and_m_values_D : '.$sql_into_i_and_m_values_D.'<br>';
                    echo 'sql_into_i_and_m_end : '.$sql_into_i_and_m_end.'<br>';
                    echo '<br>';
                    echo $sql_into_ready_A.'<br>';
                    echo $sql_into_ready_B.'<br>';
                    echo $sql_into_ready_C.'<br>';
                    echo $sql_into_ready_D.'<br>';
                }
                if($debugPage==false){
                    try{
                        $result = $host->query($sql_into_ready_A);
                        $result = $host->query($sql_into_ready_B);
                        $result = $host->query($sql_into_ready_C);
                        $result = $host->query($sql_into_ready_D);
                        $result_requete_part_4 = true;
                    }catch(Exception $e){ echo $e; }
                }

                //-
                $motsIdList = null;
                $sql_mots = 'SELECT id FROM `mots` WHERE `id_lecon`='.$lecon_Id.';';
                if($debugPage==true){ echo '<br>'.$sql_mots.'<br>'; }
                $result_sql = $host->query($sql_mots);
                while ( $row = $result_sql->fetch() ){
                    $lecon_Id_images_and_mots_collection[] = $row['id'];
                }
                $x = 1;
                $Id_images_and_mots_collection = '';
                foreach($lecon_Id_images_and_mots_collection as $collection){
                    $total_elements = count($lecon_Id_images_and_mots_collection);
                    if($x<$total_elements){
                        $Id_images_and_mots_collection .= $collection.',';
                    } else { $Id_images_and_mots_collection .= $collection; }
                    $x++;
                }
                if($debugPage==true){ echo 'Id_images_and_mots_collection : '.$Id_images_and_mots_collection.'<br>'; }
                $sql_update_lecons = 'UPDATE `lecons` SET `collection_id_images_and_mots`="'.$Id_images_and_mots_collection.'", `date_update`=now() WHERE `id`='.$lecon_Id.';';
                if($debugPage==true){
                    echo $sql_update_lecons.'<br>';
                }
                if($debugPage==false){
                    try{
                        $result = $host->query($sql_update_lecons);
                        $result_requete_part_5 = true;
                    }catch(Exception $e){ echo $e; }
                }
            }

            if($result_requete_part_1==true && $result_requete_part_2==true && $result_requete_part_3==true 
                && $result_requete_part_4==true && $result_requete_part_5==true){
                if($debugPage==true){
                    echo "<hr><h3> Import réussi.</h3>";
                    return true;
                } else { return true; }
            } else {
                if($debugPage==true){
                    echo "<hr><h3> Echec pendant l'import.</h3>";
                    return false;
                } else { return false; }
            }
        
        } else {
            if($debugPage==true){
                echo "<hr><h3> Cette leçon existe déjà.</h3>";
                return 'existing';
            } else { return 'existing'; }
        }
    }
?>