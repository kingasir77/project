<?php

require_once"required.php";


$comp= ($_GET['comp_id']);
if($comp == 0 )
die("error not found this id ");

else
project_comp_delete($comp);
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>