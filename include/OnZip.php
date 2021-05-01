<?php
    function getCSVOnZip($file, $debug){
        
        $source = "shares_unzip";
        $pathFileCSV = "_elementsList.csv";

        if($debug==true){
            echo '[Read csv on zip]<br>';
            echo 'Source zip : '.$source.'<br><br>';
        }

        $file_full_name = $file['name'];
        $file_name = strstr($file_full_name, ".", true);
        $file_extension = strstr($file_full_name, ".");
        $file_type = $file['type'];
        $file_size = $file['size'];
        $file_tmp_name = $file['tmp_name'];
        $file_source = $source.'/'.$file_name.'/'.$pathFileCSV;

        if($debug==true){
            echo 'Vérification : <br>'.
            '<br>'.
            '0 - file_full_name : '.$file_full_name.'<br>'.
            '1 - file_name : '.$file_name.'<br>'.
            '2 - file_extension : '.$file_extension.'<br>'.
            '3 - file_type : '.$file_type.'<br>'.
            '4 - file_size : '.$file_size.' octets<br>'.
            '5 - file_tmp_name : '.$file_tmp_name.'<br>'.
            '<br>';
            echo 'File to unzip : '.$file_name.'<br>';
            echo 'Source : '.$file_source.'<br>';
        }

        $myfile = fopen($file_source, "r") or die("Unable to open file!");
        $datas = explode("\n", fread($myfile, filesize($file_source)));
        fclose($myfile);

        $element = [];
        if($debug==true){
            echo '<br>';
            var_dump($datas);

            echo '<br><br>';
            foreach($datas as $data){
                echo $data.'<br>';
                $elements[] = explode(';', $data);
            }

            echo '<br>';
            var_dump($elements);

            echo '<br><br>';
            foreach($elements as $element){
                echo $element[0].' : '.$element[1].'<br>';
            }
        }

        return "En cours";
        
    }
?>