<?php
require_once('required.php');


    function get_link(){
        $connect = mysqli_connect('localhost','root','14181418','project');
        $text = sprintf('SELECT users.name, plan.p_name, link.generate,link.id_plan
        FROM ((link
        INNER JOIN users ON  link.id_user= users.id)
        INNER JOIN plan ON  link.id_plan= plan.p_id);');
        $query = mysqli_query($connect,$text);
        $arr=  array();
        $arr1  = array();
        while($row = mysqli_fetch_assoc($query)){
            $arr[count($arr)] = $row;

            // $id_plan = $row['id_plan'] ;
            // $text1 = sprintf('SELECT company_id from plan WHERE p_id = %d',$id_plan);
            // $query1 = mysqli_query($connect,$text1);
            // $result1 = mysqli_fetch_assoc($query1);
            // $id_comp = $result1['company_id'];
            // $text2 = sprintf('SELECT company.c_name from company WHERE company.c_id = %d',$id_comp);
            // $query2 = mysqli_query($connect,$text2);
            // $result2 = mysqli_fetch_assoc($query2);
  
        }
        for($i=0;$i<count($arr);$i++){
            $id_plan = $arr[$i]['id_plan'];
            $text1 = sprintf('SELECT company_id from plan WHERE p_id = %d',$id_plan);
            $query1 = mysqli_query($connect,$text1);
            $result1 = mysqli_fetch_assoc($query1);
            $comp_id = $result1['company_id'];
            $text2 = sprintf('SELECT c_name from company WHERE c_id = %d',$comp_id);
            $query2 = mysqli_query($connect,$text2);
            $result2 = mysqli_fetch_assoc($query2);
            $comp_name= $result2['c_name'];
          
            
            $arr[$i]['comp_name']=$comp_name;
            
        }
       
        return $arr;
        
    }
    
$links = array();
$links = get_link();
?>

<html>
    <head>
        
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
    <?=rounter()?>
    <br><br><br>
    
    
    
    
    <table class="table container">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">User</th>
      <th scope="col">Company</th>
      <th scope="col">plan</th>
      <th scope="col">Membership</th>
    </tr>
  </thead>
  <tbody>
      
  <?php
  
  for($i=0;$i<count($links);$i++){
      $name= $links[$i]['name'];
      $plan= $links[$i]['p_name'];
      $gen= $links[$i]['generate'];
      $comp= $links[$i]['comp_name'];
    echo "<tr>";
    echo "  <th scope='row'>".($i+1)."</th>";
    echo " <th scope='row'>".$name."</th>";
    echo "  <th scope='row'>".$comp."</th>";
    echo "  <th scope='row'>".$plan."</th>";
    echo "  <th scope='row'>".$gen."</th>";
   
    
    echo "</tr>";
    
  }
?>
  </tbody>
</table>
<br><br><br>

</body>
</html>