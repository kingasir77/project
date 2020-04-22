
<?php

include("connect.php");               
global $connect;

function project_relation_get($extra  = ''){
	global $connect;

	$qurey_text = sprintf("SELECT * FROM relation_p_h %s",$extra);
	$query = mysqli_query($connect,$qurey_text);

	if(!$query)
		return null;

	$count = mysqli_num_rows($query);
	if($count ==0)
		return null;


	$arr = array();

	for($i=0;$i<$count;$i++)
		$arr[count($arr)] = mysqli_fetch_assoc($query);

	


	mysqli_free_result($query);


	return ($arr)  ;
	}



function project_relation_add($plan_id,$hospital_id){
	global $connect;
    	$plan_id = (int)$plan_id;
    	$hospital_id= (int)$hospital_id;

      

    $query_Add = sprintf("INSERT INTO relation_p_h(r_id,plan_id,hospital_id) 
                                    VALUES (null,%d,%d)" ,$plan_id,$hospital_id);
    $query_exe_add = mysqli_query($connect,$query_Add);
    if(!$query_exe_add)
        echo ("cann't add user sorry");
     
    return true;    
    }


function project_relation_byplan($plan_id){
	global $connect;

	$qurey_text = sprintf("SELECT * FROM relation_p_h WHERE plan_id =$plan_id");
	$query = mysqli_query($connect,$qurey_text);

	if(!$query)
		return null;
	$count = mysqli_num_rows($query);
	if($count ==0)
		return null;
	$arr = array();
	for($i=0;$i<$count;$i++)
		$arr[count($arr)] = mysqli_fetch_assoc($query);
		mysqli_free_result($query);
	return ($arr);

}

function project_relation_num_byplan($plan_id){
	global $connect;

	$qurey_text = sprintf("SELECT * FROM relation_p_h WHERE plan_id =$plan_id");
	$query = mysqli_query($connect,$qurey_text);

	if(!$query)
		return null;
	$count = mysqli_num_rows($query);
	if($count ==0)
		return null;
	
	return $count;

}
function project_relation_delete($id){
global $connect;
    $uid =(int)$id;
    if($uid==0)
        return false;
        $query = sprintf("DELETE FROM relation_p_h WHERE r_id=%d",$uid);
        $query_exe = mysqli_query($connect,$query);
        if(!$query_exe)
            return false;

            return true;

        }




?>