<?php


class specialty
{
    /**
     * @url GET/get_names
     * param $id
     */
function getspecialty($id){
        $link = new PDO('mysql:host=localhost;dbname=project','root','14181418');
        $handle = $link->prepare("SELECT specialty.s_name from specialty WHERE hospital_id= ? ");
        $handle->bindValue(1,$id,PDO::PARAM_INT);
        $handle->execute();
        $result = $handle->fetchAll(PDO::FETCH_ASSOC);
        if(empty($result)){
            $err = new stdClass();
            $err->error = " not found any plan ";
            return $err;
        }
        else
            return $result;

    }

}
