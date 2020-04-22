<?php
require_once("connect.php");
global $connect;
function project_comp_get($extra = ''){
	global $connect;

	$qurey_text = sprintf("SELECT * FROM company %s",$extra);
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


function project_comp_getbyid($cid){
	$id = (int)$cid;               
    if($id == 0)                  
        return NULL;
    $result = project_comp_get('WHERE c_id ='.$cid);           
    if($result == NULL)
      return NULL;
    $company = $result[0];
    return $company;

}
function project_comp_getbyname($name){
	$result = project_comp_get("WHERE name='$name'");
    $company = $result[0];

    if($company  == null)
        return null; 
        else 
        return $result[0];   

}
function project_comp_add($name,$website,$email,$phone,$user_id){
    global $connect;
    

        $n_name    	 = mysqli_escape_string($connect,strip_tags($name));
        $n_website   = mysqli_escape_string($connect,strip_tags($website));
        $n_email     = mysqli_escape_string($connect,strip_tags($email));
        $n_phone     = mysqli_escape_string($connect,strip_tags($phone));

    $query_Add = sprintf("INSERT INTO company(c_id,c_name,c_website,c_email,c_phone,user_id) 
                 VALUES (null,'%s','%s','%s',%d,%d)" 
                 ,$n_name,$n_website,$n_email,$n_phone,$user_id);
    $query_exe_add = mysqli_query($connect,$query_Add);
    if(!$query_exe_add)
        echo ("cann't add company sorry");
     
    return true;    

}


function project_comp_num(){
	global $connect;
	$qurey_text = sprintf("SELECT * FROM company ");
	$query = mysqli_query($connect,$qurey_text);
	$count = mysqli_num_rows($query);
	return $count;
}
function project_comp_getbyuserid($user_id){
    global $connect;

    $qurey_text = sprintf("SELECT * FROM company WHERE user_id = $user_id ");
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

function project_comp_num_byuserid($user_id){
    global $connect;
    $qurey_text = sprintf("SELECT * FROM company WHERE user_id = $user_id ");
    $query = mysqli_query($connect,$qurey_text);
    $count = mysqli_num_rows($query);
    return $count;
}

function project_comp_delete($comp_id){
    global $connect;
    $uid =(int)$comp_id;
    if($uid==0)
        return false;
        $query = sprintf("DELETE FROM company WHERE c_id=%d",$uid);
        $query_exe = mysqli_query($connect,$query);
        if(!$query_exe)
            return false;

            return true;

        }
        
        
        function get_rating($id){
            global $connect;
            $qurey_text = sprintf("SELECT num,sum FROM cmp_rate WHERE comp_id = $id ");
            $query = mysqli_query($connect,$qurey_text);
            $result = mysqli_fetch_assoc($query);
            if(empty($result))
             return 0;
            $res = (int) $result['sum'] / (int)$result['num'];
            return  (float)($res);
            
        }
        
        
        
?>