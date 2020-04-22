<?php
require_once('required.php');
session_start();
if(!isset($_SESSION['user'])){
  
  header("location:index.php");
}
else{
$id_user = $_SESSION['user'];

// check nor_user if set info or no 
    function set_info($id_user){
        
        global $connect;
        $text = sprintf('SELECT * FROM nor_user WHERE id=%d ',$id_user);
        $query  = mysqli_query($connect,$text);   
        if($query)
   
        $result = mysqli_fetch_assoc($query);
        if(empty($result))
          return null;
        else 
          return $result;
    }
    $info_user = set_info($id_user);

    
      if(isset($_POST['edit'])){
        global $connect;
        $name = $_POST['name'];
        $nid = $_POST['nid'];
        $nof = $_POST['nof'];
        
        if($info_user == null){
         
          $query_Add = sprintf("INSERT INTO nor_user(id,name,NID,nof,h_id) 
          VALUES (%d,'%s','%s','%s',null)" ,$id_user,$name,$nid,$nof);
          $query_exe_add = mysqli_query($connect,$query_Add);
          if(!$query_exe_add){
                      // echo ("cann't add user sorry");

          }
          else
          {
            //  echo "insert";
            header("location:#");
          }

        }
        else 
        {
          $query_Add = sprintf("UPDATE nor_user
          SET name = '%s',NID = '%s', nof=  '%s'
          WHERE id = '%s'",$name,$nid,$nof,$id_user);
          $query_exe_add = mysqli_query($connect,$query_Add);
          if(!$query_exe_add)
                {
                  header("location:#");

                }          
                  else
                {
                  header("location:#");

                }
        }
      }
  
      // check company fo user 
        
        function get_company($id_user){
            $result_plan =0 ;
           $result_comp=0;
          global $connect,$id_user;
          $text = sprintf('SELECT * FROM link WHERE id_user=%d ',$id_user);
          $query  = mysqli_query($connect,$text);      
          $result = mysqli_fetch_assoc($query);
          $id_plan_new = $result['id_plan'];
          $_SESSION['id_plan'] = $id_plan_new;
          if(empty($result))
            return null;
          else {
            $result_plan= $result['id_plan'];
            $text = sprintf('SELECT * FROM plan WHERE p_id=%d ',$result_plan);
            $query  = mysqli_query($connect,$text);     
            $result = mysqli_fetch_assoc($query);
            $result_id_comp = $result['company_id'];
            $text = sprintf('SELECT * FROM company WHERE c_id=%d ',$result_id_comp);
            $query  = mysqli_query($connect,$text);  
            $result= mysqli_fetch_assoc($query);
            return $result_comp = $result;
                     
        }
      }
      function get_token ($id_user){
          global $connect,$id_user;
          $text = sprintf('SELECT * FROM link WHERE id_user=%d ',$id_user);
          $query  = mysqli_query($connect,$text);      
          $result = mysqli_fetch_assoc($query);
          $token = $result['generate'];
          return $token;
      }
        $company = get_company($id_user);
        $token = get_token($id_user);
        
      if(isset($_POST['cancel'])){

      }  
}
    
?>
    <html>
  
    <head>
        <style>
          body{
          }
            .box{
                margin-left: 250px;
               
            }
            .edit{
                text-align: center;
                margin-left: 720px;    
                
            }
            form{
                display: none;
            }
            .not{
              margin-left: 450px;
            }
            .info_user{
              text-align: center;
            }
            .info_user tr td,th{
              border-left: 2px solid gray;
              border-right: 2px solid gray;
            }
            .name_company a{
              color:white;
            }
            .mada{
              height: 25px;
              width: 50px;
             
            
            }
            .visa .mada{
              position: absolute;
              text-align: center;
            }
            .soon{
             
              text-align: center;
              z-index: 1;
              font-weight: bold;
              font-size: 30px;
            }
        </style>    
    
    </head>
    
    
    <body style="background-color:cadetblue">
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand"   >Medical Insurance</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="nor_user.php">Home <span class="sr-only"></span></a>
      </li>
      <li class="nav-item active">
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

<br><br><br><br>
    
    
    <script>
  
function myFunction() {
 
    var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}


function myFunction1() {
  var txt;
  if (confirm("Sure unsubscribe")) {
    location.replace("unsubsribe.php");
  } else {
   
  }
 
}
</script>
    
    
    <table class="table container info_user" style="font-size: 18px">
  <thead>
    <tr class="table-secondary">
      
      <th scope="col">Name</th>
      <th scope="col"># national</th>
      <th scope="col">Family </th>
      <th scope="col">Edit </th>
    </tr>
  </thead>
  <tbody>
    <tr class="table-dark">
      <td><?=$info_user['name']?></td>
      <td><?=$info_user['NID']?></td>
      <td><?=$info_user['nof']?></td>
      <td><img onclick="myFunction()"  src="../img/refresh.png"></td>
    </tr>
  
    
    
  </tbody>
</table>


<div class="container ">
<form  id="myDIV" class="justify-content-center" action="" method="post">
  <div class="form-row box  col-9">
   
    <div class="form-group col-md-3">
      <label for="inputZip">Name</label>
      <input type="text" name = 'name' value="<?=$info_user['name']?>" class="form-control" >
    </div>
         
   <div class="form-group col-md-3">
       <label for="inputZip">#national</label>
      <input type="text" name="nid" value="<?=$info_user['NID']?>" class="form-control" >
    </div>
   
  <div class="form-group col-md-3">
      <label for="inputZip">Family</label>
      <input type="text" name="nof" value="<?=$info_user['nof']?>" class="form-control" >
    </div>

 
    <button type="submit"  style="width:100px ;height:30px;margin-top:36px ;padding:0px "name="edit" class="btn btn-light">UPDATE</button>
        </div>
</form>
</div>
            
<br><br><br><br><br><br><br><br>  





<?php
    if(!empty($company))
    
    {
      ?>
      <table class="table container info_user" style="font-size: 18px">
      <thead>
        <tr class="table-secondary">
          
          <th scope="col">company</th>
          <th scope="col">STATUS</th>
          <th scope="col">Membership </th>
          <th scope="col">Unsubscribe </th>
          <th scope="col">PAY </th>
        </tr>
      </thead>
      <tbody >
        <tr class="table-dark" >
          <td class="name_company"><a href='nor_user_plan.php?comp_id=<?=$company['c_id']?>'><?=$company['c_name']?></a></td>
          <td style="color:green">Active</td>
          <td style="letter-spacing: 0.1em;"><?=$token?></td>
          
      <td><button type="submit" name="cancel" onclick="myFunction1()" class="btn btn-danger">Unsubscribe</button> </td>
      <td disabled><span  ><img src='../img/visa.png' class='visa'>  <img src="../img/mada.png" class="mada"><br> <span class="soon">SOON</span></span></td>
    </tr>
      
      </tbody>
    </table>
<?php

    }
    
    else{
      echo "<h1  class='not' >";
      echo "  <small style='color:#F7D1B2'>YOU NOT SUBSCRIBE ANY COMPANY YET</small>";
      echo "</h1>";
    }
?>

<br><br><br>
<!-- Footer -->
<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 project 
    <i>| medical insurance guide</i>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
    
    </body></html>
    
    