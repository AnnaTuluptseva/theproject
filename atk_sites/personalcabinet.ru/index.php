<?php
    phpinfo();
    require_once('functions.php');
    require_once('get_languages.php');  
    
?>
<!DOCTYPE html>
<html>
  <head>
    <?php
    
    
    /*print_r($languages);*/
    /*for($i=0;$i<count($languages);$i++){
                print_r($i +"    ");
                print_r($languages[$i][lang]);
            }*/
    ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Первая страница</title>

    <!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">-->
    <link rel="stylesheet" type="text/css" href="styles.css" media="all">
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->

    
  </head>
  <body>
    
    <div id="fist_ch">
    	<div id="ch_language">
        <form method="GET">
        <center><label for="languages">Language</label>
        <select name="languages" class="tab-group" id="languages" onchange="window.location='index.php?lang='+this.value">
            <option value="" disabled selected style='display:none;'>Choose language</option>
            <?              
            for($i=0;$i<count($languages);$i++){
                /*echo '<option class ="option" value = "choose_language" '.(!$sort?'':'SELECTED').'>Choose language</option>'.$CRLF;*/
                echo '<option class ="option" value = "'.$languages[$i]["lang"].'" id="'.$languages[$i]["lang"].'" name="'.$languages[$i]["lang"].'" >'.$languages[$i]["language"].'</option>';
            }

            ?>
            <!--<option id="eng">English</option>
            <option id="rus">Русский</option>  -->    
              
        </select></center>

        </form>

        </div>
        <ul class="tab-group" id="lg_reg">
            <?echo '<li id="l_i"><a href="login.php?lang='.$chosen_lang.'">'.$terms["login"].'</a></li>
            <li id="s_u"><a href="registration.php?lang='.$chosen_lang.'">'.$terms["signup"].'</a></li>' ?>          
        </ul>
    </div>

    <? require('languages_line.php'); ?>
      
    <script src="jquery-3.2.1.min.js"></script>
    <!--<script type="text/javascript" src="words.js"></script>-->
    <script type="text/javascript" language="JavaScript">
        var meaning = "";
        var newpage = 0;
        //alert("NEW PAGE!")
          

        $(document).ready(function(){
           /* $(document).on('click','.lang_a', function(){
                var m = $(this).text();
                alert(m);
            });*/

            $(function(){
                if(newpage == 0){
                    //history.pushState(null, document.title, 'index.php?lang=eng');
                    //$("#l_i").html("Log In");
                    newpage+=1;
                    //alert("NEW PAGE!")

                }
            });  
            $("#languages").change(function() {
                $("#languages").attr("selected","selected");
                meaning = $("#languages :selected").text();
                /*alert(meaning);*/
            });
            });
            
        //window.location.href = "http://localhost/index.php?" + "&meaning=" + meaning; 
        
    </script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
   <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>-->
  </body>
</html>