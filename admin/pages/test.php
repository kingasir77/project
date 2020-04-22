<?php
 // this file test on restler and requistes only
//not using in project
// not version using this api in project
//this api using rest api for powerfull of api

class student {

/**
 * @url GET/name
 */
	  function getname($name = ''){
		return " majed";
	}


	function m (){
		$obj= new stdClass();
		$obj->name = "majed ahmed asiri";
		return $obj;
	}

/**
* @url GET/GET
*/

    //localhost/project_2/admin/pages/test.php/student/GET
	function getallusers (){
		$link = new PDO('mysql:host=localhost;dbname=project','root','14181418');
		$handle = $link->prepare("SELECT * FROM users ");

		$handle->execute();
		$result = $handle->fetchAll(PDO::FETCH_OBJ);
		if(empty($result)){
			$err = new stdClass();
			$err->error = "no data can come ";
			return $err;
			}
			else 
			return $result;
	}


/**
 * @url GET/info/{userid}
 *
 *
 */

 //localhost/project_2/admin/pages/test.php/student/info/11

	function getuser ($userid){
		$link = new PDO('mysql:host=localhost;dbname=project','root','14181418');
		$handle = $link->prepare("SELECT * FROM users WHERE id = ? ");
		$handle->bindValue(1,$userid,PDO::PARAM_INT);
	    $handle->execute();
		$result = $handle->fetch(PDO::FETCH_OBJ);
		if(empty($result)){
			$err = new stdClass();
			$err->error = "no data can come ";
			return $err;
			}
			else 
			return $result;
	}

	/**
	 * @url GET/nameuser/:userid
	 */
	//localhsot/project_2/admin/pages/test.php/studnet/nameuser/11
	//get one values of object such name and password and type anything 

	function getnameuser($userid){
		$link = new PDO('mysql:host=localhost;dbname=project','root','14181418');
		$handle = $link->prepare("SELECT * from users WHERE id = ? ");
		$handle->bindValue(1,$userid,PDO::PARAM_INT);
		$handle->execute();
		$result = $handle->fetch(PDO::FETCH_OBJ);
		if(empty($result)){
			$err = new stdClass();
			$err->error = "User not found "; 
			return $err['name'];
		}
		else { 
			$res = new stdClass();
			$res = $result->name;
			return $res;
		}
	}
	/**
	 * @url GET/nameallusers
	 */
	function getusersname(){
		$link = new PDO('mysql:host=localhost;dbname=project','root','14181418');
		$handle = $link->prepare("SELECT * from users ");
		$handle->execute();
		$result = $handle->fetchAll(PDO::FETCH_OBJ);
		if(empty($result)){
			$err = new stdClass();
			$err->error = "User not found "; 
			return $err;
		}
		else { 
			$res = new stdClass();
			$res = $result->name;
			return $res;
		}
	}
	}

	/**
	 * @url GET/insert
	 */
	function insert($name,$password){
		$link = new PDO('mysql:host=localhost;dbname=project','root','14181418');
		$handle = $link->prepare("INSERT INTO users (id,name,password,type) VALUES(null,?,?,1)");
		$handle->bindValue(1,$name,PDO::PARAM_STR);
		$handle->bindValue(2,$password,PDO::PARAM_STR);
		if($handle->execute()){
			 $res = new stdClass();
			 $res->execute = "done successful execute";
			 return $res;
		}
		else 
			return "problem in insert cann't insert ";
		}

require_once("F:/xampp\htdocs/project_2/admin/restler.php");
use Luracast\Restler\Restler;

$r = new Restler();
$r->setSupportedFormats('JsonFormat');
$r->addAPIClass('student');
$r->handle();


?>