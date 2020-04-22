<?php


    // by : Majed Asiri
    //project : project cs final 
    // date : 4/4/2020
    //time : 6:15 P.M
    //title : build home page for visitor
    
    require_once('../pages/required.php');
    include('fun.php');
   
    
    ?>
    
    
<html>
    <head>
     <link rel="icon" href="favicon.png">
     <style>
         .poster{
            margin: 0px;
            margin-top: -20px;
            height: 570px;
            width: 100%;
            opacity: .34;
           
         }
       
       
        
     </style>
    </head>    
    
    <body>
        <span class="nav_up">
        <?=upper_nav()?>
        </span>
        <img class="poster"src="img_poster.png" >
        <?=name_website()?>
    </div>
    </body>
</html>