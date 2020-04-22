<?php

require_once("required.php");
session_start();
$plan_id = $_GET['plan_id'];
$user = $_SESSION['user'];
echo $plan_id;
echo "<br>";
echo $user;

$check_again = search_link($user);
if($check_again == true){
    insert_link($user,$plan_id); // in userapi
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
    
    else{
        $_SESSION['error']=0;
        header('Location: ' . $_SERVER['HTTP_REFERER']);

    }


