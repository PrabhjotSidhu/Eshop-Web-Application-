<?php
    session_start();
    if(!isset($_SESSION["id"])) {
        header("Location:login.php");
    }


    $pid = $_GET['pid'];
    include 'db_connection.php';
    $con = OpenCon();

    $sql = "Delete from product where ProductID=".$pid.";";  
        $current_id = mysqli_query($con, $sql);

        if(isset($current_id)) 
        {
            Header("Location: userProducts.php");
            exit();
        }
        else{
            echo "<center><font size='5' color='red'>Error while deleting record!</font></center>";
        }
                

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eshop</title>
    <link rel="stylesheet" href="Styles/style.css">
</head>
<body>
    
<div class="topnav">
        <div>Eshop</div>
        <a href="logout.php">Logout</a>
        <a href="customerList.php">Customers List</a>
        <a href="addProduct.php">Add Product</a>
        <a class="active" href="userProducts.php">Products</a>
        <a href="indexAdmin.php">Home</a>
    </div> 


</body>
</html>