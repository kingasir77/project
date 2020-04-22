<?php
require_once('required.php');
session_start();
$user = $_SESSION['user'];
$plan = $_SESSION['id_plan'];
echo $user. $plan;
if(!empty($user) && !empty($plan)){
    $text = sprintf('DELETE FROM link WHERE id_user = %d AND id_plan = %d',$user,$plan);
    $query  = mysqli_query($connect,$text);    
    if($query)  {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
    else {
        die("error  in internet");
    }
}


?>