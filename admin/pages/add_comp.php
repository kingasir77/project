<?php
if(!isset($_POST['name']))
       die("error in add new company ");
else{
	extract($_POST);
	require_once("required.php");
	$user_id = $_GET['user_id'];
	$name = trim($_POST['name']);
    $website = trim($_POST['website']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    
    $query = project_comp_add($name,$website,$email,$phone,$user_id);

       header("location:home1.php?access=1&user_id=$user_id");


}

?>