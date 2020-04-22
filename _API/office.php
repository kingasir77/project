<?php


class office
{


    /**
     * @url GET/get_offices
     * param $id
     */
    function getoffices($id){
        $link = new PDO('mysql:host=localhost;dbname=project','root','14181418');
        $handle = $link->prepare("SELECT * from office WHERE company_id= ? ");
        $handle->bindValue(1,$id,PDO::PARAM_INT);
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

}
