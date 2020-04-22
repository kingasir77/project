<?php
require_once("required.php");

if(isset($_GET['id'])){
    if($_POST['phone'] < 10 )
        echo "your phone number less 10 number ";
$user_id = $_GET['id'];
}
else 
die("error not know who user"); 

$name = $_POST['name'];
$location = $_POST['location'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$exe = project_hospital_add($name,$user_id,$location,$email,$phone);
if($exe)
header('Location: ' . $_SERVER['HTTP_REFERER']);


?>