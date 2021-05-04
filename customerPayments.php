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
      th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
        }
      td { 
        text-align: left;
        overflow: hidden; 
        text-overflow: ellipsis; 
        word-wrap: break-word;
        }
  </style>
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

    

    <?php
    try {
            $dns = "mysql:host=localhost;dbname=project";
            $db = new PDO($dns, 'root', '');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "select p.paymentid, c.CustomerID, concat(c.FirstName, ' ', c.LastName) as CustomerName,
            p.productid, pr.ProductName, pr.UnitPrice, 
            p.status
            from customer c, payment p, product pr 
            where c.Email = p.customeremail 
            and p.productid = pr.ProductID;";

            $returnSelect = $db->query($sql);

            echo "<div class='paymentBox' style='background-color:white;'>
            <h1>Payment Details</h1><table class='table table-striped table-hover' style='table-layout:fixed;'><tr>".
            "<th>Payment ID</th><th>Customer ID</th><th>Customer Name</th>".
            "<th>Product Id</th><th>Product Name</th><th>Unit Price</th>".
            "<th>Order Status</th><th>Update Status</th>".
            "</tr>";

            while($rowArray = $returnSelect->fetch())
            {
                echo "<tr>".
                "<td>".$rowArray['paymentid'] . "</td>" .
                "<td>".$rowArray['CustomerID'] . "</td>" .
                "<td>".$rowArray['CustomerName'] . "</td>" .
                "<td>".$rowArray['productid'] . "</td>" .
                "<td>".$rowArray['ProductName'] . "</td>" .
                "<td>".$rowArray['UnitPrice'] . "</td>" .
                "<td>".$rowArray['status'] . "</td>" .
                "<td><a href='updateOrderStatus.php?paymentid=".$rowArray['paymentid']."'>Update</a></td>" .
                "</tr>";
            }

            echo "</table></div>";
            
        }
        catch(PDOException $e) {
            echo $e->getMessage();
          }
    ?>
</body>
</html>