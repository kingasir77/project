<?php
require_once("required.php");
$comp_id = $_GET["comp_id"];
$name = $_POST['name'];
$price = $_POST['price'];
$selected = $_POST['select_outside'];

project_plan_add($name,$selected,$price,$comp_id);

$location = "location:"."edit.php?comp_id=".$comp_id;
header($location);

?>