<?php
    function extrator($file_path, $file_destination){
        require_once 'Extractor.class.php';
        $extractor = new Extractor;
        
        $archivepath = $file_path;
        
        $destination = $file_destination;
        
        $extract = $extractor -> extract($archivepath, $destination);
        
        if ($extract) {
            echo 'extracted <br>';
            //echo $GLOBALS['status']['success'];
        }
        else{
            echo 'error <br>';
            //echo $GLOBALS['status']['error'];
        }
    }
?>