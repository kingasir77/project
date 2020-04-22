<?php

require_once("required.php");
$id  =  $_GET['id'];
$name= $_POST['list'];

project_relation_add($id,$name);
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>