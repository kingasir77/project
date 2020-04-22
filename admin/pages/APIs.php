<?php

class users {

/**
 * @url GET/users
 */

function project_get_all_users(){
        $link = new PDO('mysql:host=localhost;dbname=project','root','14181418');
        $handle = $link->prepare("SELECT * from users  ");
        $handle->execute();
        $result = $handle->fetchAll(PDO::FETCH_ASSOC);
        if(empty($result)){
            $err = new stdClass();
            $err->error = " not found any plan ";
            return $err;
        }
        else {
            return $result;
        }
    }

    /**
     * @url GET/check/{name}/{password}
     */
    function project_get_user_by_check_info($name,$password){
        $link = new PDO('mysql:host=localhost;dbname=project','root','14181418');
        $handle = $link->prepare("SELECT * from users WHERE users.name= ? AND users.password = ? ");
        $handle->bindValue(1,$name,PDO::PARAM_STR);
        $handle->bindValue(2,$password,PDO::PARAM_STR);
        $handle->execute();
        $result = $handle->fetch(PDO::FETCH_ASSOC);
        if(empty($result)){
            $err = new stdClass();
            $err->error = " not found any user  ";
            return $err;
        }
        else {
            return $result;
        }
    }


}




require_once '../restler.php';

use Luracast\Restler\Restler;
$r = new Restler();
$r->setSupportedFormats('JsonFormat');
$r->addAPIClass('users');

$r->handle();
