<?php
    
    
    
class company {
    
    
        /**
         * @url GET/get_companies
         */         
        function project_company_getcompany(){
        $connect  =mysqli_connect('localhost','root','14181418','project');
        $text =sprintf("SELECT * from company");
        $query = mysqli_query($connect,$text);
        $num  = mysqli_num_rows($query);
        $arr = array();
        for($i = 0;$i<$num;$i++){
            $arr[count($arr)] = mysqli_fetch_assoc($query); 
            $text1 = sprintf("SELECT * from cmp_rate WHERE comp_id = '%s'",$arr[$i]['c_id']);
            $query1 = mysqli_query($connect,$text1);
            $arr[$i][count($arr[$i])]= mysqli_fetch_assoc($query1);
            if(is_null($arr[$i]['6'])){
            $sum = '';
            $arr[$i]['rate'] = $sum;
            }
            else {
                $sum = (int)$arr[$i][6]['sum'] / (int)$arr[$i][6]['num'];
				
                $arr[$i]['rate'] = number_format((float) $sum ,2,'.','');
            }
        } 
        return $arr;
    }
    
      //get information company 
        /**
         * @url GET/get_company
         * param $id

         */
        function get_info_company($id){
        $link = new PDO('mysql:host=localhost;dbname=project','root','14181418');
        $handle = $link->prepare("SELECT * from company WHERE c_id = ?");
        $handle->bindValue(1,$id,PDO::PARAM_INT);
        $handle->execute();
        $result = $handle->fetch(PDO::FETCH_ASSOC);
        if(empty($result)){
            $err = new stdClass();
            $err->error = "company information not found ";
            return $err;
        }
        else
            return $result;

    }

       
}


// function getcompany(){
//     $link = new PDO('mysql:host=localhost;dbname=project','root','14181418');
//     $handle = $link->prepare("SELECT * from company ");
//     $handle->execute();
//     $result = $handle->fetchAll(PDO::FETCH_ASSOC);
//     if(empty($result)){
//         $err = new stdClass();
//         $err->error = "User not found ";
//         return $err;
//     }
//     else{
//         return $result;
//     }
    
//   }