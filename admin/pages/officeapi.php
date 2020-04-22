<?php
require_once("connect.php");
global $connect;


function project_office_get($extra = ''){
	global $connect;

	$qurey_text = sprintf("SELECT * FROM office %s",$extra);
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


	return $arr;
}	


function project_office_bycompanyid($id_comp){
	global $connect;

	$qurey_text = sprintf("SELECT * FROM office WHERE company_id = $id_comp ");
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
function project_office_add($city,$location,$company_id){
	global $connect;
    

        $n_name     = mysqli_escape_string($connect,strip_tags($city));
        

    $query_Add = sprintf("INSERT INTO office(office_id,o_city,office_location,company_id) 
                                    VALUES (null,'%s','%s',%d)" ,$n_name,$location,$company_id);
    $query_exe_add = mysqli_query($connect,$query_Add);
    if(!$query_exe_add)
        return ("cann't add user sorry");
     
    return true;    
    }


function project_office_num_bycompanyid($id_comp){
	global $connect;

	$qurey_text = sprintf("SELECT * FROM office Where company_id = $id_comp");
	$query = mysqli_query($connect,$qurey_text);

	if(!$query)
		return null;

	$count = mysqli_num_rows($query);
	if($count ==0)
		return null;

	return $count;
}

?>