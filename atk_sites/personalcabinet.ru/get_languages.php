<?php
    $languages = getLanguages();
    $words = getWords($_GET["lang"]); 
    $terms;
    for($i = 0; $i < count($words); $i++){
        $terms[$words[$i]["term"]]= $words[$i]["translation"];
    } 
    $chosen_lang = $_GET["lang"]; 

?>