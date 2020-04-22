<?php
require_once("required.php");
global $connect;


function project_hospital_get($extra = ""){
	global $connect;
	$text= sprintf("SELECT * FROM hospital %s ",$extra);
	$query = mysqli_query($connect,$text);

	if(!$query)
		return "error ".$query;

	$count = mysqli_num_rows($query);
	if($count == 0 )
		return 0;


	$arr = array();

	for($i=0;$i<$count;$i++)
		$arr[count($arr)] = mysqli_fetch_assoc($query);

	mysqli_free_result($query);

	return $arr; 
	}

function project_hospital_add($name,$user_id,$location,$email,$phone){
	global $connect;
    

        $n_name     = mysqli_escape_string($connect,strip_tags($name));
        $n_location    = mysqli_escape_string($connect,strip_tags($location));
        $n_email     = mysqli_escape_string($connect,strip_tags($email));
        

    $query_Add = sprintf("INSERT INTO hospital(h_id,h_name,user_id,h_location,h_email,h_phone) 
                                    VALUES (null,'%s',%d,'%s','%s','%s')" ,$n_name,$user_id,$n_location,$n_email,$phone);
    $query_exe_add = mysqli_query($connect,$query_Add);
    if(!$query_exe_add)
        return ("cann't add user sorry");
     
    return true;    
    }
    
function project_hospital_num(){

	global $connect;
	$text= sprintf("SELECT * FROM hospital ");
	$query = mysqli_query($connect,$text);

	if(!$query)
		return "error ".$query;

	$count = mysqli_num_rows($query);
	if($count == 0 )
		return 0;
	return $count;
}
function project_hospital_getbyuser($user_id){
	$result = project_hospital_get("WHERE user_id = $user_id");
	return $result;
}
function project_hospital_numbyuserid($user_id){

	global $connect;
	$text= sprintf("SELECT * FROM hospital WHERE user_id = $user_id");
	$query = mysqli_query($connect,$text);

	if(!$query)
		return "error ".$query;

	$count = mysqli_num_rows($query);
	if($count == 0 )
		return 0;
	return $count;
}
function project_hospital_delete($id){
global $connect;
    $uid =(int)$id;
    if($uid==0)
        return false;
        $query = sprintf("DELETE FROM hospital WHERE h_id=%d",$uid);
        $query_exe = mysqli_query($connect,$query);
        if(!$query_exe)
            return false;

            return true;

        }

function project_hospital_getname($name){
	global $connect;
	$text= sprintf("SELECT * FROM hospital WHERE h_name = $name");
	$query = mysqli_query($connect,$text);

	if(!$query)
		return "error ".$query;

	$count = mysqli_num_rows($query);
	if($count == 0 )
		return 0;


	$arr = array();

	for($i=0;$i<$count;$i++)
		$arr[count($arr)] = mysqli_fetch_assoc($query);

	mysqli_free_result($query);

	return $arr[0]; 
	}


function project_hospital_byid($id)
{
	global $connect;
	$text= sprintf("SELECT * FROM hospital WHERE h_id = $id");
	$query = mysqli_query($connect,$text);

	if(!$query)
		return "error ".$query;

	$count = mysqli_num_rows($query);
	if($count == 0 )
		return 0;


	$arr = array();

	for($i=0;$i<$count;$i++)
		$arr[count($arr)] = mysqli_fetch_assoc($query);

	mysqli_free_result($query);

	return $arr[0]['h_name']; 
	}
?>