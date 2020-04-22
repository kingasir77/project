<?php
include('../lib/lib.html');


?>

<html>
<head>
<title>SIGN UP</title>
  <link rel="stylesheet" type="text/css" href="../css/logup.css">
	<style>
		.title{
			padding-bottom:40px;
			padding-top:30px;
		}
	
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			
				<table border="0" class="col-8 rounded-circle" align="center">
				<tbody style="border:radius:30xp;">
					<form action="add_test.php" method="post">
					<tr align="center" class="signup">
						<td><h1 class="title">SIGN UP</h1> </td>
					</tr>


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
  							<input type="password" name="password" required="required" class="form-control" placeholder="password" aria-label="Username" aria-describedby="basic-addon1">
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

				<tr>	
			<td class="text-center">
				<a href="login_temp.php"> <p>Log IN</p></a>
	</td>
	</tr>

					<tr align="center">
						<td>&#169; project 
							<br><br>
						</td>

					</tr>


					</form>
					</tbody>
		</table>
				

		
		</div>
	</div>




</body>
</html>
