<?php
require_once("required.php");
global $connect;
function project_spe_get($extra = ''){
	global $connect;

	$qurey_text = sprintf("SELECT * FROM specialty %s",$extra);
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

function project_spe_add($name,$hospital){
    global $connect;
    

        $n_name    	 = mysqli_escape_string($connect,strip_tags($name));
        

    $query_Add = sprintf("INSERT INTO specialty(s_id,s_name,hospital_id) 
                 VALUES (null,'%s',%d)" 
                 ,$n_name,$hospital);
    $query_exe_add = mysqli_query($connect,$query_Add);
    if(!$query_exe_add)
        echo ("cann't add company sorry");
     
    return true;    

}

function prject_spe_get_byhospital($hospital_id)
{
   global $connect;

    $qurey_text = sprintf("SELECT * FROM specialty WHERE hospital_id = $hospital_id ");
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
function project_spe_num_hospital($hospital_id){
    global $connect;
    $qurey_text = sprintf("SELECT * FROM specialty WHERE hospital_id = $hospital_id ");
    $query = mysqli_query($connect,$qurey_text);
    $count = mysqli_num_rows($query);
    return $count;
}

function project_spe_delete($comp_id){
    global $connect;
    $uid =(int)$comp_id;
    if($uid==0)
        return false;
        $query = sprintf("DELETE FROM specialty WHERE s_id=%d",$uid);
        $query_exe = mysqli_query($connect,$query);
        if(!$query_exe)
            return false;

            return true;

        }
?>