

<?php
require_once"required.php";


$comp= ($_GET['id']);
if($comp == 0 )
die("error not found this id ");

else
project_relation_delete($comp);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>