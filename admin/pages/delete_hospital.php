<?php
require_once"required.php";


$hospital= ($_GET['id']);
if($hospital == 0 )
die("error not found this id ");

else
project_hospital_delete($hospital);
header('Location: ' . $_SERVER['HTTP_REFERER']);




?>