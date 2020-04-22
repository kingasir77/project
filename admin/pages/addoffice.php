<?php
if(!isset($_POST['city']))
       die("error in add new company ");
else{
	$comp_id = $_GET['comp_id'];
	extract($_POST);
	require_once("officeapi.php");

	$city = trim($_POST['city']);
    $url = trim($_POST['url']);
    
    $query = project_office_add($city,$url,$comp_id);

     $location = "location:"."edit.php?comp_id=".$comp_id;
header($location);


}

?>