<?php
require_once("required.php");


$name = $_GET['name'];
$hospital_id = $_GET['id'];
if($name == null)
header('Location: ' . $_SERVER['HTTP_REFERER']);
else
$exe = project_spe_add($name,$hospital_id);
if($exe)
header('Location: ' . $_SERVER['HTTP_REFERER']);


?>