<?php


class plan
{

    /**
     * @url GET/get_plans
     * param $id
     */
    function getplanname($id){
        $link = new PDO('mysql:host=localhost;dbname=project','root','14181418');
        $handle = $link->prepare("SELECT plan.p_id,plan.p_name from plan WHERE company_id= ? ");
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


    /**
     * @url GET/get_plan
     * param $id
     */
    function get_info_plan($id){
        $link = new PDO('mysql:host=localhost;dbname=project','root','14181418');
        $handle = $link->prepare("SELECT * from plan WHERE p_id = ?");
        $handle->bindValue(1,$id,PDO::PARAM_INT);
        $handle->execute();
        $result = $handle->fetch(PDO::FETCH_ASSOC);
        if(empty($result)){
            $err = new stdClass();
            $err->error = "plan  information not found ";
            return $err;
        }
        else {
            return $result;
        }
    }
}


