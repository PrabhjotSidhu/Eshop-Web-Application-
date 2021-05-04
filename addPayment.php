<?php
session_start();
if(!isset($_SESSION["id"])) {
    header("Location:login.php");
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
      
  </style>
</head>
<body>
<div class="topnav">
        <div>Eshop</div>
        <a href="logout.php">Logout</a>
        <a href="booklist.php">Booklist</a>
        <a class="active" href="customerProducts.php">Products</a>
        <a href="indexUser.php">Home</a>
    </div> 

    <div class="outerBox" style="width:60%;height:550px;">
        <h1>Add Payment Details</h1>
    <form name="form1" method="post" action="" enctype="multipart/form-data">
        <table>
        <tr><td>Email</td><td><input type="email" name="email"></td></tr>
        <tr><td>Cardholder Name</td><td><input type="text" name="cardname"></td></tr>
        <tr><td>Card Number</td><td><input type="number" name="cardno"></td></tr>
        <tr><td>Expiry Date</td><td><input type="text" name="expdate" placeholder="MM/YY"></td></tr>
        <tr><td>CVV</td><td><input type="number" name="cvv"></td></tr>
        
        <tr><td><input type="submit" value="Add to Booklist" name="submit1" class="btn btn-success"></td></tr>
        </table><br>
        
    </form>
    </div>

    <?php

if (isset($_POST["submit1"])) {

        $pid = $_GET['pid'];
        $email = $_POST['email'];
        $cardname = $_POST['cardname'];
        $cardno = $_POST['cardno'];
        $expdate = $_POST['expdate'];
        $cvv = $_POST['cvv'];

        include 'db_connection.php';
        $con = OpenCon();
    
        $sql = "Insert into payment(customeremail,productid,cardholdername,cardnumber,expdate,cvv,status) values ('".
                $email."','".$pid."','".$cardname."','".$cardno."','".$expdate."','".$cvv."','Waiting for Approval'".");";  
            $current_id = mysqli_query($con, $sql);
    
            if(isset($current_id)) 
            {
                echo "<center><font size='5' color='green'>Payment Details submitted successfully...<br>You will be contacted once your payment has been processed.</font></center>";
            }
            else{
                echo "<center><font size='5' color='red'>Error! Please provide valid details.</font></center>";
            }
        }
    ?>

</body>
</html>