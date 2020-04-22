<?php

require_once("required.php");
$user_id = $_GET['id'];

if(!isset($_GET['id']) || empty($user_id))
{
  header("location:../pages");
}

    $type_user = project_users_gettype($user_id);
    if($type_user == 0 ){
        $arr  = project_hospital_get();
        $count_hospital= project_hospital_num();
            
        }
        
       if($type_user == 2 ){
            $arr = project_hospital_getbyuser($user_id);
            $count_hospital = project_hospital_numbyuserid($user_id);
        }





?>

<html>

<head>
</head>

<body style="background-color: #DADFE1">

<div class="container">
    <div class="row">
<form action="add_hospital.php?id=<?=$user_id?>" method="post">
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
      <label class="sr-only" for="inlineFormInputGroup">location</label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><img src="../img/pin.png"></i>
		</div>
        </div>
        <input type="text" required class="form-control" name="location" id="inlineFormInputGroup" placeholder="location">
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
        <input type="number"  class="form-control" name="phone" id="inlineFormInputGroup" placeholder="phone">
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
      <th scope="col">location</th>
      <th scope="col">email</th>
      <th scope="col">phone</th>
      <th scope="col">specialty</th>
      <th scope="col">new specialty</th>
      <th scope="col">cancel</th>

    </tr>
  </thead>
  <tbody>
    <tr>	
    	<?php
      

    	for($i=0;$i<$count_hospital;$i++){		
    		$hospital  = $arr[$i];
    		$hospital_id = $arr[$i]['h_id'];

    		echo "<th scope='row'>".($i+1)."</th>";
    		echo "<td>";
    		echo $hospital['h_name'];
    		echo "</td>";




    		echo "<td>";
        $hos_loc = $hospital['h_location'];
    		echo "<a href='$hos_loc'>google map</a>";
    		echo "</td>";




        echo "<td>";
        echo $hospital['h_email'];
        echo "</td>";


    		
        echo "<td>";
        echo $hospital['h_phone'];
        echo "</td>";



        echo "<td>";
        $count = project_spe_num_hospital($hospital_id);
        $result = prject_spe_get_byhospital($hospital_id);
        for($j = 0 ; $j<$count;$j++){
          $id= $result[$j]['s_id'];
          $name =$result[$j]['s_name'];
          
          echo "<button  class='btn btn-primary'>";
          echo $name . " ";
echo "<span class='badge badge-light'>"."<a href='delete_spe.php?id=$id'>".'X'."</a>"."</span";
          
        
          echo "</button>";
        }

        echo "</td>";




        echo "<td>";
        echo "<form action='add_spe.php?' method='get'> ";
        echo "<input type='text' class='form-control' size='15' name='name' >";
        echo "<input type='hidden' name='id' value='$hospital_id'>";
        echo "<input class='btn 'type='submit' >";
        echo "</form> ";
        echo "</td>";


    		

        echo "<td>";
        echo "<a href='delete_hospital.php?id=$hospital_id'><img src='../img/cancel.png'></a>";
        echo "</td>";




    		echo "</tr>";

    	}

    	

    	?>




     
    
    
      
  </tbody>
</table>


</div>

</div>

</body>
</html>