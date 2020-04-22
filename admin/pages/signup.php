<?php

include_once("../lib/lib.html");
require_once ('connect.php');



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
                        <form action="add_user.php" method="post">
                        <tr align="center" class="signup">
                            <td><h1 class="title">SIGN UP</h1> </td>
                        </tr>

                        <tr align="center">
                            <td>
                                <div class="input-group col-10 mb-3">
                                <div class="input-group-prepend">
                                     <span class="input-group-text" id="basic-addon1">Username</span>
                                </div>
                                <input type="text" required="required" minlenght="4"name="name" class="form-control" placeholder="Username" aria-label="Username"  aria-describedby="basic-addon1">
                                </div>
                            </td>
                        </tr>

                        <tr align="center">
                            <td>
                                <div class="input-group col-10 mb-3">
                                    <div class="input-group-prepend">
                                         <span class="input-group-text" id="basic-addon1">Password</span>
                                    </div>
                                 <input type="password" name="password" minlength="4" required="required" class="form-control" placeholder="password" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </td>
                        </tr>


                            <tr align="center">
                            <td>
                                <div class="input-group col-10 mb-3">
                                <div class="input-group-prepend">
                                     <span class="input-group-text" id="basic-addon1">type</span>
                                </div>
                                    <select name="select_type" class="form-control mb-2 " id="sel1">
                                    <option value="1">insurance service</option>
                                    <option value="2">hospital service</option>
                                    <option value="3">User</option>
                                      </select>
                                </div>
                            </td>
                        </tr>


                        <tr align="center">
                            <td>
                                <input class="btn btn-primary" name="submit" type="submit" value="Submit">
                                <br>
                                <br>
                            </td>
                        </tr>

                    <tr>
                <td class="text-center">
                    <a href="../pages"> <p>Log IN</p></a>
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
