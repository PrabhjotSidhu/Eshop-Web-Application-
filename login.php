<?php
    session_start();

    include 'user_db.php';

    $message="";
    if(count($_POST)>0) {

        $email = $_POST["email"];
        $password = $_POST["password"];

        if(!is_valid_login($email, $password)) {
            $message = "<font color='red'>Invalid Username or Password!</font>";
        }
        else {
            if(isset($_SESSION["id"])) {

                if(isset($_POST['remember'])) {
                    setcookie("email1", $email, time()+60*60); //setting cookie for 1 hour
                    setcookie("password1", $password, time()+60*60);
                }
                if($_SESSION["name"] === "admin") {
                    header("Location:indexAdmin.php");
                }
                else {
                    header("Location:indexUser.php");
                }
                
                }
            }
    
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eshop</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="Styles/style.css">
  <style>
      td {
          padding: 5px;
      }
      table {
        margin-top: 40px;
      }
      h1 {
          margin-left: 100px;
          margin-top: 0px;
      }
  </style>
</head>
<body>
    <div class="topnav">
        <div>Eshop</div>
        <a class="active" href="login.php">Login</a>
        <a href="products.php">Products</a>
        <a href="index.php">Home</a>
    </div> 

    <div class="outerBox" style="width:60%;height:400px;">
        <form method="post" action="">
        <?php if($message!="") { echo $message; } ?>
        <h1>Login</h1>
            <table>
                <tr><td>Email</td><td><input type="email" name="email" id="userEmail" size="30"></td></tr>
                <tr><td>Password</td><td><input type="password" name="password" id="userPassword" size="30"></td></tr>
                
            </table><br>
            <input type="checkbox" name="remember" value="1">&nbsp;Remember Me
            <br><br><input type="submit" value="Login" class="btn btn-success">&nbsp;&nbsp;
            <input type="button" value="Signup" class="btn btn-success" onClick="document.location.href='signup.php'">
        
        </form>
        
    </div>

    <?php
        //Handling cookies
    if(isset($_COOKIE['email1']) && isset($_COOKIE['password1'])) {
        $emailCookie = $_COOKIE['email1'];
        $passwordCookie = $_COOKIE['password1'];
        echo "<script>document.getElementById('userEmail').value='".$emailCookie.
            "';document.getElementById('userPassword').value='".$passwordCookie."';</script>";
    }
    ?>

</body>
</html>