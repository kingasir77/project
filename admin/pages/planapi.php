<?php
require_once("connect.php");
global $connect;


function project_plan_get($exrta = ''){
	global $connect;

	$qurey_text = sprintf("SELECT * FROM plan %s",$extra);
	$query = mysqli_query($connect,$qurey_text);

	if(!$query)
		return null;

	$count = mysqli_num_rows($query);
	if($count ==0)
		return 0;


	$arr = array();
	for($i=0;$i<$count;$i++)
		$arr[count($arr)] = mysqli_fetch_assoc($query);


	mysqli_free_result($query);


	return $arr;
}	

function project_plan_num(){
	global $connect;

	$qurey_text = sprintf("SELECT * FROM plan ");
	$query = mysqli_query($connect,$qurey_text);

	if(!$query)
		return null;

	$count = mysqli_num_rows($query);
	if($count ==0)
		return "0";

	return $count;

}

function project_plan_bycompanyid($id_comp){
	global $connect;

	$qurey_text = sprintf("SELECT * FROM plan WHERE company_id = $id_comp ");
	$query = mysqli_query($connect,$qurey_text);

	if(!$query)
		return null;

	$count = mysqli_num_rows($query);
	if($count ==0)
		return "null";
	$arr = array();
	for($i=0;$i<$count;$i++)
		$arr[count($arr)] = mysqli_fetch_assoc($query);

	return $arr;
}
function project_plan_add($name,$outside,$price,$company_id){
	global $connect;
    

        $n_name     = mysqli_escape_string($connect,strip_tags($name));
        

    $query_Add = sprintf("INSERT INTO plan(p_id,p_name,p_outside,p_price,company_id) 
                                    VALUES (null,'%s','%s',%d,%d)" ,$n_name,$outside,$price,$company_id);
    $query_exe_add = mysqli_query($connect,$query_Add);
    if(!$query_exe_add)
        return ("cann't add user sorry");
     
    return true;    
    }
function project_plan_num_bycompanyid($id_comp){
	global $connect;

	$qurey_text = sprintf("SELECT * FROM plan WHERE company_id = $id_comp ");
	$query = mysqli_query($connect,$qurey_text);

	if(!$query)
		return null;

	$count = mysqli_num_rows($query);
	if($count ==0)
		return 0;

	return $count;
}
function project_plan_delete($plan_id){
	
    global $connect;
    $uid =(int)$plan_id;
    if($uid==0)
        return false;
        $query = sprintf("DELETE FROM plan WHERE p_id=%d",$uid);
        $query_exe = mysqli_query($connect,$query);
        if(!$query_exe)
            return false;

            return true;

        }


function get_company_by_plan_id($id){
	global $connect;

	$qurey_text = sprintf("SELECT company_id FROM plan WHERE p_id = $id ");
	$query = mysqli_query($connect,$qurey_text);
	$result = @mysqli_fetch_assoc($query);

	if(!$query)
		return null;


	return $result['company_id'];
}

?>