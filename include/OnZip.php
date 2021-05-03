<?php
    function getCSVOnZip($file, $debug){
        
        $source = "shares_unzip";
        $file_csv = "_elementsList.csv";

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
        $file_source_path = $source.'/'.$file_name;
        $file_source_file = $source.'/'.$file_name.'/'.$file_csv;

        //Checking file in destination before extraction
        $isAlreadyExistingFileCSV = false;
        $dir = opendir($file_source_path);
        while($file = readdir($dir)){
            if($debug==true){ echo 'File / File full name |=> '.$file.' / '.$file_csv.'<br>'; }
            if($file==$file_csv){
                $isAlreadyExistingFileCSV = true;
            }
        }
        closedir($dir);

        if($isAlreadyExistingFileCSV==true){

            if($debug==true){
                echo '<br>Vérification : <br>'.
                '<br>'.
                '0 - file_full_name : '.$file_full_name.'<br>'.
                '1 - file_name : '.$file_name.'<br>'.
                '2 - file_extension : '.$file_extension.'<br>'.
                '3 - file_type : '.$file_type.'<br>'.
                '4 - file_size : '.$file_size.' octets<br>'.
                '5 - file_tmp_name : '.$file_tmp_name.'<br>'.
                '<br>'.
                'File to unzip : '.$file_name.'<br>'.
                'Source : '.$file_source_file.'<br>'.
                'isAlreadyExistingFileCSV : ';
                var_dump($isAlreadyExistingFileCSV);
                echo '<br>';
            }

            if (($handle = fopen($file_source_file, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $num = count($data);
                    for ($c=0; $c < $num; $c++) {
                        if($debug==true){ echo $data[$c] . "<br />\n"; }
                        $datas[] = $data[$c];
                    }
                }
                fclose($handle);
            }

            /*
            $myfile = fopen($file_source_file, "r") or die("Unable to open file!");
            $datas = fgetcsv($myfile, 1000, ",");
            //$datas = explode("\n", fread($myfile, filesize($file_source_file)));
            fclose($myfile);
            */

            $element = [];
            if($debug==true){
                echo '<br>';
                var_dump($datas);

                echo '<br><br>';
            }
            foreach($datas as $data){
                if($debug==true){ echo $data.'<br>'; }
                $elements[] = explode(';', $data);
            }
            if($debug==true){
                echo '<br>';
                var_dump($elements);

                echo '<br><br>';
                foreach($elements as $element){
                    echo $element[0].' : '.$element[1].'<br>';
                }
            }
            
            if($debug==true){
                echo '<br>Tableau de trie trouvé.<br><br>';
                var_dump($elements);
                echo '<br><br>';
                return $elements;
            } else { return $elements; }
        
        } else {
            if($debug==true){
                echo '<br>Tableau de trie non trouvé.<br><br>';
                echo 'failed "'.$file_csv.'"<br><br>';
                return 'failed "'.$file_csv.'"';
            } else { return 'failed "'.$file_csv.'"'; }
    }
        
    }
?>