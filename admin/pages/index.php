<?php
include_once("../lib/lib.html");
global $connect;
//method --->post
//name = name
//pass name = password

?>

<html>
<head>
<title>SIGN IN</title>
  <link rel="stylesheet" type="text/css" href="../css/logup.css">

</head>
<body>
  <div class="container">
    <div class="row">
      
        <table border="0" class="col-8" align="center">
          <form action="checkuser.php" method="post">
          <tr align="center">
            <td><h1>SIGN IN</h1> </td>
          </tr>
         <br><br>


          <tr align="center">
            <td>
              <div class="input-group col-10 mb-3">
                <div class="input-group-prepend">
                   <span class="input-group-text" id="basic-addon1">Username</span>
                </div>
                <input type="text" required="required" name="name" class="form-control" placeholder="Username" aria-label="Username"  aria-describedby="basic-addon1">
              </div>
            </td>
          </tr>


          <tr align="center">
            <td>
              <div class="input-group col-10 mb-3">
                <div class="input-group-prepend">
                   <span class="input-group-text" id="basic-addon1">Password</span>
                </div>
                <input  type="password" name="password" required="required" class="form-control" placeholder="password" aria-label="Username" aria-describedby="basic-addon1">
              </div>
            </td>
          </tr>


                 
          <tr align="center">
            <td>
              <input class="btn btn-primary" type="submit" value="Submit">
              <br>
              <br>
            </td>
          </tr>

          <tr align="center">
            <td><a href="signup.php">register</a></td>
          </tr>




          </form>
    </table>
        

    
    </div>
  </div>
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

</body>
</html>
