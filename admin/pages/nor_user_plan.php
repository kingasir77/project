
<?php

require_once("required.php");
session_start();
$id= $_SESSION['user'];

$comp_id = $_GET['comp_id'];

$result= array();
$result = project_comp_getbyid("$comp_id");
$name=  $result['c_name'];
$website=  $result['c_website'];
$email=  $result['c_email'];
$phone=  $result['c_phone'];
$result_plans  = project_plan_bycompanyid($comp_id);
$num_plans =     project_plan_num_bycompanyid($comp_id);

if(isset($_SESSION['error'])){
company_alert();
unset($_SESSION['error']);  
}

function company_alert(){
  echo "<nav aria-label=\"breadcrumb\">
<ol class=\"breadcrumb  alert-info \">
  <li class=\"breadcrumb-item danger \" aria-current=\"page\"> can't register in two company  </li>
</ol>
</nav>";
}

?>


<html>
    

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand"   >Medical Insurance</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="nor_user.php">Home <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="account.php">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="mailto:436805833@kku.edu.sa">contact us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="logout.php">Log out</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">website</th>
      <th scope="col">email</th>
      <th scope="col">phone</th>
     
    </tr>
  </thead>
  <tbody>
    <tr class="table-primary">	
    	<td><?=$name?></td>
    	<td><?=$website?></td>
    	<td><?=$email?></td>
    	<td><?=$phone?></td>
    </tr>
  </tbody>
</table>

<br><br><br>


<table class="tt table  table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">outside</th>
      <th scope="col">price</th>
      
      <th scope="col">register</th>
      <th><th>
      
    </tr>
    
  </thead>
  <tbody>
    <tr>	
    	<?php
    	for($i=0;$i<$num_plans;$i++){		
    		$plan  = $result_plans[$i];
        $plan_id = $plan['p_id'];
        

    		echo "<th scope='row'>".($i+1)."</th>";
    		echo "<td>";
    		echo $plan['p_name'];
    		echo "</td>";

    		echo "<td>";
    		echo $plan['p_outside'];
    		echo "</td>";

    		echo "<td>";
    		echo $plan['p_price']." $";
    		echo "</td>";



         echo "<td>";
        echo "<a href='link.php?plan_id=$plan_id'><img src='../img/link.png'></a>";
        echo "</td>";
        echo "<td>";
        echo "</td>";
          
       
        echo "<td>";
        $checkk = check_if($id);
        if($checkk == $plan_id){
        echo "registered";
        echo "</td>";
        }
        else
        
        echo "";
        
       

       		echo "</tr>";

    	}

    	

      ?>

</body>
</html>