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

      h1 {
          margin-top: 5px;
          margin-bottom: 25px;
      }
      td {
          padding:10px;
      }
  </style>

</head>
<body>
<div class="topnav">
        <div>Eshop</div>
        <a href="logout.php">Logout</a>
        <a href="customerPayments.php">Payments List</a>
        <a href="customerList.php">Customers List</a>
        <a class="active" href="addProduct.php">Add Product</a>
        <a href="userProducts.php">Products</a>
        <a href="indexAdmin.php">Home</a>
    </div> 

    <div class="outerBox" style="width:60%;height:450px;">
        <h1>Add Product Details</h1>
    <form name="form1" method="post" action="" enctype="multipart/form-data">
        <table>
        <tr><td>Product Name</td><td><input type="text" name="pname"></td></tr>
        <tr><td>Brand</td><td><input type="text" name="brand"></td></tr>
        <tr><td>Description</td><td><input type="text" name="desc"></td></tr>
        <tr><td>Unit Price</td><td><input type="text" name="uprice"></td></tr>
        <tr><td>Select Image</td><td><input type="file" name="f1"></td></tr>
        <tr><td><input type="submit" value="Add Product" name="submit1" class="btn btn-success"></td></tr>
        </table><br>
        
    </form>
    </div>

    <!-- Php Code -->
<?php

if (isset($_POST["submit1"])) {

        $pname = $_POST['pname'];
        $brand = $_POST['brand'];
        $desc = $_POST['desc'];
        $uprice = $_POST['uprice'];
       
                $db = mysqli_connect("localhost","root","","project");
                
                $imgData = addslashes(file_get_contents($_FILES['f1']['tmp_name']));
                

                $sql = "INSERT INTO product (ProductName, Brand, Description, UnitPrice, Image) 
                VALUES ('".$pname."','".$brand."','".$desc."','".$uprice."','".$imgData."');";
                $current_id = mysqli_query($db, $sql);
                

                if(isset($current_id) && count($_POST)>0)
                echo "<center><font size='5' color='green'>Product Details added successfully...</font></center>";
                else
                echo "<center><font size='5' color='red'>Error! Please provide valid details.</font></center>";
                
        
       }
    ?>

</body>
</html>