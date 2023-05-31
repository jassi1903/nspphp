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
    <title>register Page</title>
    <style>   
        Body {  
          font-family: Calibri, Helvetica, sans-serif;  
          background-color: pink;  
        }  
        button {   
               background-color: #4CAF50;   
               width: 100%;  
                color: orange;   
                padding: 15px;   
                margin: 10px 0px;   
                border: none;   
                cursor: pointer;   
                 }   
         form {   
                border: 3px solid #f1f1f1;   
            }   
         input[type=text], input[type=password] {   
                width: 100%;   
                margin: 8px 0;  
                padding: 12px 20px;   
                display: inline-block;   
                border: 2px solid green;   
                box-sizing: border-box;   
            }  
         button:hover {   
                opacity: 0.7;   
            }   
          .cancelbtn {   
                width: auto;   
                padding: 10px 18px;  
                margin: 10px 5px;  
            }   
                
             
         .container {   
                padding: 25px;   
                background-color: lightblue;  
            }   
        </style>
</head>
<body>    
    <center> <h1>Teacher login Page </h1> </center>   
    <form action="/loginpage/register.php" method="post">  
        <div class="container">   
            <label>Username : </label>   
            <input type="text" placeholder="username" name="username" required>  
            <label>Password : </label>   
            <input type="password" placeholder="password" name="password" required> 
            <label for="">confirm password</label><input type="password" placeholder="confirm password" name="cnfpassword" required> 
            <button type="submit">Login</button>   
        </div>   
    </form>   
    <?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // include 'partials/_dbconnect.php';
        $username = $_POST["username"];
        $password = $_POST["password"]; 
        $cnfpassword = $_POST["cnfpassword"]; 
        
        if(($password == $cnfpassword) && $exists==false){
            $sql = "INSERT INTO `user` (`username`, `password`, `confirm password`) VALUES ('$username', '$password', '$cnfpassword');";
            $result = mysqli_query($conn, $sql);
            if ($result){
                $showAlert = true;
            }
        }
        else{
            $showError = "Passwords do not match";
        } 
       
        
    }
    
    ?> 
    
</body>     
</html>  
</body>
</html>