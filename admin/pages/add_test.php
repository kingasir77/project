<?php
$name = $_POST['name'];
$password = $_POST['password'];
require_once("test.php/student");
$url = "location:test.php/student/insert?name=".$name."&password=".$password;
header($url);






?>