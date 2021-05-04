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
    <link rel="stylesheet" href="Styles/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="topnav">
        <div>Eshop</div>
        <a href="logout.php">Logout</a>
        <a class="active" href="customerPayments.php">Payments List</a>
        <a href="customerList.php">Customers List</a>
        <a href="addProduct.php">Add Product</a>
        <a href="userProducts.php">Products</a>
        <a href="indexAdmin.php">Home</a>
    </div> 

    <div style="text-align:center;margin-top:50px;">
        <h1 style="margin-bottom:30px;">Update Order Status</h1>
        <form method="post" action="">
            <select name="dropdown">
                <option name="waiting" value="Waiting for Approval">Waiting for Approval</option>
                <option name="approved" value="Approved">Approved</option>
                <option name="rejected" value="Rejected">Rejected</option>
            </select><br><br>
            <input type="submit" value="Save" name="submit1" class="btn btn-success">
        </form>
    </div>
    <?php

if (isset($_POST["submit1"])) {

    $paymentid = $_GET['paymentid'];
    $status = "";
    $current_id;

    include 'db_connection.php';
    $con = OpenCon();

    if(!empty($_POST['dropdown'])) {
        $status = $_POST['dropdown'];
        $sql = "Update payment set status = '".$status."' where paymentid = ".$paymentid.";";

        $current_id = mysqli_query($con, $sql);
      } 
      
      else {
        echo "Please select valid value from dropdown list";
      }


        

        if(isset($current_id)) 
        {
            echo "<center><font size='5' color='green'>Order Status updated successfully...</font></center>";
        }
        else{
            echo "<center><font size='5' color='red'>Error in updating Status.</font></center>";
        }
    }

    ?>

</body>
</html>