<?php
require_once('required.php');
session_start();
$user  = $_SESSION['user'];
$comp = $_SESSION['comp_id'];
$rate_value= $_GET['rate'];
echo $rate_value;
echo $user;
echo "<br>";
echo $comp;
update_rate_for_company($comp);
header("Location: " . $_SERVER["HTTP_REFERER"]);



function update_rate_for_company($comp){
    global $connect;
    global $comp ,$rate_value,$user;
    
    $qurey_text = sprintf("SELECT * from cmp_rate WHERE  comp_id = $comp");
    $query = mysqli_query($connect,$qurey_text);
    $result = mysqli_fetch_assoc($query);
    if(empty($result)){
        $qurey_text = sprintf("INSERT INTO cmp_rate(comp_id,num,sum) VALUES ($comp,0,0)");
    $query = mysqli_query($connect,$qurey_text);
    }
   

    $qurey_text = sprintf("UPDATE cmp_rate
    SET num = num+1  ,sum = sum + $rate_value
    WHERE comp_id = $comp ");
    $query = mysqli_query($connect,$qurey_text);
    
    $qurey_text = sprintf("UPDATE link
    SET rate = 1
    WHERE id_user = $user");
    $query = mysqli_query($connect,$qurey_text);
    
    
    if($query )
{
    
}
    
}



