  <?php
require_once("required.php");
$comp_id = $_GET['comp_id'];
$result= array();
$result = project_comp_getbyid("$comp_id");
$name=  $result['c_name'];
$website=  $result['c_website'];
$email=  $result['c_email'];
$phone=  $result['c_phone'];
$result_plans  = project_plan_bycompanyid($comp_id);
$num_plans =     project_plan_num_bycompanyid($comp_id);
$num_offices  =  project_office_num_bycompanyid($comp_id); 
$result_office = project_office_get("WHERE company_id = $comp_id");


// selet box 
$result_hospitals = project_hospital_get();
$count_of_hospitals  = count($result_hospitals);
$arr_of_hospital = array();


for($i=0;$i<$count_of_hospitals;$i++){
  $arr_id= $result_hospitals[$i]['h_id'];
  $arr_name =$result_hospitals[$i]['h_name'];
  $arr_of_hospital[$i]['id'] =$arr_id;
  $arr_of_hospital[$i]['name']= $arr_name;
}



function get_link(){
  
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
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

<div class="row">
  <?php
  for($i=0;$i<$num_offices;$i++){
    $result = $result_office[$i];
    $result_city = $result['o_city'];
    $result_url = $result['office_location'];
    echo "<a target='_blank'href='$result_url' class='badge badge-primary'>$result_city</a>";
  }

  ?>

</div>


<div class="row">
<table>
  <tr>
    <td class="">
      enter new plan
      <br><br>

<form action="addplan.php?comp_id=<?=$comp_id?>" method="post">
	 <div class="col-auto">
      <label class="sr-only" for="inlineFormInputGroup">Name plan</label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><img src="../img/Name.png"></div>
        </div>
        <input type="text" class="form-control"name="name" required id="inlineFormInputGroup" placeholder="name">
      </div>
  </div>


	<div class="col-auto">
      <label class="sr-only" for="inlineFormInputGroup">outside</label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><img src="../img/www.png"></i>
		</div>
        </div>
            <select name="select_outside" class="form-control mb-2 " id="sel1">
        <option>true</option>
        <option>false</option>
          </select>
      </div>
  </div>


	 <div class="col-auto">
      <label class="sr-only" for="inlineFormInputGroup">price</label>
      <div class="input-group  mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><img src="../img/dollar.png"></div>
        </div>
        <input type="number" class="form-control" required name="price" id="inlineFormInputGroup" placeholder="">
      </div>
    </div>

  
     <div class="col-auto">
      <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </div>
</div>

</form>

</td>



  <td class="">
 Ener new office
 <br>
 <br>
<form action="addoffice.php?comp_id=<?=$comp_id?>" method="post">
   <div class="col-auto">
      <label class="sr-only" for="inlineFormInputGroup"></label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><img src="../img/company.png"></div>
        </div>
        <input type="text" class="form-control"name="city" required id="inlineFormInputGroup" placeholder="city">
      </div>
  </div>


   <div class="col-auto">
      <label class="sr-only" for="inlineFormInputGroup"></label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><img src="../img/pin.png"></div>
        </div>
        <input type="text" class="form-control"name="url" required id="inlineFormInputGroup" placeholder="URL locaion">
      </div>
  </div>



  
     <div class="col-auto">
      <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </div>

</form>
  </td>
</tr>
</table>
</div>




<table class="tt table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">outside</th>
      <th scope="col">price</th>
      <th scope="col">hospitals</th>
      <th scope="col">select hospital</th>  
      <th scope="col">DELETE</th>
      
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
    		echo $plan['p_price'] . " $";
    		echo "</td>";



        echo  "<td>";
        $count = project_relation_num_byplan($plan_id);
        $result = project_relation_byplan($plan_id);

        for($j = 0 ; $j<$count;$j++){
          
          $id= $result[$j]['hospital_id'];
          $id_rel= $result[$j]['r_id'];
          $name = project_hospital_byid($id);

          echo "<button class='btn btn-primary'>";
          echo $name . " ";
          echo "<span class='badge badge-light'>"."<a href='delete_rel.php?id=$id_rel'>".'X'."</a>"."</span";
        
          echo "</button>";
        }

                echo "</td>";



         echo "<td>";
         echo "<form action='add_rel.php?id=$plan_id' method='post'>";
         echo " <select name='list' class='form-control col-7  form-control-sm'>";
          for($j=0;$j<$count_of_hospitals;$j++){
                        $arr_name = $arr_of_hospital[$j]['name'];
                        $arr_id = $arr_of_hospital[$j]['id'];
           echo "<option value='$arr_id' name='$arr_id'>$arr_name</option>";
          }
           echo " </select>";


            echo "<a href='add_relation.php?id=$plan_id?'><button type='submit'  value='submit' class='btn btn-primary'>add</button></a>";


            echo "</form>";
          echo "</td>";


         echo "<td>";
        echo "<a href='deleteplan.php?plan_id=$plan_id'><img src='../img/cancel.png'></a>";
        echo "</td>";



       		echo "</tr>";

      }
      
      

    	

    	?>
              
  </tbody>
</table>
</div>



</body>
</html>
