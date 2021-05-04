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

      h1 {
          margin: 5px 50px 25px;
          
      }
      td {
          padding:5px;
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

    <div class="outerBox" style="width:60%;height:550px;margin-bottom:40px;">
        <h1>Signup</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <table>
        <tr><td>First Name</td><td><input type="text" name="fname" required></td></tr>
        <tr><td>Last Name</td><td><input type="text" name="lname" required></td></tr>
        <tr><td>Address</td><td><input type="text" name="address" required></td></tr>
        <tr><td>City</td><td><input type="text" name="city" required></td></tr>
        <tr><td>State</td><td><input type="text" name="state" required></td></tr>
        <tr><td>Zip Code</td><td><input type="text" name="zip" required></td></tr>
        <tr><td>Email</td><td><input type="email" name="email" required></td></tr>
        <tr><td>Password</td><td><input type="password" name="password" required></td></tr>
        <tr><td>Phone</td><td><input type="number" name="phone" required></td></tr>
        </table><br>
        <input type="submit" value="Signup" class="btn btn-success">
    </form>
    </div>

    <!-- Php Code -->
    <?php

    include 'user_db.php';
    

if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = (int)$_POST['phone'];

        if(add_user($fname, $lname, $address, $city, $state, $zip, $email, $password, $phone) > 0) {
            echo "<center><font size='5' color='green'>User Registration successful...<a href='login.php'>Login</a></font></center>";
        }
        else {
            echo "<center><font size='5' color='red'>Error! Please provide valid details.</font></center>";
        }

        
       }
    ?>

</body>
</html>