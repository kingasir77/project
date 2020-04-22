
<?php

include("connect.php");               
global $connect;

function project_users_get($extra  = ''){
	global $connect;

	$qurey_text = sprintf("SELECT * FROM users %s",$extra);
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



function project_users_add($name,$password,$check){
	global $connect;
    

        $n_name     = mysqli_escape_string($connect,strip_tags($name));
        $n_password = mysqli_escape_string($connect,(strip_tags($password)));

    $query_Add = sprintf("INSERT INTO users(id,name,password,type) 
                                    VALUES (null,'%s','%s',%d)" ,$n_name,$n_password,$check);
    $query_exe_add = mysqli_query($connect,$query_Add);
    if(!$query_exe_add)
        echo ("cann't add user sorry");
     
    return true;    
    }
function project_users_byname($name){
	$result = project_users_get("WHERE name = '$name'");
	$user = $result[0];
	if($user == null)
		return null;
	else
		return  $user;}

function project_users_num(){
	global $connect;

	$qurey_text = sprintf("SELECT * FROM users ");
	$query = mysqli_query($connect,$qurey_text);

	if(!$query)
		return null;

	$count = mysqli_num_rows($query);
	if($count ==0)
		return null;
	return  $count;
	}


function project_users_gettype($user_id){
	global $connect;

	$qurey_text = sprintf("SELECT type FROM users WHERE id = $user_id ");
	$query = mysqli_query($connect,$qurey_text);

	if(!$query)
		return null;
		$count = mysqli_num_rows($query);
	if($count == 0)
		return null;

	$type_user = -1 ; 
	$arr = array();
	for($i=0;$i<$count;$i++)
		$arr[count($arr)] = mysqli_fetch_assoc($query);

	$type_user = $arr[0]['type'];
	
	return ($type_user)  ;
	
	}
	
	
	
	
	
function project_users_update_type($user_id,$type){
	global $connect;
 $query  = mysqli_query($connect,"UPDATE users SET type = $type WHERE id = $user_id;");
 if(!$query)
     return false;
 else
     return true;

	}


function get_id_user($name){
	global $connect;

	$qurey_text = sprintf("SELECT id FROM users WHERE name= '%s'",$name);
	$query = mysqli_query($connect,$qurey_text);

	if(!$query)
		return null;

	$count = mysqli_num_rows($query);
	if($count ==0)
		return null;

	$result = mysqli_fetch_assoc($query);
	return $result['id'];
	
	
	}

function insert_into_nor_user($id){
	
	global $connect;
    
	$query_Add = sprintf("INSERT INTO nor_user(id,name,NID,nof,h_id) 
								VALUES (%d,null,null,null,null)" ,$id);
	$query_exe_add = mysqli_query($connect,$query_Add);
	if(!$query_exe_add)
	echo ("cann't add user sorry");
 
	return true;    
	}

    function generate(){
		
		global $connect;
		$litter = array('A','B','C','D','E','F','R','H','N','M','S','X','1','2','3','4','5','6','7');
		$count= count($litter);
		$i = 0;
		$word ='';
		
		while($i<10){
		  $ran = rand(0 , $count-1 );
		  $word=$word.$litter[$ran];
		  $i++;
		}
		
		$qurey_text = sprintf("SELECT * FROM link WHERE generate= '%s'",$word);
		$query = mysqli_query($connect,$qurey_text);
		$result = mysqli_fetch_assoc($query);
		if(empty($result))
			return $word;
		else
		{
			generate();
		}
		
		}
function insert_link($user_id,$plan_id){
		global $connect;
		$word = generate();
		$query_Add = sprintf("INSERT INTO link(id_user,id_plan,generate) 
										VALUES (%d,%d,'%s')" ,$user_id,$plan_id,$word);
		$query_exe_add = mysqli_query($connect,$query_Add);
		if(!$query_exe_add)
			echo ("cann't add user sorry");

		return true; 
		}
		
function search_link($user_id){
	global $connect;

	$qurey_text = sprintf("SELECT * FROM link WHERE id_user=$user_id");
	$query = mysqli_query($connect,$qurey_text);
	$result = mysqli_fetch_assoc($query);

		if(empty($result))
			return true;
		else
			return false;
	}

function check_if($user_id){

	global $connect;
  	$qurey_text = sprintf("SELECT * FROM link WHERE id_user= %d",$user_id);
	$query = mysqli_query($connect,$qurey_text);
	$result = mysqli_fetch_assoc($query);
  
	
	  if($query == null)
		return false;
	  else
		return $result['id_plan'];
  
  }
function users_get_name_by_id($id){
	global $connect;

	$qurey_text = sprintf("SELECT name FROM users WHERE id = $id");
	$query = mysqli_query($connect,$qurey_text);

	if(!$query)
		return null;

	
	$result = mysqli_fetch_assoc($query);
	return $result['name'];
	
	
}


?>