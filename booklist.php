<?php
session_start();
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
        <a class="active" href="booklist.php">Booklist</a>
        <a href="customerProducts.php">Products</a>
        <a href="indexUser.php">Home</a>
    </div> 

    <?php

        if(isset($_SESSION["id"])) {
            $id = $_SESSION["id"];

            
            echo "<div class='container grid-text'><div class='row'>";
             $con = mysqli_connect('localhost','root','','project') or die('Unable To connect');
            $result = mysqli_query($con,"select pr.ProductName, pr.Brand, pr.Description, pr.UnitPrice, pr.Image, p.status
            from customer c, payment p, product pr 
            where c.CustomerID = ".$id.
            " and c.Email = p.customeremail 
            and p.productid = pr.ProductID;");


            while($products = mysqli_fetch_array($result)){
            
                $pname = $products['ProductName'];
                $brand = $products['Brand'];
                $desc = $products['Description'];
                $uprice = $products['UnitPrice'];
                $images = $products['Image'];
                $status = $products['status']; 
                
                echo "<div class='col-lg-4 col-md-6 hover-fade grid-div'>";
                echo '<img class="grid-img" src="data:image/jpeg;base64,'.base64_encode($images).'" alt="image" />';
                echo "<br><font size='6'>".$pname."</font><br>".$brand.
                "<br>".$desc."<br><font color='green' size='4'>$".$uprice."</font>";
                echo "<br><br><font size='5'>Status : <em>".$status."</em></font>";
                echo "</div>";
    
            }

            echo "</div></div>";


        }
        else {
            // echo "<script>alert('Please login first!');</script>";
            header("Location:login.php");
            // echo "<center><font color='red' size='4'>Please login first</font></center>";
        }
    ?>


        

</body>
</html>