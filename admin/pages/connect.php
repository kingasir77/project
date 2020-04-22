<?php
$localhost = "localhost";
$name = "root";
$password= "14181418";
$db = "project";

$connect = @mysqli_connect($localhost,$name,$password);
    if(!$connect){
     die("problem in connect with server sorry !!");
    }

    $select_db = mysqli_select_db($connect,$db);
    if(!$select_db){
        mysqli_close($connect);
        die ("problem in selection database ");
    }
        
    
    @mysqli_query($connect,"SET NAMES 'uft8'");

    






?>