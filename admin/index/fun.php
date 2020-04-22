<?php
    include_once('../lib/lib.html');
?>
    
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/visitor.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>    
    
        <style>
            
            *{
    margin: 0px;
    padding: 0px;
    font-family: tahoma;
}

body{
  padding: 0px;
  margin: 0px;
  background-color: lightgray;
    
}



.nav_right ul{
    position: absolute;
    margin-left: 600px;
  
}
.name
{
    position: absolute;
    top: 270px;
    left: 280px;
    font-size: 60px;
    font-weight: bold;
    color: gray;
    
    background-color:#A9C5C7; 
}
.desc{
    position: absolute;
    top: 356px;
    left: 375px;
    font-size: 25px;
    color: white;
    text-align: center;
    background-color: #A9C5C7;
    border-bottom-left-radius: 60px;
    border-bottom-right-radius: 40px;
}

        </style>
    </head>
<body>
         <?php
        function upper_nav(){
        ?>
        
                  
<nav class="navbar navbar-expand-lg navbar-light bg-light ">
  <a class="navbar-brand"   >Medical Insurance</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../index/">Home <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href=''>Hospitals</a>
      </li>
  
      <li class="nav-item">
        <a class="nav-link" href="mailto:436805833@kku.edu.sa">contact us</a>
      </li>
      <div class="nav navbar-nav navbar-right nav_right ">
      <ul class="nav navbar-nav navbar-right">
      <li><a href="../pages/signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="../pages/"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
    </div>
    </ul>
  </div>
</nav>
   
         <?php
                
                
        }
        ?>
        
        
        <?php
        function name_website(){
            ?>
            <h1 class="name">Medical Insurance Guide <br>
                 </h1>
                <span class="desc">We provide  companies and treatment plans <br> and also provide services for companies <br> to 
                    communicate with their subscribers</span> 
            <?php
        }
        
        ?>
        
        
    </body>
</html>