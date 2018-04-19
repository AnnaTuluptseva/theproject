    <div id="lang_line">
        <form method="GET">
        <center>
        <?        
            for($i=0;$i<count($languages);$i++){
                /*echo '<option class ="option" value = "choose_language" '.(!$sort?'':'SELECTED').'>Choose language</option>'.$CRLF;*/
                $chosen_lang = $languages[$i]["lang"];
                echo '<a class ="lang_a" name="'.$languages[$i]["lang"].'" name="'.$languages[$i]["lang"].'" href="index.php?lang='.$languages[$i]["lang"].'">'.$languages[$i]["language"].'</a>';
            }

        ?>
        </center>
        </form>
    </div>