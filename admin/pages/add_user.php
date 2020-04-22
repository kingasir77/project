<?php
if(!isset($_POST['name']) || (!isset($_POST['password']))){
        
        header("location:signup.php");
}
else{

    extract($_POST);
    require_once("userapi.php");
    
    $name = trim($_POST['name']);
    $password = trim($_POST['password']);
    $check = $_POST['select_type'];

    $check_name = project_users_byname($name);
    
    
    if($check_name != null){
        header("location:signup.php");  
      }
        else {
          $query_add = project_users_add($name,$password,$check);

          if($check == 3 ){
            echo $name;
            $id = get_id_user($name);
           
            insert_into_nor_user($id);
            }
        
    header("location:../pages");

    
    
        }

}

?>


