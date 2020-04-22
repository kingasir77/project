<?php
require_once('required.php');

function show_button(){
    global $user_id;
    
    
    $res_users = project_users_get();
    $count_users = project_users_num();
    ?>
    

    
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
  
    
    rounter();
    show_button();


