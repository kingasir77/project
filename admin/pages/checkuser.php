<?php
require_once("connect.php");
require_once("userapi.php");
$access = false;
$name=  $_POST['name'];
$password = $_POST['password'];	
$text  = "WHERE name='$name' AND password = '$password'";
$user_enter = project_users_get($text);






if($user_enter == null)
    die(header("location:../pages"));
    
else{
    $user_id = $user_enter[0]['id'];
    $type_user = project_users_gettype($user_id);
    if($type_user == 0 || $type_user == 1 ){
	$access =true;
     $x = "location:home1.php?access=$access&user_id=$user_id";
    header($x);
    }
    else if($type_user==2){
        $access = true; 
        $x = "location:hospital_form.php?id=$user_id";
        header($x);
    }
    else if($type_user == 3){
        $access = true;
        session_start();
        $_SESSION['user'] = $user_id;
        $x = "location:nor_user.php";
        header($x);
    }

}




?>