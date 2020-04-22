<?php
require_once("required.php");

    session_start();
    if(isset($_SESSION['user'])){
      
        $id = $_SESSION['user'];
        $plan_id_for_user = check_if($id);
        $company_id_for_user = get_company_by_plan_id($plan_id_for_user);
        $_SESSION['comp_id'] = $company_id_for_user;
       
        $arr  = project_comp_get();
        $count_company= project_comp_num(); 
        $name_user = users_get_name_by_id($id);

    }
    else{
  
        header("location:index.php");
      
    }
    
    function company_alert($name_user){
        echo '<nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"> Welcome  '."<a href='account.php'>$name_user</a>".'  </li>
      </ol>
    </nav>';
   
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

<?php
company_alert($name_user);
?>
    <br>
    
    <br>
    
    <br>
    
    

<table class="table table-striped" style='text-align:center'>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">website</th>
      <th scope="col">email</th>
      <th scope="col">phone</th>
      <th scope="col">plans</th>
      <th scope="col">rating  </th>
      <th scope="col">MORE</th>
      
      <th scope="col">Evaluation</th>
    </tr>
  </thead>
  <tbody>
    	<?php
      
      echo"<tr>";

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
        $rating = get_rating($company_id);
    		echo number_format((float) $rating ,2,'.','');
    		echo "</td>";


    		echo "<td>";
    		echo "<a  href='nor_user_plan.php?comp_id=$company_id'><img src='../img/edit.png'></a>";
            echo "</td>";
            
            if($company_id == $company_id_for_user){
              $qurey_text = sprintf("SELECT rate FROM link WHERE id_user = $id ");
	            $query = mysqli_query($connect,$qurey_text);
              $result = @mysqli_fetch_assoc($query); 
              if($result['rate'] == 1 ){
                echo "<td  >";
                echo "<img src='../img/correct.png'/>";
                  echo "</td>";
                  
              }

              else {
                show_rate();

              }

            }

            else{
              echo "<td>";
              echo "</td>";
 
            }

    		echo "</tr>";

        }
        
        function show_rate(){
          global $company_id;
        echo "<td>";
        $url = "rate.php" ;
        echo "<form action='rate.php' mehtod='post'>";
        echo "<select class='custom-select col-3' name ='rate'>";
        echo "<option value='1'>".'1'."</option>";
        echo "<option value='2'>".'2'."</option>";
        echo "<option value='3'>".'3'."</option>";
        echo "<option value='4'>".'4'."</option>";
        echo "<option value='5'>".'5'."</option>";
        echo "</select>";
        echo "<button type='submit'  value='submit' class='btn btn-info'>Evaluation</button>";
        echo "</form>";
        echo "</td>";
        }
        
        
        
        ?>




    
    </body>
    
    
    </html>

    
   