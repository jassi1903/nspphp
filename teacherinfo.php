<?php
 include "dbconnect.php";
 $exists=false;
 $showError=false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .header{
            background-color:pink;
            padding: 12px;
            margin: 8px;
            width: 100;
        }
        .first{
            background-color:cadetblue;
        }
        .username{
            width: 50%;
        }
        .register{
            text-align: center;
        }
        p{
            text-align: center;
        }
    </style>
</head>
<body class="first">
   <center><header class="header">Attendance Management System</header></center> 
    <p>teacher information</p>
    <div class="div">
        <center>
        <form action="/loginpage/teacherinfo.php" method="post">
          <input type="text" class="username" name="fullname" placeholder="fullname">
          <br><br>
          <input type="text" class="username"name="mobileno"  placeholder="mobileno">
          <br><br>
          <input type="text" class="username" name="qualification" placeholder="qualification">
          <br><br>
          <input type="text" class="username"name="username" placeholder="username">
          <br><br>
          <input type="text" class="username" name="userId" placeholder="userId">
          <br><br>
          <input type="password" class="username" name="password" placeholder="password">
          <br><br>
         <input type="button" class="register" value="register"><br><br>
         <input type="button" value="back" style="background-color: cornflowerblue;">
        </form>

        <?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // include 'partials/_dbconnect.php';
        $fullname = $_POST["fullname"];
        $mobilno = $_POST["mobileno"]; 
        $qualification = $_POST["qualification"]; 
        $username = $_post["username"];
        $userId = $_post["userId"];
        $password = $_post["password"];
        
       
        $sql = "Select * from users where fullname='$fullname'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);

        if ($num == 1){
            while($row=mysqli_fetch_assoc($result)){
                if (password_verify($password, $row['password'])){ 
                    $login = true;
                    // session_start();
                    // $_SESSION['loggedin'] = true;
                    // $_SESSION['fullname'] = $fullname;
                    // header("location: welcome.php");
                } 
                else{
                    $showError = "Invalid Credentials";
                }
            }
            
        } 
        else{
            $showError = "Invalid Credentials";

        }
    }
        
    ?>
    </center>
    </div>
</body>
</html>