<?php
    function fileGetZip($file, $debug){
        // Debug checking var $_FILES uploaded
        //var_dump($_FILES);

        $pathdir = "uploads";

        // Max size file uploaded
        $maxsize = 500000000; // 500Mo = 500 000 000 octets - This var size is posted in "octet".
        // Check extension file uploaded
        //$extensions_avaible = array('.pdf','.PDF');
        $extensions_avaible = array('.zip','.ZIP');

        // Check informations data in file_ uploaded

        $file_full_name = $file['name'];
        $file_name = strstr($file_full_name, ".", true);
        $file_extension = strstr($file_full_name, ".");
        $file_type = $file['type'];
        $file_size = $file['size'];
        $file_tmp_name = $file['tmp_name'];
        $file_destination = $pathdir.'/'.$file_full_name;

        if($debug==true){
            echo 'Vérification : <br>'.
            'maxsize : '.$maxsize.' octects<br>'.
            '<br>'.
            '0 - file_full_name : '.$file_full_name.'<br>'.
            '1 - file_name : '.$file_name.'<br>'.
            '2 - file_extension : '.$file_extension.'<br>'.
            '3 - file_type : '.$file_type.'<br>'.
            '4 - file_size : '.$file_size.' octets<br>'.
            '5 - file_tmp_name : '.$file_tmp_name.'<br>'.
            '6 - file_destination : '.$file_destination.'<br>'.
            '<br>';
        }
        //-
        $result;
        //-
        if( (in_array($file_extension, $extensions_avaible)) && ($file_size<$maxsize) ){
            // Checking files in dirpath and upload file if not exist in dirpath
            $isAlreadyExistingFile = false;
            $dir = opendir($pathdir);
            while($file = readdir($dir)){
                if($file==$file_full_name){
                    $isAlreadyExistingFile = true;
                }
            }
            //-
            if($debug==true){
                echo 'isAlreadyExistingFile : ';
                echo var_dump($isAlreadyExistingFile);
                echo '<br><br>';
            }
            //-
            if( ($isAlreadyExistingFile == false) && (move_uploaded_file($file_tmp_name,$file_destination)) ){
                $result = "Enregistrement du zip OK.";
                if($debug==true){
                    echo $result;
                    return $result;
                } else { return $result; }
            } else if($isAlreadyExistingFile==true){
                $result = "Erreur transfert ! Ce zip esiste déjà.";
                if($debug==true){
                    echo $result;
                    return $result;
                } else { return $result; }
            }else{
                $result = "Erreur transfert ! Trop lourd ou non zip.";
                if($debug==true){
                    echo $result;
                    return $result;
                } else { return $result; }
            }
        }else{
            $result = "Trop lourd ou non zip.";
            if($debug==true){
                echo $result;
                return $result;
            } else { return $result; }
        }
    }
?>