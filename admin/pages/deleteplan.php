<?php

require_once"required.php";


$plan= ($_GET['plan_id']);
if($plan == 0 )
die("error not found this id ");

else
project_plan_delete($plan);
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>