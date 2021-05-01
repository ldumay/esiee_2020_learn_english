<?php
    // source : https://www.php.net/manual/en/ziparchive.open.php

    /**
     * Open and extract
     */
    function fileZipOpenAndExtract($file, $debug){
        $zipCore = new ZipArchive;

        $source = "uploads";
        $destitation = "shares_unzip";

        if($debug==true){
            echo '[UnZip]<br>';
            echo 'Destinattion zip : '.$destitation.'<br><br>';
        }

        $file_full_name = $file['name'];
        $file_name = strstr($file_full_name, ".", true);
        $file_extension = strstr($file_full_name, ".");
        $file_type = $file['type'];
        $file_size = $file['size'];
        $file_tmp_name = $file['tmp_name'];
        $file_destination = $source.'/'.$file_full_name;
        $file_source = $source.'/'.$file_full_name;

        if($debug==true){
            echo 'Vérification : <br>'.
            '<br>'.
            '0 - file_full_name : '.$file_full_name.'<br>'.
            '1 - file_name : '.$file_name.'<br>'.
            '2 - file_extension : '.$file_extension.'<br>'.
            '3 - file_type : '.$file_type.'<br>'.
            '4 - file_size : '.$file_size.' octets<br>'.
            '5 - file_tmp_name : '.$file_tmp_name.'<br>'.
            '6 - file_destination : '.$file_destination.'<br>'.
            '<br>';
            echo 'File to unzip : '.$file_full_name.'<br>';
            echo 'Source : '.$file_source.'<br>';
        }

        //Checking file in destination before extraction
        $isAlreadyExistingFileExtract = false;
        $dir = opendir($destitation);
        while($file = readdir($dir)){
            if($debug==true){ echo 'File / File full name |=> '.$file.' / '.$file_name.'<br>'; }
            if($file==$file_name){
                $isAlreadyExistingFileExtract = true;
            }
        }
        
        if($debug==true){
            echo 'isAlreadyExistingFileExtract : ';
            echo var_dump($isAlreadyExistingFileExtract);
            echo '<br><br>';
        }

        //-
        $result = "";
        //-
        if( $isAlreadyExistingFileExtract == false ){
        
            $file_opened = $zipCore->open($file_source);
            //$file_opened = $zipCore->open($file_full_name, ZIPARCHIVE::OVERWRITE);
            //$file_opened = $zipCore->open($file_full_name, ZIPARCHIVE::CREATE);
            //$file_opened = $zipCore->open($file_full_name, ZIPARCHIVE::OVERWRITE | ZIPARCHIVE::CREATE);
            if($debug==true){
                echo '<br> File opened : ';
                var_dump($file_opened);
            }

            if ($file_opened == TRUE) {
                if( ($zipCore->extractTo($destitation) == true) ){
                    $zipCore->close();
                    $result = 'Zip opened.';
                    if($debug==true){ echo $result.'<br>'; } else { return $result; }
                } else {
                    $result = 'Zip extract error.';
                    if($debug==true){ echo $result; } else { return $result; }
                }
            } else {
                $result = 'Zip failed, code : ' . $file_opened.' .<br>';
                if($debug==true){ echo $result; } else { return $result; }
            }

        } else { $result = 'Erreur d\'extraction ! Ce dossier esiste déjà.'; }
        if($debug==true){ echo $result; } else { return $result; }
    }

    /**
     * Create an archive
     */
    function fileZipCreateArchive($zip){
        $res = $zip->open('test.zip', ZipArchive::CREATE);
        if ($res === TRUE) {
            $zip->addFromString('test.txt', 'file content goes here');
            $zip->addFile('data.txt', 'entryname.txt');
            $zip->close();
            echo 'ok';
        } else {
            echo 'failed';
        }
    }
?>