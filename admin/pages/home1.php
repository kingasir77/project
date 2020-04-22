<?php
require_once("required.php");
$access= @$_GET['access'];
$user_id= $_GET['user_id'];
if(!isset($_GET['user_id']) || empty($user_id))
{
  header("location:../pages");
}
$type_user = project_users_gettype($user_id);

$arr= array();
$count_company =0 ;
if($access == 0){
	die("error not can achive to this page ");
}
if($type_user == 0 ){
$arr  = project_comp_get();
$count_company= project_comp_num();
rounter();
admin_alert();

    
}
else if  ($type_user == 1) {
  $arr = project_comp_getbyuserid($user_id);
 $count_company= project_comp_num_byuserid($user_id);
 
 
 function get_users_subscribe($id){
  global $connect;
  $text = sprintf('SELECT * FROM company WHERE user_id=%d ',$id);
  $query  = mysqli_query($connect,$text);   
  $result = mysqli_fetch_assoc($query);
  if(!empty($result))
  {
  $comp_id= $result['c_id'];
  $text = sprintf('SELECT * FROM plan WHERE company_id=%d ',$comp_id);
  $query  = mysqli_query($connect,$text);   
    $arr_plans = array();
    while($row = mysqli_fetch_assoc($query))
       $arr_plans[count($arr_plans)] = $row['p_id'];
    
        $arr_users_in_comp =array();
       $text = sprintf('SELECT * FROM link  ');
       $query  = mysqli_query($connect,$text);   
       while($row = mysqli_fetch_assoc($query)){
         if(in_array($row['id_plan'],$arr_plans)){
           $arr_users_in_comp[count($arr_users_in_comp)]  = $row;
         }
         else {
           
         }
       }
    return $arr_users_in_comp;
  }
  else 
  return null;
 }
 
  company_alert();

 $link = @(get_users_subscribe($user_id));
//  print_r($link);


}
function admin_alert(){
    echo "<nav aria-label=\"breadcrumb\">
  <ol class=\"breadcrumb\">
    <li class=\"breadcrumb-item active\" aria-current=\"page\">Admin / main admin</li>
  </ol>
</nav>";
}

function company_alert(){
    echo "<nav aria-label=\"breadcrumb\">
  <ol class=\"breadcrumb\">
    <li class=\"breadcrumb-item active\" aria-current=\"page\">Admin / medical insurance</li>
  </ol>
</nav>";
}



function hospital_alert(){
    echo "<nav aria-label=\"breadcrumb\">
  <ol class=\"breadcrumb\">
    <li class=\"breadcrumb-item active\" aria-current=\"page\">Admin / hospital admin</li>
  </ol>
</nav>";
}





?>


<!DOCTYPE html>
<html>
<head>
	<title>admin page </title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">



</head>
</head>
<body>
  <?php
  
  function rounter(){
    global $user_id;
    ?>
    
  
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand"   >Medical Insurance</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="home1.php?access=1&user_id=<?=$user_id?>">Admin <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="hospital_form.php?id=<?=$user_id?>">Hospitals</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="users_update_form.php">Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="subscribes.php">subscriptions</a>
      </li>
      
   
      
      <li class="nav-item">
        <a class="nav-link" href="mailto:436805833@kku.edu.sa">contact us</a>
      </li>
      
      
      <li class="nav-item">
        <a class="nav-link" href="logout.php">logout</a>
      </li>
      
      
    </ul>
  </div>
</nav>
<?php

  }
  ?>



<br>
	<div class="container">
		<div class="row info">
				<span class="col-4"> <button type="button" class="btn btn-primary">
 				 number of companies <span class="badge badge-light"><?=@project_comp_num_byuserid($user_id);?></span>
			</button></span>
			<span class="col-4"> <button type="button" class="btn btn-primary">
				  Number of plans <span class="badge badge-light"><?=@project_plan_num();?></span>
			</button></span>
			<span class="col-4"> <button type="button" class="btn btn-primary">
  				Number of hospitals <span class="badge badge-light"><?=@project_hospital_num();?><span>
			</button></span>

		</div>

		<br><br>


	<div class="row">
<form action="add_comp.php?user_id=<?=$user_id?>" method="post">
	 <div class="col-auto">
      <label class="sr-only" for="inlineFormInputGroup">Name</label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><img src="../img/Name.png"></div>
        </div>
        <input type="text" required="" class="form-control"name="name" id="inlineFormInputGroup" placeholder="name">
      </div>
    </div>


	 <div class="col-auto">
      <label class="sr-only" for="inlineFormInputGroup">Website</label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><img src="../img/www.png"></i>
		</div>
        </div>
        <input type="text" required class="form-control" name="website" id="inlineFormInputGroup" placeholder="website">
      </div>
    </div>


	 <div class="col-auto">
      <label class="sr-only" for="inlineFormInputGroup">email</label>
      <div class="input-group  mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><img src="../img/mail.png"></div>
        </div>
        <input type="email" requireded class="form-control" name="email" id="inlineFormInputGroup" placeholder="email">
      </div>
    </div>


 <div class="col-auto">
      <label class="sr-only" for="inlineFormInputGroup">phone</label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><img src="../img/phone.png"></div>
        </div>
        <input type="text" required="" class="form-control" name="phone" id="inlineFormInputGroup" placeholder="phone">
      </div>
    </div>


     <div class="col-auto">
      <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </div>

</div>

</form>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">website</th>
      <th scope="col">email</th>
      <th scope="col">phone</th>
      <th scope="col">plans</th>
      <th scope="col">edit</th>
    </tr>
  </thead>
  <tbody>
    <tr>	
    	<?php
      

    	for($i=0;$i<$count_company;$i++){		
    		$company  = $arr[$i];
    		$company_id = $arr[$i]['c_id'];

    		echo "<th scope='row'>".($i+1)."</th>";
    		echo "<td>";
    		echo $company['c_name'];
    		echo "</td>";

    		echo "<td>";
    		echo $company['c_website'];
    		echo "</td>";


        echo "<td>";
        echo $company['c_email'];
        echo "</td>";

    		echo "<td>";
    		echo $company['c_phone'];
    		echo "</td>";


    		echo "<td>";
    		echo project_plan_num_bycompanyid($company_id);
    		echo "</td>";


    		echo "<td>";
    		echo "<a href='edit.php?comp_id=$company_id'><img src='../img/edit.png'></a>";
    		echo "</td>";

        echo "<td>";
        echo "<a href='deletecomp.php?comp_id=$company_id'><img src='../img/cancel.png'></a>";
        echo "</td>";

    		echo "</tr>";

    	}

    	

    	?>




     
    
    
      
  </tbody>
</table>

	</div>
<?php 


function show_button(){
global $user_id;


$res_users = project_users_get();
$count_users = project_users_num();
?>

   <div class="col-auto">
     <a href="hospital_form.php?id=<?=$user_id?>"> <button type="submit" class="btn btn-primary mb-2">Hospitals</button></a>
    </div>

    <br><br>
    <div class="container align-items-center">
<div class="row align-items-center">

    <form action="updatetype.php" method="post">
    <select class="custom-select col-5" name="select_user">
        <option selected>Choose user...</option>
        <?php
            for($i=0;$i<count($res_users);$i++){
                $name= $res_users[$i]['name'];
                $id= $res_users[$i]['id'];
                echo "<option value='$id'>$name</option>";
            }
        ?>

    </select>

    <select class="custom-select col-5" name="select_type">
        <option selected>Choose new type...</option>
        <option value="0">main admin</option>
        <option value="1">medical insurance</option>
        <option value="2">hospital</option>
        <option value="3">user </option>
    </select>

        <button class="btn btn-outline-secondary col-5" name='submit' type="submit">update</button>

    </form>
</div>
    </div>

              
    <?php
  
}
  
global $type_user;

echo "<br>";
echo "<br>";
echo "<br>";
if($type_user == 1){
  users_show();
}
  
?>

<?php
  function users_show(){
      
    
    
    ?>
    <hr>
    <h2>Subscribers</h2>
    <br>
    <table class="table container  table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">plan</th>
      <th scope="col">Membership</th>
    </tr>
  </thead>
  <tbody>
    <?php
    global $connect,$link;
    for($i = 0;$i<@count($link);$i++){
      $id_user = $link[$i]['id_user'];
      $text = sprintf('SELECT * FROM users WHERE id=%d ',$id_user);
      $query  = mysqli_query($connect,$text);   
      $result = mysqli_fetch_assoc($query);
      $result = $result['name'];
      
      
      
      
      echo "<tr>";
      echo "<td>";
      echo $i+1;
      echo "</td>";
      
    
      
      echo "<td>";
      echo $result;
      echo "</td>";
      
      $id_plan = $link[$i]['id_plan'];
      $text = sprintf('SELECT * FROM plan WHERE p_id=%d ',$id_plan);
      $query  = mysqli_query($connect,$text);   
      $result = mysqli_fetch_assoc($query);
      $result = $result['p_name'];
      
      
      echo "<td>";
      echo $result;
      echo "</td>";
      
         
      
      echo "<td>";
      echo $link[$i]['generate'];
      echo "</td>";
      echo "</tr>";
    }
     
    
    ?>
   
  </tbody>
  
  
 
</table>
    
    <?php
  }
?>

<br><br>  
<a href="logout.php" >Logout</a>
<br><br>

 
</body>
</html>