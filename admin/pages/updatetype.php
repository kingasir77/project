<?php
require_once ("required.php");
@$type = $_POST['select_type'];
@$user = $_POST['select_user'];

if($type == null || $user == null)
    die("error access");

else{
    project_users_update_type($user,$type);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

?>